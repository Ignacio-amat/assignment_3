<?php

namespace App\Http\Controllers;

use App\Models\Foo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooController extends Controller
{
    public function index()
    {
        $foos = Foo::latest()->simplePaginate(10);

        return view('foos.index', compact('foos'));
    }

    public function show(FOO $foo)
    {
        return view('foos.show', compact('foo'));
    }

    public function create(FOO $foo)
    {
        if (!Auth::check()) {
            abort(403);
        }

        return view('foos.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        Foo::create($this->validateFoo($request));
        return redirect(route('foos.index'))->with('status', 'You have created a foo');
    }

    public function edit(Foo $foo)
    {
        if (Auth::check() && Auth::user()->id === $foo->user_id || Auth::user()->role === 'admin') {
            return view('foos.edit', compact('foo'));
        }

        abort(403);
    }

    public function update(Request $request, Foo $foo)
    {
        if (Auth::check() && Auth::user()->id === $foo->user_id || Auth::user()->role === 'admin') {
            $foo->update($this->validateFoo($request));
            return redirect(route('foos.index', compact('foo')));
        }

        abort(403);
    }

    public function destroy(Foo $foo)
    {
        $foo->delete();
        return redirect(route('foos.index'))->with('danger', 'Foo has been deleted');
    }

    public function validateFoo(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'thud' => 'required|integer|min:0',
            'wombat' => 'required|boolean',
            'user_id' => 'required|integer'
        ]);
    }
}
