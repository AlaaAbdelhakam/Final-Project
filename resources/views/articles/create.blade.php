@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Create articles</div>

    <div class="card-body">
        <form action="{{route('articles.insert')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">articles Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter articles title">
            </div>
            <div class="form-group">
                <label for="">articles content</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">articles img</label>
                <input type="file" name="img" class="form-control" placeholder="Enter articles img">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" placeholder="Enter articles Name">
            </div>

        </form>
    </div>
</div>

@endsection