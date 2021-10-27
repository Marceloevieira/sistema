<?php

namespace App\Http\Controllers;

use App\Model\ProductGroup;
use App\Http\Requests\ProductGroupFormRequest;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{

    protected $description_table;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->description_table = "Grupo de Produto";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('product-group.index',array(
        'aProductGroups' => ProductGroup::paginate(10)
       ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('product-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductGroupFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGroupFormRequest $request)
    {
        
        $validated = $request->validated();

        ProductGroup::create($request->all());

        return redirect(route('product-group.index'))->with('success', $this->description_table.' cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGroup $ProductGroup)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGroup $ProductGroup)
    {
        return  view('product-group.edit',compact('ProductGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductGroupFormRequest  $request
     * @param  \App\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGroupFormRequest $request, ProductGroup $ProductGroup)
    {
        $validated = $request->validated();

        $ProductGroup->update($request->all());

        return redirect(route('product-group.index'))->with('success',  $this->description_table.' atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductGroup  $ProductGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGroup $ProductGroup)
    {
        $ProductGroup->delete();
        
        return redirect(route('product-group.index'))->with('success',  $this->description_table.' deletado!');
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
            $data =ProductGroup::select("id","description")
                    ->where('description','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }


}
