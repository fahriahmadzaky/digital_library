@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Book Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('/admin/dashboard/book') }}">Data Book</a></div>
        <div class="breadcrumb-item">Form</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="needs-validation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <h4>Form Data</h4>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cover</label>
                    <div class="col-sm-9">
                      @error('cover')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                        <input type="file" name="cover" class="form-control" onchange="previewImage(this)">
                    </div>
                  </div>
                  @if(isset($book) && $book->cover)
                      <img id="preview" src="{{ asset('storage/book-covers/' . $book->cover) }}" alt="Preview" style="max-width: 200px; margin-bottom: 20px; border:2px black dashed; padding:5px;">
                  @else
                      <img id="preview" src="#" alt="Preview" style="max-width: 200px; margin-bottom: 20px; display: none; border:2px black dashed; padding:5px;">
                  @endif
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="title">Title</label>
                    <div class="col-sm-9">
                      @error('title')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                      <input type="text" id="title" class="form-control" name="title" value="{{ (isset($book)) ? $book->title : '' }}">
                    </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Author</label>
                      <div class="col-sm-9">
                        @error('author')
                        <div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            {{ $message }}
                          </div>
                        </div>
                        @enderror
                        <input type="text" class="form-control" name="author" value="{{ (isset($book)) ? $book->author : '' }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        @error('categories')
                        <div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            {{ $message }}
                          </div>
                        </div>
                        @enderror
                        <select class="form-control select2" name="categories[]" multiple="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Publisher</label>
                      <div class="col-sm-9">
                        @error('publisher')
                        <div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            {{ $message }}
                          </div>
                        </div>
                        @enderror
                        <input type="text" class="form-control" name="publisher" value="{{ (isset($book)) ? $book->publisher : '' }}">
                      </div>
                    </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Publication Year</label>
                    <div class="col-sm-9">
                      @error('publication_year')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                      <input type="text" class="form-control" name="publication_year" value="{{ (isset($book)) ? $book->publication_year : '' }}">
                    </div>
                  </div>
                  <div class="form-group mb-0 row">
                    <label class="col-sm-3 col-form-label">Stock</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="stock" value="{{ (isset($book)) ? $book->stock : '' }}">
                      @error('stock')
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <a href="{{ url('/admin/dashboard/book') }}" class="btn btn-secondary">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                  </div>
            </form>
        </div>
    </div>
  </section>

  <script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
@endsection