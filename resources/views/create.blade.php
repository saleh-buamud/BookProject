@extends('layouts')
@section('title')
    create
@endsection
@section('create')
    <div>
        <form action="{{ route('book.store') }}" method="post">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title Book"
                        name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">author</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Author Book"
                        name="author">
                    <button class="btn btn-success mt-3 m-4">success</button>
                </div>
            </div>
        </form>
    </div>
@endsection
