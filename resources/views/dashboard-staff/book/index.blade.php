@extends('layouts.main')

@section('content')
@if(session('message'))
  <script>
    alert('{{ session("message") }}');
  </script>
@endif
<section class="section">
  <div class="section-header">
    <h1>Book Management</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ url('/staff/dashboard/book') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Data Book</div>
    </div>
  </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ url('/staff/dashboard/book/insert') }}" class="btn btn-primary mr-2"><i class="fas fa-plus"></i> Add Data</a>
            </div>
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
                      <td class="align-middle">
                        @foreach ($book->categories as $category)
                            <div class="badge badge-info m-1">{{ $category->name }}</div>
                        @endforeach
                      </td>
                      <td class="align-middle">{{ $book->author }}</td>
                      <td class="align-middle">{{ $book->publisher }}</td>
                      <td class="align-middle">{{ $book->publication_year }}</td>
                      <td class="align-middle">
                        @if ($book->stock < 1)
                        <div class="badge badge-danger m-1">Unavailable</div>
                        @else
                            {{ $book->stock }}
                        @endif
                      </td>
                      <td class="align-middle">
                        <a href="{{ url('/staff/dashboard/book/update/' . $book->id) }}" class="btn btn-primary m-1" data-toggle="tooltip" data-placement="top" title="Update Book"><i class="fas fa-pen-to-square"></i></a>
                        <a href="{{ url('/staff/dashboard/book/delete/' . $book->id) }}" class="btn btn-danger m-1" data-toggle="tooltip" data-placement="top" title="Delete Book" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fas fa-trash"></i></a>
                        <a href="{{ url('/staff/dashboard/book/detail/' . $book->id) }}" class="btn btn-warning m-1" data-toggle="tooltip" data-placement="top" title="Detail Book"><i class="fas fa-circle-info"></i></a>
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