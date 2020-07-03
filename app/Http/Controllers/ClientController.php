<?php

namespace App\Http\Controllers;

use App\Client;
use App\Diversity;
use App\Http\Resources\ClientResourceCollection;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function indexView()
    {
        return view('clients',['clients'=>Client::all(),'diversities'=>Diversity::all()]);
    }

    public function show(Client $client): ClientResource
    {
        return new ClientResource($client);
    }

    public function index(): ClientResourceCollection
    {
        return new ClientResourceCollection(Client::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $client = Client::create($request->all());
        return new ClientResource($client);
    }

    public function update(Client $client, Request $request): ClientResource
    {
        $client->name = $request->input('name');
        $client->type = $request->input('type');
        $client->diversity = $request->input('diversity');
        $client->enable = $request->input('enable')?1:0;

        $client->save();
        return new ClientResource($client);
    }


    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json();
    }
}
