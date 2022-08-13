@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Articles</div>

    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Trash</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td><a href="{{route('articles.edit',['id' => $article->id])}}">Edit</a></td>
                <td><a href="{{route('articles.trash',['id' => $article->id])}}">Trash</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection