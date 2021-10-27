<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Http\Requests\ClientFormRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('client.index',array(
        'aClients' => Client::paginate(10)
       ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientFormRequest $request)
    {
        dd($request);
        $validated = $request->validated();

        Client::create($request->all());

        return redirect(route('client.index'))->with('success', 'Cliente cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return  view('client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientFormRequest $request, Client $client)
    {
        $validated = $request->validated();

        $client->update($request->all());

        return redirect(route('client.index'))->with('success', 'Cliente atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        
        return redirect(route('client.index'))->with('success', 'Cliente deletado!');
    }


    public function search(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =Client::select("id","name as description")
                    ->where('name','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }    
}
