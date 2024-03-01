@extends('products.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
          
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add Student</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered mt-5">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Grade</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th>Date of Birth</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td><img src="{{ asset('assets/images/' . $product->image) }}" class="rounded-circle" alt="Product Image" width="80" height="80"></td>
            <td class="text-center">{{ $product->name }}</td>
            <td class="text-center">{{ $product->grade }}</td>
            <td class="text-center">{{ $product->email }}</td>
            <td class="text-center">{{ $product->phone }}</td>
            <td class="text-center">{{ $product->course }}</td>
            <td class="text-center">{{ $product->dob }}</td>
            <td class="text-center">
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
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