@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Trashed Category</div>

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
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td><a href="{{route('category.restore',['id' => $category->id])}}">Restore</a></td>
                <td><a href="{{route('category.remove',['id' => $category->id])}}">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection