@extends('layouts.app')

@section('content')
    <style>
        /* Form Styles */
        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .radio-group {
            display: flex;
            align-items: center;
        }

        .radio-group label {
            margin-right: 10px;
        }

        button[type="submit"],
        button[type="button"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #45a049;
        }

        button[type="submit"] {
            margin-right: 10px;
        }

        button[type="submit"]:last-child {
            margin-right: 0;
        }

        /* Error Message Styles */
        .error-message {
            color: red;
            margin-top: 5px;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>

    <div>
        <h1>Edit Foo</h1>

        <form method="POST" action="{{ route('foos.update',$foo) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name"><strong>Name</strong></label>

                <div>
                    <input type="text" name="name" id="name" value="{{ $foo->name }}">

                    @error('name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="thud"><strong>Thud</strong></label>

                <div>
                    <textarea name="thud" id="thud">{{ $foo->thud }}</textarea>

                    @error('thud')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="wombat"><strong>Wombat</strong></label>

                <div>
                    <input type="radio" name="wombat" id="wombat" value="1" @if($foo->wombat) checked @endif>
                    <label for="wombat">True</label>

                    <input type="radio" name="wombat" id="wombat" value="0" @if(!$foo->wombat) checked @endif>
                    <label for="wombat">False</label>

                    @error('wombat')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>

        <form method="POST" action="/foos/{{ $foo->id }}">
            @csrf
            @method('DELETE')
            <button class="delete-button" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                {{ __('Delete') }}
            </button>
        </form>
    </div>
@endsection
