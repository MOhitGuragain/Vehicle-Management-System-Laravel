<script src="https://khalti.com/static/khalti-checkout.js"></script>

<button id="khalti-button" class="bg-purple-600 text-white px-6 py-2 rounded">
    Pay with Khalti
</button>

<script>
var config = {
    "publicKey": "test_public_key_xxxxx",
    "productIdentity": "{{ $rental->id }}",
    "productName": "Vehicle Rental",
    "amount": {{ $rental->total_amount * 100 }},
    "eventHandler": {
        onSuccess(payload) {
            fetch("{{ route('payment.khalti.verify') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(payload)
            }).then(() => {
                window.location.href = "/dashboard";
            });
        }
    }
};

var checkout = new KhaltiCheckout(config);
document.getElementById("khalti-button").onclick = function () {
    checkout.show();
}
</script>
