@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Category</div>

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
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td><a href="{{route('category.edit',['id' => $category->id])}}">Edit</a></td>
                <td><a href="{{route('category.trash',['id' => $category->id])}}">Trash</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection