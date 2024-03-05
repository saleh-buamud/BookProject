@extends('layouts')
@section('title')
    show
@endsection
@section('show')
    <div class="card text-center">
        <div class="card-header text-center">
            detiels
        </div>
        <div class="card-body text-center">
            <blockquote class="blockquote mb-0 text-center">
                <p>{{ $book->title }}</p>
                <p>{{ $book->author }}
                </p>
            </blockquote>
        </div>
    </div>
@endsection
