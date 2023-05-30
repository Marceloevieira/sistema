<?php

namespace App\Http\Controllers;

use App\Model\Warehouse;
use App\Http\Requests\WarehouseFormRequest;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    protected $description_table;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->description_table = "Armazém";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Warehouse.index', array(
            'aWarehouses' => Warehouse::paginate(10)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\WarehouseFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseFormRequest $request)
    {
        $validated = $request->validated();

        Warehouse::create($request->all());

        return redirect(route('Warehouse.index'))->with('success', $this->description_table . ' cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Warehouse  $Warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $Warehouse)
    {
        return  view('Warehouse.edit', compact('Warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\WarehouseFormRequest  $request
     * @param  \App\Model\Warehouse  $Warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseFormRequest $request, Warehouse $Warehouse)
    {
        $validated = $request->validated();

        $Warehouse->update($request->all());

        return redirect(route('Warehouse.index'))->with('success', $this->description_table . ' atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Warehouse  $Warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $Warehouse)
    {
        $Warehouse->delete();

        return redirect(route('Warehouse.index'))->with('success', $this->description_table . ' deletado!');
    }

    /**
     * API
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data   = Warehouse::select("id", "description")
                ->where('description', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
}
