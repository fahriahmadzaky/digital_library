@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Form</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/member/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('/member/dashboard/review') }}">Data Review</a></div>
        <div class="breadcrumb-item">Form</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="needs-validation" novalidate="" method="POST">
                @csrf
              <div class="card-header">
                <h4>Form Book Data</h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" readonly="" name="title" value="{{ (isset($book)) ? $book->title : '' }}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Comment</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="comment" value="{{ (isset($review)) ? $review->comment : '' }}">
                  </div>
                </div>
                <div class="form-group mb-0 row">
                  <label class="col-sm-3 col-form-label">Rating</label>
                  <div class="col-sm-9">
                    <select class="form-control selectric" name="rating">
                      <option value="5" {{ ($review->rating == 5) ? 'selected' : '' }}>5</option>
                      <option value="4" {{ ($review->rating == 4) ? 'selected' : '' }}>4</option>
                      <option value="3" {{ ($review->rating == 3) ? 'selected' : '' }}>3</option>
                      <option value="2" {{ ($review->rating == 2) ? 'selected' : '' }}>2</option>
                      <option value="1" {{ ($review->rating == 1) ? 'selected' : '' }}>1</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <a href="{{ url('member/dashboard/review') }}" class="btn btn-secondary">Back</a>
                  <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
  </section>
@endsection