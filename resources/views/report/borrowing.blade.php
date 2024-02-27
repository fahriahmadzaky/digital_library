<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Report {{ $startDate }} to {{ $endDate }} &mdash; Customer</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/modules/fontawesome/css/all.min.css') }}">

  <script src="{{ asset('admin/modules/chart.min.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('admin/modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>


<body>
  <section class="section container">
    <div class="section-body my-3">
      <h2 class="title text-center">Report</h2>
      <h6 class="text-center mb-4">Period {{ $startDate }} to {{ $endDate }}</h6>
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

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/modules/popper.js') }}"></script>
  <script src="{{ asset('admin/modules/tooltip.js') }}"></script>
  <script src="{{ asset('admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('admin/modules/moment.min.js') }}"></script>
  <script src="{{ asset('admin/js/stisla.js') }}"></script>
  

  <script src="{{ asset('admin/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('admin/modules/jquery-ui/jquery-ui.min.js') }}"></script>
  
  <script src="{{ asset('admin/js/page/modules-datatables.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/page/modules-toastr.js') }}"></script> --}}


  <!-- Template JS File -->
  <script src="{{ asset('admin/js/page/forms-advanced-forms.js') }}"></script>
  <script src="{{ asset('admin/js/scripts.js') }}"></script>
  <script src="{{ asset('admin/js/custom.js') }}"></script>

  <script>window.print();</script>
</body>
</html>