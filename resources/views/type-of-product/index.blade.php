@extends('layouts.app')
@section('content')
<div class="wrapper">
    @include('layouts.nav-bar')
    <div id="content">
        @include('layouts.side-bar')
        <div class="container">
            <div class="row">
                <div class="col-12">
                  @if(session()->get('success'))
                     <div class="col-sm-12">
                        <div class="alert alert-success">
                           {{ session()->get('success') }}  
                        </div>
                     </div>
                  @endif
                  <div class="card">
                     <div class="card-header">
                        <div class="row">  
                           <div class="col-8">  
                              <h5 class="card-title">Tipos de Produto</h5>
                           </div>    
                           <div class="col-4"> 
                              <ul class="nav justify-content-end">
                                 <li class="nav-item">
                                    <a class="btn btn-primary" href="{!! route('type-of-product.create') !!}" role="button">Incluir</a>
                                 </li>
                              </ul>
                           </div>    
                        </div>         
                     </div>
                     <div class="card-body">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">Id</th>
                                 <th scope="col">Abreviação</th>
                                 <th scope="col">Descrição</th>
                                 <th class="th_action" scope="col" colspan="2" align="center">Ações</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach( $aTypeOfProducts  as $TypeOfProduct)     
                              <tr>
                                 <th scope="row">{!!  $TypeOfProduct->id;  !!} </th>
                                 <td>{!!  $TypeOfProduct->abbreviation;  !!}</td>
                                 <td>{!!  $TypeOfProduct->description;  !!}</td>

                                 <td><a class="btn btn-secondary" href="{{ route('type-of-product.edit',$TypeOfProduct) }}">
                                             Editar
                                             </a></td>
                                 <td>
                                    {!! Form::open(['route' => ['type-of-product.destroy',$TypeOfProduct]] ) !!}  
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger" type="submit">Delete</button>
                                    {!! Form::close() !!}
                                 </td>
                              </tr>
                              @endforeach    
                           </tbody>
                        </table>
                        {!!  $aTypeOfProducts->render(); !!}
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
