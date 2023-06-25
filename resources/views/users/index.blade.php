@extends('layouts.app')
<style>
    div h1 {
        text-align: center;
        font-size: 40px;
        font-weight: bold;
    }
    .user-table-container {
        margin: 20px;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-table th,
    .user-table td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    .user-table th {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    .user-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .user-table button {
        padding: 5px 10px;
        background-color: #1aa1ff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
    }

    .user-table button a {
        color: #fff;
        text-decoration: none;
    }
</style>

@section('content')
    <div class="user-table-container">
        <h1 class="">All Users</h1>
        <button style="padding: 20px; border-radius: 12px; margin-bottom: 10px; background-color: #1aa1ff; color: #fff"><a href="{{ route('users.create') }}">Create</a></button>
        <table class="user-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->isAdmin() ? 'Admin' : 'Normal' }}</td>
                    <td>
                        <button style="margin-bottom: 20px"><a href="{{ route('users.show', $user) }}">Show</a></button>
                        <button style="margin-bottom: 20px"><a href="{{ route('users.edit', $user) }}">Edit</a></button>
                        <form method="POST" action="/users/{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                {{ __('Delete') }}
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
