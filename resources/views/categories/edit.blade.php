@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Edit Category</div>

    <div class="card-body">
        <form action="{{route('category.update',['id' => $category->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" value="{{$category->name}}" name="name" class="form-control" placeholder="Enter Category Name">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" placeholder="Enter Category Name">
            </div>

        </form>
    </div>
</div>

@endsection