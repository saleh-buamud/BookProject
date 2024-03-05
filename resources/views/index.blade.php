@extends('layouts')
@section('title')
    index
@endsection
@section('index')
    <div class="text-center mt-4">
        <form action="search" method="GET">
            @csrf
            <input class="form-control" name="search" type="text" style="width: 600px;display:inline-block;"
                placeholder="search" required>
            <span class="input-group-append">
                <button class="btn btn-dark" type="submit">
                    Search
                </button>
        </form>
        <br>
        <a href="{{ route('book.create') }}" class="btn btn-success mt-4">Cteate Book</a>
    </div>

    <table class="table mt-4" style="width: 1300px; Margin:auto; padding:20px;">
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
                        <a href="{{ route('book.show', $Book->id) }}" class= "btn btn-primary">view</a>
                        <a href="{{ route('book.edit', $Book->id) }}" class="btn btn-dark">edit</a>
                        <form action="{{ route('book.destroy', $Book->id) }}" method="POST" style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">delete</button>

                        </form>

                        @if (Session::has('message'))
                            <script>
                                let messageType = '{{ Session::get('message_type') }}';
                                let messageText = '{{ Session::get('message') }}';

                                if (messageType === 'add') {
                                    swal("Success", messageText, 'success', {
                                        buttons: false,
                                        dangerMode: true,
                                        timer: 2000,
                                    });
                                } else if (messageType === 'delete') {
                                    swal("Warning", messageText, 'warning', {
                                        button: true,
                                        button: "OK",
                                        dangerMode: true,
                                    });
                                }
                            </script>
                        @endif



                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
