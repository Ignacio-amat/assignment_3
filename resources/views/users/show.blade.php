@extends('layouts.app')
<style>
    .show-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid #ccc;
        padding: 20px;
        margin: 10px auto;
        max-width: 400px;
        background-color: ;
    }

    .show-container h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
    }

    .user-details {
        text-align: center;
        margin-bottom: 20px;
    }

    .actions {
        text-align: center;
    }

    .actions button {
        padding: 10px 20px;
        background-color: #1aa1ff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
    }
</style>
@section('content')
    <div class="show-container">
        <div class="user-details">
            <h1 class="title is-2">User Details</h1>
            <hr>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
        </div>
    </div>

@endsection
