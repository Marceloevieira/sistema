<?php

namespace App\Http\Controllers;

use App\Model\PaymentCondition;
use App\Http\Requests\PaymentConditionFormRequest;
use Illuminate\Http\Request;

class PaymentConditionController extends Controller
{

    protected $description_table;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->description_table = "Condição de pagamento";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment-condition.index', array(
            'aPaymentConditions' => PaymentCondition::paginate(10)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('payment-condition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PaymentConditionFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentConditionFormRequest $request)
    {

        $validated = $request->validated();

        PaymentCondition::create($request->all());

        return redirect(route('payment-condition.index'))->with('success', $this->description_table . ' cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentCondition  $PaymentCondition
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentCondition $PaymentCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentCondition  $PaymentCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentCondition $PaymentCondition)
    {
        return  view('payment-condition.edit', compact('PaymentCondition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PaymentConditionFormRequest  $request
     * @param  \App\PaymentCondition  $PaymentCondition
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentConditionFormRequest $request, PaymentCondition $PaymentCondition)
    {
        $validated = $request->validated();

        $PaymentCondition->update($request->all());

        return redirect(route('payment-condition.index'))->with('success',  $this->description_table . ' atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentCondition  $PaymentCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentCondition $PaymentCondition)
    {
        $PaymentCondition->delete();

        return redirect(route('payment-condition.index'))->with('success',  $this->description_table . ' deletado!');
    }

    public function search(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data   = PaymentCondition::select("id", "description")
                ->where('description', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
}
