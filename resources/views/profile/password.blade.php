@extends('layouts.main')

@section('content')
@if(session('success'))
  <script>
    alert('{{ session("success") }}');
  </script>
@endif

@if(session('error'))
  <script>
    alert('{{ session("error") }}');
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
      <div class="row mt-sm-4 justify-content-center">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation">
                @csrf
              <div class="card-header">
                <h4>Change Password</h4>
              </div>
              <div class="card-body">
                  <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                      <label>Old Password</label>
                      <input type="password" class="form-control" name="old_password" required="">
                      <div class="invalid-feedback">
                        Please fill in the old password
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>New Password</label>
                      <input type="password" class="form-control" name="new_password" required="">
                      <div class="invalid-feedback">
                        Please fill in the new password
                      </div>
                    </div>
                  </div>
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