<?php

namespace App\Http\Controllers;

use App\Client;
use App\Diversity;
use App\Http\Resources\DiversityResource;
use App\Http\Resources\DiversityResourceCollection;
use App\Item;
use Illuminate\Http\Request;

class DiversityController extends Controller
{
    public function indexView()
    {
        return view('diversities',['diversities'=>Diversity::withCount(['items'=>function ($query) {
            $query->where('enable',1 );
        },'clients'=>function ($query) {
            $query->where('enable', 1);
        }]
       )->get()
       ]);
    }


    public function show(Diversity $diversity): DiversityResourceCollection
    {
        $items=Item::where('diversity', $diversity->name)->get();
        $clients=Client::where('diversity', $diversity->name)->get();
        return new DiversityResourceCollection(['items'=>$items,'clients'=>$clients]);
    }

    public function index(): DiversityResourceCollection
    {

        return new DiversityResourceCollection(Diversity::withCount(['items'=>function ($query) {
            $query->where('enable',1 );
        },'clients'=>function ($query) {
            $query->where('enable', 1);
        }]
       )->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $diversity = Diversity::create($request->all());
        return new DiversityResource($diversity);
    }



    public function update(Diversity $diversity, Request $request): DiversityResource
    {
        $diversity->name = $request->input('name');
        $diversity->enable = $request->input('enable')?1:0;

        $diversity->save();
        return new DiversityResource($diversity);
    }

    public function destroy(Diversity $diversity)
    {
        $diversity->items()->delete();
        $diversity->delete();

        return response()->json();
    }

}
