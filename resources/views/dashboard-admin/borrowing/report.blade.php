@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Borrowing Report</h1>
      <div class="section-header-breadcrumb">
        <a href="{{ url('/admin/dashboard/report/borrowing') }}?start_date={{ $startDate }}&end_date={{ $endDate }}" 
        class="btn btn-danger btn-icon icon-left" target="_blank"><i class="fas fa-print"></i> Print</a>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
          <form class="needs-validation" novalidate="" method="GET">
              <div class="card-header">
                  <h4>Set Date</h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-5">
                    <div class="form-group">
                      <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $startDate) }}">
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $endDate) }}">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Show</button>
                    </div>
                  </div>
                </div>
            </div>
          </form>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <p>
                    Date Printed : <strong>{{ date('F d, Y') }}</strong>
                  </p>
                </div>
                <div class="col-6 text-right">
                  <p>
                    Printed By : <strong>{{ session('fullname') }}</strong>
                  </p>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                  <thead class="thead-dark">      
                      <th class="text-center" width="100px">
                        <strong>#</strong>
                      </th>
                      <th><strong>Name</strong></th>
                      <th><strong>Title</strong></th>
                      <th><strong>Borrow Date</strong></th>
                      <th><strong>Return Date</strong></th>
                      <th><strong>Status</strong></th>
                  </thead>
                  @foreach($borrowings as $borrowing)
                  <tbody>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $borrowing->user->fullname }}</td>
                      <td>{{ $borrowing->book->title }}</td>
                      <td>{{ $borrowing->borrow_date }}</td>
                      <td>{{ $borrowing->return_date }}</td>
                      <td>{{ $borrowing->status }}</td>
                  </tbody>
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