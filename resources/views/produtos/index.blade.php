@extends('produtos.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 6 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produtos.create') }}"> Criar</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produto as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('produtos.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('produtos.show',$product->id) }}">SHOW</a>
    
                    <a class="btn btn-primary" href="{{ route('produtos.edit',$product->id) }}">EDITAR</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">DEL</button>
                </form>
            </td>
        </tr>
        @endforeach
     
    </table>
  
 
    {!! $produto->links() !!}   
@endsection