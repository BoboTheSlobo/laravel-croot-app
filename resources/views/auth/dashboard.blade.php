@extends('auth.layouts')

@section('content')

<div class="container mt-5">
  <div class="row  gap-2 gap-sm-2 gap-md-0 ">

    <!-- Card 1 -->
    <div class="col-md-12">
      <div class="card bg-primary bg-gradient">
        <div class="card-body pt-4 pb-4">
          <h3 class="card-title text-light m-0 "><i class="bi bi-people text-light"></i> Student's (Total: {{ $totalStudents }})</h3>
            </h3>
          </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="col-md-4 mt-2">
      <div class="card bg-success bg-gradient">
        <div class="card-body py-4 px-3">
        
        <h3 class="card-title text-start text-light">Total News (Total: 10)</h3>
        <h3 class="text-start"><i class="bi bi-newspaper text-light"></i></h3>
            
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4 mt-2">
      <div class="card bg-primary bg-gradient">
        <div class="card-body py-4 px-3">
       
        <h3 class="card-title text-start text-light">Active News (Total: 7)</h3>
        <h3 class="text-start"><i class="bi bi-newspaper text-light"></i></h3>


        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-md-4 mt-2">
      <div class="card bg-success bg-gradient">
        <div class="card-body py-4 px-3">
        
        <h3 class="card-title text-start text-light">Inactive News (Total: 3)</h3>
        <h3 class="text-start"><i class="bi bi-newspaper text-light"></i></h3>


        </div>
      </div>
    </div>
  </div>
</div>




    
@endsection