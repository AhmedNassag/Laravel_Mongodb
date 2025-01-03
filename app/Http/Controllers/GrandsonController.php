<?php

namespace App\Http\Controllers;

use App\Models\Grandson;
use Illuminate\Http\Request;

class GrandsonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sonId = \request()->has('son_id') && \request()->input('son_id') !== '' ? \request()->input('son_id') : null;
        if (!$sonId) {
            $grandsons = collect([]);
            auth()->user()->sons()->each(function ($son) use ($grandsons) {
                $grandsons->add($son->grandsons);
            });

            $grandsons = collect($grandsons->flatten())->paginate(5);

        }else {
            $grandsons = auth()->user()->sons()->with('grandsons')->where('_id', $sonId)->first()->grandsons->paginate(5);
        }
        return view('grandsons.index', compact('grandsons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sons = auth()->user()->sons;
        return view('grandsons.create', compact('sons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'son_id'     => 'required',
            'name'       => 'required|string',
            'birth_date' => 'required|date_format:Y-m-d'
        ]);

        Grandson::create([
            'son_id'     => $request->input('son_id'),
            'name'       => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
        ]);

        return back()->with('status', 'Grandson is created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grandson $grandson)
    {
        $sons = auth()->user()->sons;
        return view('grandsons.edit', compact('sons', 'grandson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grandson $grandson)
    {
        $request->validate([
            'son_id' => 'required',
            'name' => 'required',
            'birth_date' => 'required|date_format:Y-m-d'
        ]);

        $grandson->update([
            'son_id' => $request->input('son_id'),
            'name' => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
        ]);

        return back()->with('status', 'Grandson is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grandson $grandson)
    {
        $grandson->delete();
        return back()->with('status', 'Grandson is deleted');
    }

    /**
     * Paginate Collection.
     */
    public function paginateCollection($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator(array_values($items->forPage($page, $perPage)->toArray()), $items->count(), $perPage, $page, $options);
        //ref for array_values() fix: https://stackoverflow.com/a/38712699/3553367
    }
}
