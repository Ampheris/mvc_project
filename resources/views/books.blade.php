@extends('base')

@section('title', 'Books')


@section('content')
    <h1>Books</h1>
    <div class="card-group">
        @foreach($books as $book)
            <div class="card">
                <img class="card-img-top" src="{{$book['image']}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$book['title']}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">By {{$book['author']}}</h6>
                    <h6 class="card-text">ISBN: {{$book['isbn']}}</h6>
                </div>
            </div>
        @endforeach
    </div>
@endsection
