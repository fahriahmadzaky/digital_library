@extends('layouts.main')

@section('content')
@if(session('message'))
  <script>
    alert('{{ session("message") }}');
  </script>
@endif
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/profile">Profile</a></div>
        <div class="breadcrumb-item">Update</div>
      </div>
    </div>
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <form method="post" class="needs-validation">
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">                               
                    <div class="form-group col-md-12 col-12">
                      <label>Username</label>
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
                      <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                    </div>
                    <div class="form-group col-md-12 col-12">
                      <label>Fullname</label>
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
                      <input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}">
                    </div>
                    <div class="form-group col-md-12 col-12">
                      <label>Email</label>
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
                      <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group col-md-12 col-12">
                      <label>Address</label>
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
                      <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                    </div>
                  </div>
                  {{-- <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                      <label>First Name</label>
                      <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                      <div class="invalid-feedback">
                        Please fill in the last name
                      </div>
                    </div>
                  </div> --}}
              </div>
              <div class="card-footer text-right">
                <a href="/profile" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection