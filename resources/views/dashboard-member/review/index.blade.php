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
        <div class="breadcrumb-item">Data Review</div>
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
                        <th>Comment</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    @foreach ($reviews as $review)
                    <tr>
                      <td class="text-center align-middle">
                        {{ $loop->iteration }}
                      </td>
                      <td class="align-middle"><img style="width: 5rem" src="{{ asset('/storage/book-covers/' . $review->book->cover) }}" alt=""></td>
                      <td class="align-middle">{{ $review->book->title }}</td>
                      <td class="align-middle">{{ $review->comment }}</td>
                      <td class="align-middle">{{ $review->rating }}</td>
                      <td class="align-middle">
                        <a href="{{ url('/member/dashboard/review/update/' . $review->id) }}" class="btn btn-primary m-1" data-toggle="tooltip" data-placement="top" title="Edit Review"><i class="fas fa-pen-to-square"></i></a>
                        <a href="{{ url('/member/dashboard/review/delete/' . $review->id) }}" class="btn btn-danger m-1" data-toggle="tooltip" data-placement="top" title="Delete Review"><i class="fas fa-trash"></i></a>
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