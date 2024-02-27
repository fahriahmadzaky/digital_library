@extends('layouts.main')

@section('content')
@if(session('message'))
  <script>
    alert('{{ session("message") }}');
  </script>
@endif
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Active Member</h4>
            </div>
            <div class="card-body">
              {{ $totalActiveMember }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-book"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Book</h4>
            </div>
            <div class="card-body">
              {{ $totalBook }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-hourglass-start"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Today's Borrowing</h4>
            </div>
            <div class="card-body">
              {{ $todayBorrowing }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-layer-group"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Category</h4>
            </div>
            <div class="card-body">
              {{ $totalCategory }}
            </div>
          </div>
        </div>
      </div>                  
    </div>
  </section>
@endsection