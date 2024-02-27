@extends('layouts.main')

@section('content')
@if(session('message'))
  <script>
    alert('{{ session("message") }}');
  </script>
@endif
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/member/dashboard">Dashboard</a></div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Latest Book</h2>
    <div class="row">
      @foreach ($latestBook as $book)
      <div class="col-6 col-md-3 col-lg-2">
        <article class="article article-style-b">
          <div class="article-header">
              <div class="article-image">
                  <img style="width: 100%;" src="{{ asset('/storage/book-covers/' . $book->cover) }}" alt="">
              </div>
              <div class="article-badge">
                  <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Newest</div>
              </div>
          </div>
          <div class="article-details">
              <div class="article-user">
                  <div class="article-user-details">
                      <div class="user-detail-name">
                          <a href="#">{{ $book->author }}</a>
                      </div>
                      <div class="text-job">{{  $book->publisher }}</div>
                  </div>
              </div>
              <div class="article-cta">
                  <a href="{{ url('/member/dashboard/book/detail/' . $book->id) }}">Book Detail <i class="fas fa-chevron-right"></i></a>
              </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>

    <h2 class="section-title">Top Picks: Dive into Our Bestselling Books</h2>
    <div class="row">
      @foreach ($mostBorrowedBook as $book)
      <div class="col-6 col-md-3 col-lg-2">
        <article class="article article-style-b">
          <div class="article-header">
              <div class="article-image">
                  <img style="width: 100%;" src="{{ asset('/storage/book-covers/' . $book->cover) }}" alt="">
              </div>
              <div class="article-badge">
                  <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
              </div>
          </div>
          <div class="article-details">
              <div class="article-user">
                  <div class="article-user-details">
                      <div class="user-detail-name">
                          <a href="#">{{ $book->author }}</a>
                      </div>
                      <div class="text-job">{{  $book->publisher }}</div>
                  </div>
              </div>
              <div class="article-cta">
                  <a href="{{ url('/member/dashboard/book/detail/' . $book->id) }}">Book Detail <i class="fas fa-chevron-right"></i></a>
              </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection