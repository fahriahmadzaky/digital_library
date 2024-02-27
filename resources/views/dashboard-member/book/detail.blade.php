@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>{{ $books->title }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/member/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/member/dashboard/book">Data Book</a></div>
        <div class="breadcrumb-item">{{ $books->id }}</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Book Detail</h4>
              <div class="card-header-action">
                <a href="/member/dashboard/book" class="btn btn-secondary">Back</a>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-2 text-muted">Click the picture below to see the magic!</div>
              <div class="chocolat-parent">
                <a href="{{ asset('/storage/book-covers/' . $books->cover) }}" class="chocolat-image" title="{{ $books->title }}">
                  <div style="width: 10rem;">
                    <img alt="image" src="{{ asset('/storage/book-covers/' . $books->cover) }}" class="img-fluid" style="max-width: 100%; height: auto;">
                  </div>
                </a>
              </div>
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">{{ $books->title }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Category</th>
                    <th scope="col">
                      @foreach ($books->categories as $category)
                        <div class="badge badge-info m-1">{{ $category->name }}</div>
                      @endforeach
                    </th>
                  </tr>
                  <tr>
                    <th scope="col">Author</th>
                    <th scope="col">{{ $books->author }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Publisher</th>
                    <th scope="col">{{ $books->publisher }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Publiation Year</th>
                    <th scope="col">{{ $books->publication_year }}</th>
                  </tr>
                  <tr>
                    <th scope="col">Stock</th>
                    <th scope="col">{{ $books->stock }}</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-header">
                <h4>Reviews</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-1">
                    <thead>                                 
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody>                                 
                      @foreach ($books->reviews as $review)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $review->user->fullname }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ $review->rating }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection