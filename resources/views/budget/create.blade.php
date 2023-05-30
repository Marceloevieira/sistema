@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        {!! Form::open(['route' => 'budget.store'] ) !!}
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cadastro Orçamento</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
                @endif
                <div class="row form-group">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Orçamento</h5>
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        {!! Form::label('date', 'Data') !!} {!! Form::date('date' , date("Y-m-d"), ['class' => 'form-control','placeholder' => 'Insira a descrição','readonly' =>'readonly'] ) !!}
                                    </div>
                                    <div class="col-sm-8">
                                        {!! Form::label('client_id', 'Cliente') !!} {!! Form::select('client_id', $aClients ,'', ['class' => 'form-control','placeholder' => 'Selecione']) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-7">
                                        {!! Form::label('address', 'Endereço') !!} {!! Form::text('address' , null, ['class' => 'form-control','placeholder' => 'Insira seu Endereço'] ) !!}
                                    </div>
                                    <div class="col-sm-2">
                                        {!! Form::label('ddd', 'DDD') !!} {!! Form::text('ddd' , null, ['class' => 'form-control','placeholder' => 'Insira seu DDD'] ) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        {!! Form::label('phone', 'Nº Telefone') !!} {!! Form::text('phone' , null, ['class' => 'form-control','placeholder' => 'Insira seu Nº Telefone'] ) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm">
                                        {!! Form::label('payment_condition_id', 'Condição pagamento') !!} {!! Form::select('payment_condition_id', $aPaymentConditions ,'', ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                    </div>
                                    <div class="col-sm">
                                        {!! Form::label('deadline', 'Prazo Entrega') !!} {!! Form::text('deadline' , null, ['class' => 'form-control','placeholder' => 'Insira seu Prazo Entrega'] ) !!}
                                    </div>
                                    <div class="col-sm">
                                        {!! Form::label('expiration_date', 'Data Validade') !!} {!! Form::date('expiration_date' , null, ['class' => 'form-control'] ) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Itens do orçamento</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12" style="overflow-x:auto;">
                                    <table class="table table-hover  " id="produtions-itens">
                                        <thead>
                                            <tr>
                                                <th class="align-middle text-left ">Produto</th>
                                                <th class="align-middle text-right ">Quantidade</th>
                                                <th class="align-middle text-center ">Val. Unitario (R$)</th>
                                                <th class="align-middle text-right ">Desconto</th>
                                                <th class="align-middle text-right">Val. Total (R$)</th>
                                                <th class="align-middle text-right ">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (old('product_id') != 0)
                                            @else
                                            <tr data-row="0">
                                                <td width="20%" data-label="Codigo" class="align-middle  text-nowrap">
                                                    {!! Form::select('product_id[]',[] ,'', ['class' => 'form-control select-product','placeholder' => 'Selecione'] ) !!}</td>
                                                <td width="14%" data-label="Quantidade" class="align-middle ">
                                                    {!! Form::text('amount[]', null, ['class' => 'form-control input_calc']) !!}
                                                </td>
                                                <td width="14%" data-label="Val. Unitario(R$)" class="align-middle ">
                                                    {!! Form::text('unitary_value[]', null, ['class' => 'form-control input_calc']) !!}
                                                </td>
                                                <td width="14%" data-label="Desconto" class="align-middle ">
                                                    {!! Form::text('discount[]', null, ['class' => 'form-control input_calc']) !!}
                                                </td>
                                                <td width="14%" data-label="Val. Total(R$)" class="align-middle ">
                                                    {!! Form::text('total_value[]', null, ['class' => 'form-control input_calc','readonly' => 'true']) !!}
                                                </td>
                                                <td width="10%" data-label="Ações" class="align-middle text-center ">
                                                    {!! Form::hidden('deleted[]', null) !!}
                                                    {!! Form::hidden('id[]', null) !!}
                                                    <button type="button" name="btn-delete-produtions-itens" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7" class="align-middle ">
                                                    <button type="button" id="btn-add-produtions-itens" class="btn btn-sm btn-success">
                                                        <i class="fas fa-plus-circle"></i>
                                                        Adicionar novo item
                                                    </button>

                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Salvar',array('class' => 'btn btn-primary','style' => 'float:right;')); !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection