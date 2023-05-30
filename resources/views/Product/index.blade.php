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
                  <h5 class="card-title">Produtos</h5>
               </div>
               <div class="col-4">
                  <ul class="nav justify-content-end">
                     <li class="nav-item">
                        <a class="btn btn-primary" href="{!! route('product.create') !!}" role="button">Incluir</a>
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
                     <th scope="col">Tipo</th>
                     <th scope="col">Grupo</th>
                     <th scope="col">Unidade <br> de Medida</th>
                     <th scope="col" colspan="2" class="th_action">Ações</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach( $aProducts as $Product)
                  <tr>
                     <th scope="row">{!! $Product->id; !!} </th>
                     <td>{!! $Product->description; !!}</td>
                     <td>{!! $Product->getType(); !!}</td>
                     <td>{!! $Product->getGroup(); !!}</td>
                     <td>{!! $Product->getUM(); !!}</td>
                     {{-- <td><img src="{{ url("public/storage/products/{$Product->imagem }") }}" alt="{{ $Product->descricao }}"></td> --}}
                     <td><a class="btn btn-secondary" href="{{ route('product.edit',$Product) }}">
                           Editar
                        </a></td>
                     <td>
                        {!! Form::open(['route' => ['product.destroy',$Product]] ) !!}
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        {!! Form::close() !!}
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {!! $aProducts->render(); !!}
         </div>
      </div>
   </div>
</div>
@endsection