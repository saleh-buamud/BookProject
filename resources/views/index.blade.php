@extends('layouts')
@section('title')
    index
@endsection
@section('index')
    <div class="text-center mt-2">
        <a href="{{ route('book.create') }}" class="btn btn-success">Cteate Book</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($books) --}}
            @foreach ($books as $Book)
                <tr>
                    <th scope="row">{{ $Book->id }}</th>
                    <td>{{ $Book->title }}</td>
                    <td>{{ $Book->author }}</td>
                    <td>
                        <a href="{{ route('book.show', $Book['id']) }}" class= "btn btn-primary">view</a>
                        <a href="{{ route('book.edit', $Book['id']) }}" class="btn btn-dark">edit</a>
                        <form action="{{ route('book.destroy', $Book['id']) }}" method="POST"
                            style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">delete</button>

                        </form>
                        @if (Session::has('message'))
                            <script>
                                swal("Message", "{{ Session::get('message') }}", 'warning', {
                                    button: true,
                                    button: "OK",
                                    dangerMode: true,
                                });
                                // No Button
                            </script>
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
