@extends('layouts.front')
@section('content')
<article>
    <h1>{{$article->title}}</h1>
    <h6><i class="far fa-clock"></i> {{$article->created_at}} </h6>
    <h6><span class="badge badge-secondary"><a href="{{route('category',['id' => $article->category_id])}}">{{$article->name}}</a></span></h6>
    <img src="{{asset($article->img)}}" alt="this is hack img">
    <hr>
    <p class="lead">
        {{$article->content}}
    </p>
    <hr>
</article>
</div>
<section class="comments">
<div class="container">
    <h1 class="text-center">Add Your FeedBack</h1>
    <form action="{{route('comment',['id' => $article->id])}}" class="mt-3" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="comment" class="form-control">Your Comments here</textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="" placeholder="Enter Your Name" class="btn btn-primary btn-block">
        </div>
    </form>
    <hr>

    @foreach($comments as $comment)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        {{$comment->comment}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection