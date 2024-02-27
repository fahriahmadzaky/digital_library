@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Borrowing Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/staff/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data Borrowing</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Name</th>
                      <th>Cover</th>
                      <th>Title</th>
                      <th>Borrow Date</th>
                      <th>Return Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($borrowings as $borrowing)
                    <tr>
                      <td class="text-center align-middle">
                        {{ $loop->iteration }}
                      </td>
                      <td class="align-middle">{{ $borrowing->user->fullname }}</td>
                      <td class="align-middle"><img style="width: 5rem" src="{{ asset('/storage/book-covers/' . $borrowing->book->cover) }}" alt=""></td>
                      <td class="align-middle">{{ $borrowing->book->title }}</td>
                      <td class="align-middle">{{ $borrowing->borrow_date }}</td>
                      <td class="align-middle">{{ $borrowing->return_date }}</td>
                      <td class="align-middle"><div class="badge badge-info m-1">{{ $borrowing->status }}</div></td>
                      <td class="align-middle">
                        {{-- <a href="{{ url('/dashboard/borrowing/update/' . $borrowing->id) }}" class="btn btn-primary m-1">Edit</a>
                        <a href="{{ url('/dashboard/borrowing/delete/' . $borrowing->id) }}" class="btn btn-danger m-1">Delete</a> --}}
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