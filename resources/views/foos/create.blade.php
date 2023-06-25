<style>
    .create-form-container {
        width: 400px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    .form-input {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .radio-group {
        margin-top: 5px;
    }

    .error-message {
        color: red;
        margin-top: 5px;
    }

    .submit-button {
        text-align: center;
        margin-top: 20px;
    }

    .submit-button button {
        padding: 10px 20px;
        background-color: #1aa1ff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
    }
    .header-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
    }

    .header-container h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
    }
</style>

@extends('layouts.app')

@section('content')
    <div class="create-form-container">
        <div class="header-container">
            <h1 class="title is-2">New Foo</h1>
        </div>

        <form method="POST" action="/foos">
            @csrf

            <div class="form-group">
                <label for="name"><strong>Name</strong></label>

                <div>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input">

                    @error('name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="thud"><strong>Thud</strong></label>

                <div>
                    <textarea name="thud" id="excerpt" class="form-input">{{ old('thud') }}</textarea>

                    @error('thud')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="wombat"><strong>Wombat</strong></label>

                <div class="radio-group">
                    <label for="wombat_true">
                        <input type="radio" name="wombat" id="wombat_true" value="1" class="form-radio">
                        True
                    </label>
                    <label for="wombat_false">
                        <input type="radio" name="wombat" id="wombat_false" value="0" class="form-radio">
                        False
                    </label>

                    @error('wombat')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="submit-button">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection
