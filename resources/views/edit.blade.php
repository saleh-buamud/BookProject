@extends('layouts')
@section('title')
    Edit
@endsection
@section('edit')
    <div>
        <form action="{{ route('book.update', $book->id) }}" method="POST">
            @method('Put')
            <div>
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">title</label>
                    <input type="text" class="form-control" value="{{ $book->title }}" id="exampleFormControlInput1"
                        placeholder="title Book" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">author</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $book->author }}"
                        placeholder="Author Book" name="author">
                    <button class="btn btn-success mt-3 m-4">success</button>
                </div>
            </div>
        </form>
    </div>
@endsection
