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
                  <h5 class="card-title">Clientes</h5>
               </div>
               <div class="col-4">
                  <ul class="nav justify-content-end">
                     <li class="nav-item">
                        <a class="btn btn-primary" href="{!! route('client.create') !!}" role="button">Incluir</a>
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
                     <th scope="col">Nome</th>
                     <th scope="col">CGC</th>
                     <th scope="col">Nº Telefone</th>
                     <th scope="col">Email</th>
                     <th scope="col" colspan="2" class="th_action">Ações</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach( $aClients as $Client)
                  <tr>
                     <th scope="row">{!! $Client->id; !!} </th>
                     <td>{!! $Client->name; !!}</td>
                     <td>{!! $Client->cgc; !!}</td>
                     <td>{!! $Client->phone1; !!}</td>
                     <td>{!! $Client->mail; !!}</td>

                     <td><a class="btn btn-secondary" href="{{ route('client.edit',$Client) }}">
                           Editar
                        </a></td>
                     <td>
                        {!! Form::open(['route' => ['client.destroy',$Client]] ) !!}
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        {!! Form::close() !!}
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {!! $aClients->render(); !!}
         </div>
      </div>
   </div>
</div>

@endsection