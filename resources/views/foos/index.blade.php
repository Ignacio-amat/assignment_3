@extends('layouts.app')
<style>
    .table {
        width: 95%;
        border-collapse: collapse;
        text-align: center;
        margin: auto;
    }

    .table th,
    .table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .highlighted-row {
        background-color: #1aa1ff;
    }

    .button {
        margin: 5px;
    }

    .button-link {
        text-decoration: none;
        color: #fff;
    }
    .header-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
        font-size: 40px;
        font-weight: bold;
    }
    .create-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #5fba7d;
        color: white;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .create-button:hover {
        background-color: #4a9b68;
    }

</style>
@section('content')
    @include('foos.notifications')
    <div class="header-container">
        <h1 class="title is-2">Foos</h1>
    </div>
    <script src="/js/notifications.js" type="text/javascript"></script>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Thud</th>
            <th>Wombat</th>
            <th>Kazaam</th>
            <th>Show</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($foos as $foo)
            <tr @if($foo->wombat) class="highlighted-row" @endif>
                <td>{{ $foo->name }}</td>
                <td>{{ $foo->thud }}</td>
                <td>{{ $foo->wombat }}</td>
                <td>{{ $foo->kazaam() }}</td>
                <td>
                    <a href="{{ route('foos.show', $foo) }}" class="button is-primary">Show</a>
                </td>
                @if(Auth::user()->id === $foo->user_id || Auth::user()->role === 'admin')
                    <td>
                        <a href="{{ route('foos.edit', $foo) }}" class="button is-primary">Edit</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $foos->links() }}

    <div class="has-text-centered">
        <a href="{{ route('foos.create') }}" class="create-button">Create</a>
    </div>
@endsection
