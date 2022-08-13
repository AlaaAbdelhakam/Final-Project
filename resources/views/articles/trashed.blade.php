@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Trashed Articles</div>

    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Restore</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td><a href="{{route('articles.restore',['id' => $article->id])}}">Restore</a></td>
                <td><a href="{{route('articles.remove',['id' => $article->id])}}">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection