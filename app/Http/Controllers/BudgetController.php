<?php

namespace App\Http\Controllers;

use App\Model\Budget;
use App\Model\Budget_item;
use App\Model\Client;
use App\Model\PaymentCondition;
use App\Model\Product;
use App\Http\Requests\BudgetFormRequest;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('budget.index', array(
            'aBudgets' => Budget::paginate(10)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aClients = Client::All()->pluck('name', 'id');
        $aPaymentConditions = PaymentCondition::All()->pluck('description', 'id');
        $aProducts = Product::All()->pluck('description', 'id');

        return  view('budget.create', compact('aClients', 'aPaymentConditions', 'aProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BudgetFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BudgetFormRequest $request)
    {

        //dd($request->all());	   
        $validated = $request->validated();
        $budget = Budget::create($request->all());

        if (!empty($budget)) {

            for ($i = 0; $i < count($request->product_id); $i++) {

                if (empty($request->deleted[$i])) {
                    $budget_item = new Budget_item();
                    $budget_item->budget_id    = $budget->id;
                    $budget_item->product_id   = $request->product_id[$i];
                    $budget_item->quantidade   = floatval($request->quantidade[$i]);
                    $budget_item->vlr_unitario = floatval($request->vlr_unitario[$i]);
                    $budget_item->vlr_total    = floatval($request->vlr_total[$i]);
                    $budget_item->desconto     = floatval($request->desconto[$i]);
                    $budget_item->tot_liquido  = floatval($request->tot_liquido[$i]);
                    $budget_item->save();
                }
            }
        }

        return redirect(route('budget.index'))->with('success', 'Orçamento cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {

        $aClients = Client::All()->pluck('name', 'id');
        $aPaymentConditions = PaymentCondition::All()->pluck('descricao', 'id');
        $aProducts = Product::All()->pluck('descricao', 'id');

        return  view('budget.edit', compact('budget', 'aClients', 'aPaymentConditions', 'aProducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BudgetFormRequest  $request
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(BudgetFormRequest $request, Budget $budget)
    {
        $validated = $request->validated();

        $budget->update($request->all());

        if (!empty($budget)) {

            //           dd($request->all());

            for ($i = 0; $i < count($request->product_id); $i++) {


                if ((empty($request->id[$i]) && empty($request->deleted[$i])) || (!empty($request->id[$i]) && empty($request->deleted[$i]))) {

                    if (!empty($request->id[$i])) {
                        $budget_item =  Budget_item::find($request->id[$i]);
                    } else {
                        $budget_item = new Budget_item();
                    }

                    $budget_item->budget_id    = $budget->id;
                    $budget_item->product_id   = $request->product_id[$i];
                    $budget_item->quantidade   = floatval($request->quantidade[$i]);
                    $budget_item->vlr_unitario = floatval($request->vlr_unitario[$i]);
                    $budget_item->vlr_total    = floatval($request->vlr_total[$i]);
                    $budget_item->desconto     = floatval($request->desconto[$i]);
                    $budget_item->tot_liquido  = floatval($request->tot_liquido[$i]);
                    $budget_item->save();
                } else {

                    if (!empty($request->id[$i]) && !empty($request->deleted[$i])) {
                        $budget_item =  Budget_item::find($request->id[$i]);
                        $budget_item->delete();
                    }
                }
            }
        }


        return redirect(route('budget.index'))->with('success', 'Orçamento atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {

        foreach ($budget->budget_items as $budget_item) {

            $budget_item->delete();
        }

        $budget->delete();

        return redirect(route('budget.index'))->with('success', 'Orçamento deletado!');
    }
}
