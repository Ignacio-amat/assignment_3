@extends('layouts.app')

@section('content')
    <style>
        /* Show Page Styles */
        .show-container {
            max-width: 600px;
            margin: 10px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .show-container p {
            margin-bottom: 10px;
        }
    </style>

    <div class="show-container">
        <p><strong>Name:</strong> {{ $foo->name }}</p>
        <p><strong>Thud:</strong> {{ $foo->thud }}</p>
        <p><strong>Wombat:</strong> {{ $foo->wombat }}</p>
    </div>
@endsection
