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
                  <h5 class="card-title">Grupo de Produto</h5>
               </div>
               <div class="col-4">
                  <ul class="nav justify-content-end">
                     <li class="nav-item">
                        <a class="btn btn-primary" href="{!! route('product-group.create') !!}" role="button">Incluir</a>
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
                  @foreach( $aProductGroups as $ProductGroup)
                  <tr>
                     <th scope="row">{!! $ProductGroup->id; !!} </th>
                     <td>{!! $ProductGroup->description; !!}</td>

                     <td><a class="btn btn-secondary" href="{{ route('product-group.edit',$ProductGroup) }}">
                           Editar
                        </a></td>
                     <td>
                        {!! Form::open(['route' => ['product-group.destroy',$ProductGroup]] ) !!}
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        {!! Form::close() !!}
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {!! $aProductGroups->render(); !!}
         </div>
      </div>
   </div>
</div>
@endsection