@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Data Borrowed</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/member/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('/member/dashboard/borrowed') }}">Data Borrowed</a></div>
        <div class="breadcrumb-item">Form</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="needs-validation" novalidate="" method="POST">
                @csrf
              <div class="card-header">
                <h4>Form Data</h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Cover</label>
                  <div class="col-sm-9">
                    <img id="preview" src="{{ asset('storage/book-covers/' . $book->cover) }}" alt="Preview" style="width: 10rem; margin-bottom: 20px; border:2px black dashed; padding:5px;">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" readonly="" name="title" value="{{ (isset($book)) ? $book->title : '' }}">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Author</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" readonly="" name="author" value="{{ (isset($book)) ? $book->author : '' }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                      @foreach ($book->categories as $category)
                          <div class="badge badge-info m-1">{{ $category->name }}</div>
                      @endforeach
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Publisher</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" readonly="" name="publisher" value="{{ (isset($book)) ? $book->publisher : '' }}">
                    </div>
                  </div>
                <div class="form-group mb-0 row">
                  <label class="col-sm-3 col-form-label">Publication Year</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" readonly="" name="publication_year" value="{{ (isset($book)) ? $book->publication_year : '' }}">
                  </div>
                </div>
                <div class="card-footer text-right">
                  <a href="{{ url('member/dashboard/book') }}" class="btn btn-secondary">Back</a>
                  <button class="btn btn-primary" type="submit">Borrow</button>
                </div>
            </form>
        </div>
    </div>
  </section>
@endsection