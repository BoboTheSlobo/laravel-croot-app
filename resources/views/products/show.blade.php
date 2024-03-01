@extends('products.layout')

@section('content')

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('assets/images/' . $product->image) }}" alt="Product Image" style="max-width: 300px;">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 mb-3"> <div class="form-group">
        Student Details
        </div></h1>
        <p class="lead ">
        <div class="form-group fw-light fs-5">
            Name:
            <strong>{{ $product->name }}</strong>
        </div>
        <div class="form-group fw-light fs-5">
            Grade:
            <strong>{{ $product->grade }}</strong>
            
        </div>
        <div class="form-group fw-light fs-5">
            Email:
            <strong>{{ $product->email }}</strong>
        </div>
        <div class="form-group fw-light fs-5">
           Phone:
            <strong>{{ $product->phone }}</strong>
        </div>
        <div class="form-group fw-light fs-5">
            Course:
            <strong>{{ $product->course }}</strong>
        </div>
        <div class="form-group fw-light fs-5">
            Date of Birth:
            <strong>{{ $product->dob }}</strong>
        </div>
        <div class="form-group fw-light fs-5">
            Detail:
            <strong>{{ $product->detail }}</strong>
        </div>
        </p>
        <div>
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
      </div>
    </div>
  </div>

@endsection
