<?php

namespace App\Http\Controllers;

use App\Diversity;
use App\Http\Resources\ItemResource;
use App\Http\Resources\ItemResourceCollection;
use App\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function indexView()
    {
        return view('items',['items'=>Item::all(),'diversities'=>Diversity::all()]);
    }

    public function show(Item $item): ItemResource

    {
        return new ItemResource($item);
    }

    public function index(): ItemResourceCollection
    {
        return new ItemResourceCollection(Item::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'diversity'=> 'required'
        ]);

        $item = Item::create($request->all());
        return new ItemResource($item);
    }

    public function update(Item $item, Request $request): ItemResource
    {
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->diversity = $request->input('diversity');
        $item->has_vat = $request->input('has_vat')?1:0;
        $item->enable = $request->input('enable')?1:0;

        $item->save();
        return new ItemResource($item);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json();
    }
};
