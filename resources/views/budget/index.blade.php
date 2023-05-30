@extends('layouts.app')
@section('content')
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
                  <h5 class="card-title">Orçamentos</h5>
               </div>
               <div class="col-4">
                  <ul class="nav justify-content-end">
                     <li class="nav-item">
                        <a class="btn btn-primary" href="{!! route('budget.create') !!}" role="button">Incluir</a>
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
                     <th scope="col">Data</th>
                     <th scope="col">Cliente</th>
                     <th scope="col">Condição Pagamento</th>
                     <th scope="col">Prazo Entrega</th>
                     <th scope="col">Data Validade</th>
                     <th scope="col" colspan="2" align="center">Ações</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach( $aBudgets as $Budget)
                  <tr>
                     <th scope="row">{!! $Budget->id; !!} </th>
                     <td>{!! $Budget->date; !!}</td>
                     <td>{!! $Budget->client_id; !!}</td>
                     <td>{!! $Budget->payment_condition_id; !!}</td>
                     <td>{!! $Budget->deadline; !!}</td>
                     <td>{!! $Budget->expiration_date; !!}</td>
                     <td><a class="btn btn-secondary" href="{{ route('budget.edit',$Budget) }}">
                           Editar
                        </a></td>
                     <td>
                        {!! Form::open(['route' => ['budget.destroy',$Budget]] ) !!}
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        {!! Form::close() !!}
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {!! $aBudgets->render(); !!}
         </div>
      </div>
   </div>
</div>
@endsection