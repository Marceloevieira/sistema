<?php

namespace App\Http\Controllers;

use App\Model\UnitOfMeasure;
use App\Http\Requests\UnitOfMeasureFormRequest;
use Illuminate\Http\Request;

class UnitOfMeasureController extends Controller
{

    protected $description_table;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->description_table = "Unidades de Medida";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('unit-of-measure.index',array(
        'aUnitOfMeasures' => UnitOfMeasure::paginate(10)
       ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('unit-of-measure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\UnitOfMeasureFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitOfMeasureFormRequest $request)
    {
        $validated = $request->validated();

        UnitOfMeasure::create($request->all());

        return redirect(route('unit-of-measure.index'))->with('success', $this->description_table.' cadastrado!');
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
     * @param  \App\Model\UnitOfMeasure  $UnitOfMeasure
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitOfMeasure $UnitOfMeasure)
    {
        return  view('unit-of-measure.edit',compact('UnitOfMeasure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\UnitOfMeasureFormRequest  $request
     * @param  \App\Model\UnitOfMeasure  $UnitOfMeasure
     * @return \Illuminate\Http\Response
     */
    public function update(UnitOfMeasureFormRequest $request, UnitOfMeasure $UnitOfMeasure)
    {
        $validated = $request->validated();

        $UnitOfMeasure->update($request->all());

        return redirect(route('unit-of-measure.index'))->with('success', $this->description_table.' atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\UnitOfMeasure  $UnitOfMeasure
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitOfMeasure $UnitOfMeasure)
    {
        $UnitOfMeasure->delete();
        
        return redirect(route('unit-of-measure.index'))->with('success', $this->description_table.' deletado!');
    }

    /**
     * API
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =UnitOfMeasure::select("id","description")
                    ->where('description','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }

}
