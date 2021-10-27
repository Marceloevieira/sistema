@extends('layouts.app')
@section('content')
<div class="wrapper">
    @include('layouts.nav-bar')
    <div id="content">
        @include('layouts.side-bar')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Form::open(['route' => 'unit-of-measure.store'] ) !!} 
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Cadastrar Unidade de Medida</h5>
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
                                            {!! Form::label('measured_unit', 'Unidade de Medida') !!} {!! Form::text('measured_unit' , null, ['class' => 'form-control','placeholder' => 'Insira a Unidade de Medida','aria-describedby' => 'measured_unithelp'] ) !!}
                                            <small id="measured_unithelp" class="form-text text-muted">Preencher com a unidade de medida.</small>
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('description', 'Descrição') !!} {!! Form::text('description' , null, ['class' => 'form-control','placeholder' => 'Insira a descrição','aria-describedby' => 'deschelp'] ) !!}
                                            <small id="deschelp" class="form-text text-muted">Preencher com a descrição.</small>
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
        </div>
    </div>
</div>
@endsection
