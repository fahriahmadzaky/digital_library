@extends('layouts.main')

@section('content')
@if(session('message'))
  <script>
    alert('{{ session("message") }}');
  </script>
@endif
  <section class="section">
    <div class="section-header">
      <h1>Data Returned</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/member/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data Returned</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            @if (session('role') != 'borrower')
              <div class="card-header">
                <a href="{{ url('/dashboard/book/insert') }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> Add Data</a>
              </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                        <th class="text-center">
                        #
                        </th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($borrowings as $borrowing)
                    <tr>
                      <td class="text-center align-middle">
                        {{ $loop->iteration }}
                      </td>
                      <td class="align-middle"><img style="width: 5rem" src="{{ asset('/storage/book-covers/' . $borrowing->book->cover) }}" alt=""></td>
                      <td class="align-middle">{{ $borrowing->book->title }}</td>
                      <td class="align-middle">{{ $borrowing->borrow_date }}</td>
                      <td class="align-middle">{{ $borrowing->return_date }}</td>
                      <td class="align-middle">{{ $borrowing->status }}</td>
                    </tr>
                    @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection