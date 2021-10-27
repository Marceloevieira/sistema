<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\TypeOfProduct;
use App\Model\UnitOfMeasure;
use App\Model\ProductGroup;
use App\Model\Warehouse;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $description_table;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->description_table = "Produto";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index',array(
            'aProducts' => Product::paginate(10)
       ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $aTypeOfProduct = TypeOfProduct::All()->pluck('description','id'); 
        $aProductGroup  = ProductGroup::All()->pluck('description','id'); 
        $aUnitOfMeasure = UnitOfMeasure::All()->pluck('description','id');  
        $aWarehouse     = Warehouse::All()->pluck('description','id');  

        return  view('product.create',compact('aTypeOfProduct','aProductGroup','aUnitOfMeasure','aWarehouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {

        $validated = $request->validated();
            
        if ($request->hasFile('image') && $request->file('image')->isValid() )
        {
          $name = uniqid(date('HisYmd')).'.'.$request->image->getClientOriginalExtension();      
          if ($request->image->storeAs('products', $name)) {
            $request->merge(['imagem' => $name ]);    
          } 
        } 

        $product =  Product::create($request->all());      

        return redirect(route('product.index'))->with('success', $this->description_table.' cadastrado!');   
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $aTypeOfProduct = TypeOfProduct::All()->pluck('description','id'); 
        $aProductGroup  = ProductGroup::All()->pluck('description','id'); 
        $aUnitOfMeasure = UnitOfMeasure::All()->pluck('description','id');  
        $aWarehouse     = Warehouse::All()->pluck('description','id');

        return  view('product.edit',compact('product','aTypeOfProduct','aProductGroup','aUnitOfMeasure','aWarehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request,Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid() )
        {
          $name = uniqid(date('HisYmd')).'.'.$request->image->getClientOriginalExtension();      
          if ($request->image->storeAs('products', $name)) {
            $request->merge(['imagem' => $name ]);    
          } 
        } 

        $product->update($request->all());

        return redirect(route('product.index'))->with('success', $this->description_table.' atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
        
      return redirect(route('product.index'))->with('success', $this->description_table.' deletado!');
    }

    public function search(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =Product::select("id","description")
                    ->where('description','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
}
