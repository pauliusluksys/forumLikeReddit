<?php

namespace App\Http\Controllers;
use App\Models\User;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('name', 'LIKE', "%{$value}%")->orWhere('email', 'LIKE', "%{$value}%");
            });
        });

        $users = QueryBuilder::for(User::class)
            ->defaultSort('name')
            ->allowedSorts(['name', 'email', 'language_code'])
            ->allowedFilters(['name', 'email', $globalSearch])
            ->paginate()
            ->withQueryString();

        return Inertia::render('Table/Index', [
            'users' => $users,
        ])->table(function (InertiaTable $table) {
            $table->addSearchRows([
                'name' => 'Name',
                'email' => 'Email address',
            ])->addFilter('name', 'namesad', [
                'Miss' => 'Miss',
                'blalwadb' => 'Nadederlands',
            ])->addColumns([
                'email' => 'Email address',
                'language_code' => 'Language',
            ]);
        });
    }
}
