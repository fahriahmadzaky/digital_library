@extends('layouts.main')

@section('content')
{{-- @if(session('message'))
  <script>
      iziToast.success({
      title: 'Success',
      message: '{{ session("message") }}',
      position: 'topRight',
  });
  </script>
@endif --}}
  <section class="section">
    <div class="section-header">
      <h1>Member Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data Member</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <a href="{{ url('/dashboard/book/insert') }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> Add Data</a>
            </div> --}}
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
                      {{-- <th>Action</th> --}}
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($members as $member)
                    <tr>
                      <td class="text-center align-middle">
                        {{ $loop->iteration }}
                      </td>
                      <td class="align-middle">{{ $member->fullname }}</td>
                      <td class="align-middle">{{ $member->username }}</td>
                      <td class="align-middle">{{ $member->email }}</td>
                      <td class="align-middle">{{ $member->address }}</td>
                      {{-- <td>
                        <a href="{{ url('/dashboard/member/update/' . $member->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/dashboard/member/delete/' . $member->id) }}" class="btn btn-danger">Delete</a>
                      </td> --}}
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