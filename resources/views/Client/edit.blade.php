@extends('layouts.app')
@section('content')
<div class="wrapper">
    @include('layouts.nav-bar')
    <div id="content">
        @include('layouts.side-bar')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Form::model($client,['route' => ['client.update',$client]] ) !!} 
                    @csrf
                    @method('PATCH') 
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Editar Cliente</h5>
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
                                            {!! Form::label('name', 'Nome') !!} {!! Form::text('name' , null, ['class' => 'form-control','placeholder' => 'Insira seu nome','aria-describedby' => 'emailHelp'] ) !!}
                                            <small id="emailHelp" class="form-text text-muted">Preencher nome completo.</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            {!! Form::label('cgc', 'CPF/CNPJ') !!} {!! Form::text('cgc' , null, ['class' => 'form-control','maxlength' => '18' ]) !!}
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('sex', 'Sexo') !!} {!! Form::select('sex', ['F' => 'Feminino', 'M' => 'Masculino'],null, ['class' => 'form-control','placeholder' => 'Selecione'] ) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            {!! Form::label('age', 'Idade') !!} {!! Form::number('age', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('phone1', 'Nº Telefone') !!} {!! Form::text('phone1' , null, ['class' => 'form-control','maxlength' => '9']) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            {!! Form::label( 'phone2', 'Nº Telefone 2') !!} {!! Form::number('phone2', null, ['class' => 'form-control','maxlength' => '9']) !!}
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('phone3', 'Nº Telefone 3') !!} {!! Form::text('phone3' , null, ['class' => 'form-control','maxlength' => '9']) !!}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                {!! Form::label('mail', 'E-Mail Address') !!} {!! Form::email('mail', null, ['class' => 'form-control','placeholder' => 'Enter email','aria-describedby' => 'emailHelp'] ) !!}
                                                <small id="emailHelp" class="form-text text-muted">Seu email está seguro conosco.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            {!! Form::label('note', 'Observações') !!} {!! Form::textarea('note' , null, ['class' => 'form-control']) !!}
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
