@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Category Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('/dashboard/product') }}">Data Ctegory</a></div>
        <div class="breadcrumb-item">Form</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="needs-validation" novalidate="" method="POST">
                @csrf
              <div class="card-header">
                <h4>Form Data</h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required="" name="name" value="{{ (isset($category)) ? $category->name : '' }}">
                    <div class="invalid-feedback">
                        Whats the name of your customer?
                    </div>
                  </div>
                </div>
              <div class="card-footer text-right">
                <a href="{{ url('/admin/dashboard/category') }}" class="btn btn-secondary">Back</a>
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </form>
        </div>
    </div>
  </section>
@endsection