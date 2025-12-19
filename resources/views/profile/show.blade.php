@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Profile Card -->
    <div class="profile-card">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="user-info">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }}</p>
                <span class="role-badge">Role: {{ $user->role ?? 'User' }}</span>
            </div>
        </div>

        <!-- Profile Details Section -->
        <div class="profile-section">
            <h3 class="section-title">Profile Details</h3>
            <div class="details-grid">
                <div class="detail-item">
                    <div class="detail-label">Name</div>
                    <div class="detail-value">{{ $user->name }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ $user->email }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Phone</div>
                    <div class="detail-value">{{ $user->phone ?? 'Not provided' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Address</div>
                    <div class="detail-value">{{ $user->address ?? 'Not provided' }}</div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="actions">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>


<style>
    /* Reset and base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fa;
        color: #333;
        line-height: 1.6;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    /* Profile card styling */
    .profile-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-bottom: 25px;
    }

    /* Profile header */
    .profile-header {
        display: flex;
        align-items: center;
        padding: 30px;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
    }

    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: bold;
        margin-right: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
    }

    .user-info h2 {
        font-size: 24px;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .user-info p {
        opacity: 0.9;
        margin-bottom: 5px;
        font-size: 15px;
    }

    .role-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 14px;
        margin-top: 5px;
    }

    /* Profile details section */
    .profile-section {
        padding: 25px 30px;
        border-bottom: 1px solid #eee;
    }

    .profile-section:last-child {
        border-bottom: none;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f4f8;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .detail-item {
        margin-bottom: 15px;
    }

    .detail-label {
        font-size: 13px;
        font-weight: 600;
        color: #7f8c8d;
        text-transform: uppercase;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }

    .detail-value {
        font-size: 16px;
        color: #2c3e50;
        font-weight: 500;
    }

    /* Action buttons */
    .actions {
        display: flex;
        justify-content: flex-end;
        padding: 20px 30px;
    }

    .btn {
        padding: 12px 25px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 600px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
            padding: 25px 20px;
        }

        .avatar {
            margin-right: 0;
            margin-bottom: 15px;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }

        .actions {
            justify-content: center;
        }
    }
</style>
@endsection