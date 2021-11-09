<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\QueryBuilder;

class TestController extends Controller
{
    public function index()
    {
        $user1=User::find(2);
        $users2 = User::paginate(10)->through(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('d/m/Y'),
            ];
        });
        $users3 = QueryBuilder::for(User::class)
            ->defaultSort('id')
            ->allowedSorts(['name', 'email', 'id'])
            ->paginate()
            ->withQueryString();

        return Inertia::render('Tests/index', [
            'user1' => $user1,
            'users2' => $users2,
            'users3' => $users3,

        ])->table(function (InertiaTable $table) {
            $table->addFilter('email', 'Email', [
                'sabina08@example.net' => 'sabina',
                'evaldas' => 'evaldas',]);
        });
    }
    public function create()
    {
        return Inertia::render('Tests/Users/Create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['unique:users','required', 'max:50'],
            'email' =>['required','email','max:50'],
            'password'=>['required','max:50'],
        ]);
        $user= User::create($request->all());

        return Redirect::route('test.index', $user)->with('success', 'User created.');

    }
    public function edit($id)
    {
        return Inertia::render('Tests/Users/Edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request)
    {
        if ($request->has('id')) {
            User::find($request->input('id'))->update($request->all());

            $request->session()->flash('success', 'User updated successfully!');
            return redirect()->back()
                ->with('message', 'Post Updated Successfully.');

        }
    }

    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            User::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}
