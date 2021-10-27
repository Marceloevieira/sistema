@extends('layouts.app')
@section('content')
<div class="wrapper">
    @include('layouts.nav-bar')
    <div id="content">
        @include('layouts.side-bar')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Form::model($product,['route' => ['product.update',$product],'files' => true] ) !!} 
                    @csrf 
                    @method('PATCH')  
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Editar Produto</h5>
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
                                <div class="container">
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            {!! Form::label('description', 'Descrição') !!} {!! Form::text('description' , null, ['class' => 'form-control','placeholder' => 'Insira a descrição','aria-describedby' => 'deschelp'] ) !!}
                                            <small id="deschelp" class="form-text text-muted">Preencher com a descrição do produto.</small>
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
                                            {!! Form::label('type_id', 'Tipo') !!} {!! Form::select('type_id', $aTypeOfProduct ,null, ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('group_id', 'Grupo') !!} {!! Form::select('group_id', $aProductGroup ,null, ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                             {!! Form::label('um_id', 'Primeira Unidade de Medida') !!} {!! Form::select('um_id', $aUnitOfMeasure ,null, ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                        </div>
                                        <div class="col-sm">
                                             {!! Form::label('um2_id', 'Segunda Unidade de Medida') !!} {!! Form::select('um2_id', $aUnitOfMeasure ,null, ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            {!! Form::label('conversion_type', 'Tipo conversão') !!} {!! Form::select('conversion_type', ['D' => 'Divisão'   ,'M' => 'Multiplicação' ],null, ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('conversion_factor', 'Fator de conversão') !!} {!! Form::number('conversion_factor', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            {!! Form::label('warehouse_id', 'Armazém') !!} {!! Form::select('warehouse_id', $aWarehouse ,null, ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                        </div>
                                        <div class="col-sm"></div>                                        
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
        </div>
    </div>
</div>
@endsection
