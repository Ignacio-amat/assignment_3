<?php

namespace App\Http\Controllers;

use App\Models\FOO;
use Illuminate\Http\Request;

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
        return view('foos.create');
    }

    public function store(Request $request)
    {
        Foo::create($this->validateFoo($request));

        return redirect(route('foos.index'))->with('status', 'You have created a foo');
    }

    public function edit(Foo $foo)
    {
        return view('foos.edit', compact('foo'));
    }

    public function update(Request $request, Foo $foo)
    {
        $foo->update($this->validateFoo($request));

        return redirect(route('foos.index', compact('foo')));
    }

    public function destroy(Foo $foo)
    {
        $foo->delete();

        return redirect(route('foos.index'))->with('danger', 'Foo has been deleted');
    }

    public function validateFoo(Request $request)
    {
        return $request -> validate([
            'name' => 'required',
            'thud' => 'required|integer|min:0',
            'wombat' => 'required|boolean'
        ]);
    }
}
