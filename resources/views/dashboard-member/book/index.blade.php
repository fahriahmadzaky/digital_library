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
      <h1>Data Book</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/member/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Data Book</div>
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
                      <th>Rating</th>
                      <th>Stock</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($books as $book)
                    <tr>
                      <td class="text-center align-middle">
                        {{ $loop->iteration }}
                      </td>
                      <td class="align-middle"><img style="width: 5rem" src="{{ asset('/storage/book-covers/' . $book->cover) }}" alt=""></td>
                      <td class="align-middle">{{ $book->title }}</td>
                      <td class="align-middle">{{ number_format($book->reviews->avg('rating'), 1) }}</td>
                      <td class="align-middle">
                        @if ($book->stock < 1)
                        <div class="badge badge-danger m-1">Unavailable</div>
                        @else
                            {{ $book->stock }}
                        @endif
                      </td>
                      <td class="align-middle">
                        @php
                            $inCollection = $book->collections()->where('id_user', session('idUser'))->exists();
                        @endphp

                        @if ($book->stock < 1)
                          <a href="/member/dashboard/book" class="btn btn-outline-primary m-1" data-toggle="tooltip" data-placement="top" title="Borrow Book"><i class="fas fa-hand-holding-hand" onclick="return alert('Book Not Available')"></i></a>
                        @else
                          <a href="{{ url('/member/dashboard/borrowing/insert/' . $book->id) }}" class="btn btn-outline-primary m-1" data-toggle="tooltip" data-placement="top" title="Borrow Book"><i class="fas fa-hand-holding-hand"></i></a>
                        @endif

                        @if ($inCollection)
                            <a href="{{ url('/member/dashboard/book/collection/' . $book->id) }}" class="btn btn-success m-1" data-toggle="tooltip" data-placement="top" title="In Collection"><i class="fas fa-bookmark"></i></a>
                        @else
                            <a href="{{ url('/member/dashboard/book/collection/' . $book->id) }}" class="btn btn-outline-success m-1" data-toggle="tooltip" data-placement="top" title="Add to Collection"><i class="fas fa-bookmark"></i></a>
                        @endif

                        <a href="{{ url('/member/dashboard/book/detail/' . $book->id) }}" class="btn btn-outline-warning m-1" data-toggle="tooltip" data-placement="top" title="Detail Book"><i class="fas fa-circle-info"></i></a>
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