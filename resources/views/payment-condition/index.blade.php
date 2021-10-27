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
                              <h5 class="card-title">Condição de pagamento</h5>
                           </div>    
                           <div class="col-4"> 
                              <ul class="nav justify-content-end">
                                 <li class="nav-item">
                                    <a class="btn btn-primary" href="{!! route('payment-condition.create') !!}" role="button">Incluir</a>
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
                                 <th scope="col">Descrição</th>
                                 <th scope="col" colspan="2" class="th_action">Ações</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach( $aPaymentConditions  as $PaymentCondition)     
                              <tr>
                                 <th scope="row">{!!  $PaymentCondition->id;  !!} </th>
                                 <td>{!!  $PaymentCondition->description;  !!}</td>

                                 <td><a class="btn btn-secondary" href="{{ route('payment-condition.edit',$PaymentCondition) }}">
                                             Editar
                                             </a></td>
                                 <td>
                                    {!! Form::open(['route' => ['payment-condition.destroy',$PaymentCondition]] ) !!}  
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger" type="submit">Delete</button>
                                    {!! Form::close() !!}
                                 </td>
                              </tr>
                              @endforeach    
                           </tbody>
                        </table>
                        {!!  $aPaymentConditions->render(); !!}
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
