<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $merchant_code = 'YOUR_MERCHANT_CODE'; // eSewa merchant code
    private $secret_key = 'YOUR_SECRET_KEY'; // For signature
    private $esewa_url = 'https://rc-epay.esewa.com.np/api/epay/main/v2/form'; // Sandbox URL

    public function create(Rental $rental)
    {
        return view('payments.create', compact('rental'));
    }

    public function store(Request $request, Rental $rental)
    {
        $request->validate(['payment_method' => 'required']);

        Payment::create([
            'rental_id' => $rental->id,
            'amount' => $rental->total_amount,
            'payment_method' => $request->payment_method,
            'status' => 'paid',
        ]);

        $rental->update(['status' => 'approved']);

        return redirect()
            ->route('rentals.confirmation', $rental)
            ->with('success', 'Payment successful!');
    }

    // Show eSewa payment form
   public function esewa(Rental $rental)
{
    $amount = $rental->total_amount;
    $tax_amount = 0;
    $total_amount = $amount + $tax_amount;
    $transaction_uuid = uniqid('TXN');
    $product_code = 'RENTAL_' . $rental->id;

    $success_url = route('payment.esewa.success');
    $failure_url = route('payment.esewa.failure');

    $fields_to_sign = [
        'total_amount' => $total_amount,
        'transaction_uuid' => $transaction_uuid,
        'product_code' => $product_code
    ];

    $signature = base64_encode(hash_hmac('sha256', implode(',', $fields_to_sign), $this->secret_key, true));

    // Pass $esewa_url as well
    $esewa_url = $this->esewa_url;

    return view('payments.esewa', compact(
        'rental', 'amount', 'tax_amount', 'total_amount', 'transaction_uuid',
        'product_code', 'success_url', 'failure_url', 'signature', 'esewa_url'
    ));
}


    // Handle eSewa success callback
    public function esewaSuccess(Request $request)
    {
        // Fetch rental based on product_code
        $product_code = $request->product_code; // e.g., RENTAL_1
        $rental_id = str_replace('RENTAL_', '', $product_code);
        $rental = Rental::findOrFail($rental_id);

        // Create Payment record
        Payment::create([
            'rental_id' => $rental->id,
            'amount' => $request->total_amount,
            'payment_method' => 'esewa',
            'transaction_id' => $request->transaction_uuid,
            'status' => 'paid',
        ]);

        // Update rental status
        $rental->update(['status' => 'approved']);

        return redirect('/dashboard')->with('success', 'Payment successful via eSewa');
    }

    // Handle eSewa failure callback
    public function esewaFailure(Request $request)
    {
        return redirect()->back()->with('error', 'eSewa Payment Failed.');
    }

    // Khalti methods remain unchanged
    public function khalti(Rental $rental)
    {
        return view('payments.khalti', compact('rental'));
    }

    public function khaltiVerify(Request $request)
    {
        $rental = Rental::findOrFail($request->product_identity);

        Payment::create([
            'rental_id' => $rental->id,
            'amount' => $rental->total_amount,
            'payment_method' => 'khalti',
            'transaction_id' => $request->idx,
            'status' => 'paid',
        ]);

        $rental->update(['status' => 'approved']);

        return response()->json(['success' => true]);
    }
}
