@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Staff Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('/dashboard/product') }}">Data Staff</a></div>
        <div class="breadcrumb-item">Form</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="needs-validation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <h4>Form Data</h4>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="username">Username</label>
                    <div class="col-sm-9">
                      @error('username')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                      <input type="text" id="username" class="form-control" name="username" value="{{ (isset($staff)) ? $staff->username : '' }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="fullname">Fullname</label>
                    <div class="col-sm-9">
                      @error('fullname')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                      <input type="text" id="fullname" class="form-control" name="fullname" value="{{ (isset($staff)) ? $staff->fullname : '' }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="password">Password</label>
                    <div class="col-sm-9">
                      @error('password')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                      <input type="password" id="password" class="form-control" name="password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="email">Email</label>
                    <div class="col-sm-9">
                      @error('email')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                      <input type="email" id="email" class="form-control" name="email" value="{{ (isset($staff)) ? $staff->email : '' }}">
                    </div>
                  </div>
                  <div class="form-group mb-0 row">
                    <label class="col-sm-3 col-form-label" for="address">Address</label>
                    <div class="col-sm-9">
                      @error('address')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                      <input type="text" id="address" class="form-control" name="address" value="{{ (isset($staff)) ? $staff->address : '' }}">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <a href="{{ url('/admin/dashboard/staff') }}" class="btn btn-secondary">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                  </div>
            </form>
        </div>
    </div>
  </section>
@endsection