<?php

namespace App\Http\Controllers;

use App\Model\TypeOfProduct;
use App\Http\Requests\TypeOfProductFormRequest;
use Illuminate\Http\Request;

class TypeOfProductController extends Controller
{

    protected $description_table;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->description_table = "Tipo de Produto";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('type-of-product.index', array(
            'aTypeOfProducts' => TypeOfProduct::paginate(10)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('type-of-product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TypeOfProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeOfProductFormRequest $request)
    {

        $validated = $request->validated();

        TypeOfProduct::create($request->all());

        return redirect(route('type-of-product.index'))->with('success', $this->description_table . ' cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfProduct  $TypeOfProduct
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfProduct $TypeOfProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfProduct  $TypeOfProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfProduct $TypeOfProduct)
    {
        return  view('type-of-product.edit', compact('TypeOfProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TypeOfProductFormRequest  $request
     * @param  \App\TypeOfProduct  $TypeOfProduct
     * @return \Illuminate\Http\Response
     */
    public function update(TypeOfProductFormRequest $request, TypeOfProduct $TypeOfProduct)
    {
        $validated = $request->validated();

        $TypeOfProduct->update($request->all());

        return redirect(route('type-of-product.index'))->with('success',  $this->description_table . ' atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfProduct  $TypeOfProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfProduct $TypeOfProduct)
    {
        $TypeOfProduct->delete();

        return redirect(route('type-of-product.index'))->with('success',  $this->description_table . ' deletado!');
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
            $data = TypeOfProduct::select("id", "description")
                ->where('description', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
}
