@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Buku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.update', $book) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Field Judul --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Buku</label>
                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $book->title) }}"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Field Tahun --}}
                        <div class="mb-3">
                            <label for="year" class="form-label">Tahun Terbit</label>
                            <input type="number"
                                   name="year"
                                   id="year"
                                   class="form-control @error('year') is-invalid @enderror"
                                   value="{{ old('year', $book->year) }}"
                                   min="1900"
                                   max="{{ date('Y') }}"
                                   required>
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Field Kategori (Dropdown) --}}
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Field Penerbit (Dropdown) --}}
                        <div class="mb-3">
                            <label for="publisher_id" class="form-label">Penerbit</label>
                            <select name="publisher_id"
                                    id="publisher_id"
                                    class="form-control @error('publisher_id') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Penerbit --</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}"
                                        {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                                        {{ $publisher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Field Penulis (Dropdown) --}}
                        <div class="mb-3">
                            <label for="author_id" class="form-label">Penulis</label>
                            <select name="author_id"
                                    id="author_id"
                                    class="form-control @error('author_id') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Penulis --</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Submit & Batal --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update Buku</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
