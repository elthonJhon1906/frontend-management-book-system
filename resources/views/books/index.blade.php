@extends('layouts.app')

@section('content')
    <h1>Daftar Buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th><th>Tahun</th><th>Kategori</th><th>Penerbit</th><th>Penulis</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->publisher->name }}</td>
                <td>{{ $book->author->name }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
