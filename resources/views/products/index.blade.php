@extends('products.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="flex justify-center">
                <h2>CRUD</h2>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Post</a>
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
            <th>Id</th>
            <th>title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Cover</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            
            <td>{{ $product->title }}</td>
            <td>{{ $product->author}}</td>
            <td>{{ $product->description}}</td>
            <td><img src="/cover/{{ $product->cover }}" width="100px"></td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
      
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Update</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $products->links() !!}
        
@endsection