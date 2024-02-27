@extends('layouts.main')

@section('content')
@if(session('message'))
  <script>
    alert('{{ session("message") }}');
  </script>
@endif
  <section class="section">
    <div class="section-header">
      <h1>Staff Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data Staff</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ url('/admin/dashboard/staff/insert') }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> Add Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Fullname</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($staffs as $staff)
                    <tr>
                      <td class="text-center align-middle">
                        {{ $loop->iteration }}
                      </td>
                      <td class="align-middle">{{ $staff->fullname }}</td>
                      <td class="align-middle">{{ $staff->username }}</td>
                      <td class="align-middle">{{ $staff->email }}</td>
                      <td class="align-middle">{{ $staff->address }}</td>
                      <td class="align-middle">
                        <a href="{{ url('admin/dashboard/staff/update/' . $staff->id) }}" class="btn btn-primary m-1" data-toggle="tooltip" data-placement="top" title="Update Staff"><i class="fas fa-pen-to-square"></i></a>
                        <a href="{{ url('admin/dashboard/staff/delete/' . $staff->id) }}" class="btn btn-danger m-1" data-toggle="tooltip" data-placement="top" title="Delete Staff" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection