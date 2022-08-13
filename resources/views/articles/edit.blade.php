@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Edit Articles</div>

    <div class="card-body">
        <form action="{{route('articles.update',['id' => $articles->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">articles Name</label>
                <input type="text" value="{{$articles->title}}" name="title" class="form-control" placeholder="Enter articles Name">
            </div>
            <div class="form-group">
                <label for="">articles content</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="10">{{$articles->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="">articles img</label>
                <input type="file" name="img" class="form-control" placeholder="Enter articles img">
                <img src="{{asset($articles->img)}}" alt="" style="width:100px">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    @foreach($categories as $category)
                        @if($category->id == $articles->category_id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
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