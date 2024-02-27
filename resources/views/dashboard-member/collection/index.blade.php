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
      <h1>Data Collection</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/member/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data Collection</div>
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
                      <th>Cover</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Author</th>
                      <th>Publisher</th>
                      <th>Publication Year</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($collections as $collection)
                    <tr>
                      <td class="text-center align-middle">
                        {{ $loop->iteration }}
                      </td>
                      <td class="align-middle"><img style="width: 5rem" src="{{ asset('/storage/book-covers/' . $collection->book->cover) }}" alt=""></td>
                      <td class="align-middle">{{ $collection->book->title }}</td>
                      <td class="align-middle">
                        @foreach ($collection->book->categories as $category)
                            <div class="badge badge-info m-1">{{ $category->name }}</div>
                        @endforeach
                      </td>
                      <td class="align-middle">{{ $collection->book->author }}</td>
                      <td class="align-middle">{{ $collection->book->publisher }}</td>
                      <td class="align-middle">{{ $collection->book->publication_year }}</td>
                      <td class="align-middle">
                        <a href="{{ url('/member/dashboard/borrowing/insert/' . $collection->book->id) }}" class="btn btn-outline-primary m-1" data-toggle="tooltip" data-placement="top" title="Borrow Book"><i class="fas fa-hand-holding-hand"></i></a>
                        <a href="{{ url('/member/dashboard/book/collection/' . $collection->book->id) }}" class="btn btn-success m-1" data-toggle="tooltip" data-placement="top" title="In Collection"><i class="fas fa-bookmark"></i></a>
                        <a href="{{ url('/member/dashboard/book/detail/' . $collection->book->id) }}" class="btn btn-outline-warning m-1" data-toggle="tooltip" data-placement="top" title="Detail Book"><i class="fas fa-circle-info"></i></a>
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