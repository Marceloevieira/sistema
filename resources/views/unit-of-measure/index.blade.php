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
                              <h5 class="card-title">Unidades de Medida</h5>
                           </div>    
                           <div class="col-4"> 
                              <ul class="nav justify-content-end">
                                 <li class="nav-item">
                                    <a class="btn btn-primary" href="{!! route('unit-of-measure.create') !!}" role="button">Incluir</a>
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
                                 <th scope="col">Unidade de Medida</th>
                                 <th scope="col">Descrição</th>
                                 <th scope="col" colspan="2" class="th_action">Ações</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach( $aUnitOfMeasures  as $UnitOfMeasure)     
                              <tr>
                                 <th scope="row">{!!  $UnitOfMeasure->id;  !!} </th>
                                 <td>{!!  $UnitOfMeasure->measured_unit;  !!}</td>
                                 <td>{!!  $UnitOfMeasure->description;  !!}</td>

                                 <td><a class="btn btn-secondary" href="{{ route('unit-of-measure.edit',$UnitOfMeasure) }}">
                                             Editar
                                             </a></td>
                                 <td>
                                    {!! Form::open(['route' => ['unit-of-measure.destroy',$UnitOfMeasure]] ) !!}  
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger" type="submit">Delete</button>
                                    {!! Form::close() !!}
                                 </td>
                              </tr>
                              @endforeach    
                           </tbody>
                        </table>
                        {!!  $aUnitOfMeasures->render(); !!}
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
