@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        {!! Form::open(['route' => 'product.store','files' => true] ) !!}
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cadastro Produto</h5>
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
                    <div class="col-sm">
                        {!! Form::label('description', 'Descrição') !!} {!! Form::text('description' , '', ['class' => 'form-control','placeholder' => 'Insira a descrição','aria-describedby' => 'descriptionhelp'] ) !!}
                        <small id="descriptionhelp" class="form-text text-muted">Preencher com a descrição do produto.</small>
                    </div>
                    <div class="col-sm">
                        <div class="custom-file">
                            {!! Form::file('image',['class' => 'custom-file-input ']); !!}
                            {!! Form::label('image', 'Escolha o Arquivo...', ['class' => 'custom-file-label' ]) !!}
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm">
                        {!! Form::label('type_id', 'Tipo') !!} {!! Form::select('type_id', $aTypeOfProduct ,'', ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                    </div>
                    <div class="col-sm">
                        {!! Form::label('group_id', 'Grupo') !!} {!! Form::select('group_id', $aProductGroup ,'', ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm">
                        {!! Form::label('um_id', 'Primeira Unidade de Medida') !!} {!! Form::select('um_id', $aUnitOfMeasure ,'', ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                    </div>
                    <div class="col-sm">
                        {!! Form::label('um2_id', 'Segunda Unidade de Medida') !!} {!! Form::select('um2_id', $aUnitOfMeasure ,'', ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm">
                        {!! Form::label('conversion_type', 'Tipo conversão') !!} {!! Form::select('conversion_type', ['D' => 'Divisão' ,'M' => 'Multiplicação' ],'', ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                    </div>
                    <div class="col-sm">
                        {!! Form::label('conversion_factor', 'Fator de conversão') !!} {!! Form::number('conversion_factor', '', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm">
                        {!! Form::label('warehouse_id', 'Armazém') !!} {!! Form::select('warehouse_id', $aWarehouse ,'', ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                    </div>
                    <div class="col-sm"></div>
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