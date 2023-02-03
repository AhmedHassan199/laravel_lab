@extends('layouts.app')

@section('title') create @endsection

@section('content')
<div class="card">
    <h5 class="card-header">Post info</h5>
    <div class="card-body">
      <h5 class="card-title"> title </h5>
      <p class="card-text">{{$posts->title}}</p>
      <h5 class="card-title"> Description </h5>
      <p class="card-text">{{$posts->description}}</p>
    </div>
  </div>


  <div class="card">
    <h5 class="card-header">Post creater info</h5>
    <div class="card-body">
      <h5 class="card-title">Name</h5>
      <select name="userId" class="form-control">
        @foreach($users as $user)
            <option value="{{$user->id}}"@if($user->id ==$posts->user_id) selected @else hidden @endif>{{$user->name}}</option>
        @endforeach
    </select>

      <h5 class="card-title">Email</h5>
      <select name="userId" class="form-control">
        @foreach($users as $user)
            <option value="{{$user->id}}"@if($user->id ==$posts->user_id) selected @else hidden @endif>{{$user->email}}</option>
        @endforeach
    </select>      <h5 class="card-title">Created At</h5>
      <p class="card-text">{{$posts->created_at->format('Y-m-d')}}</p>
      <a href="{{route('posts.index')}}" class="btn btn-primary">Go back</a>
    </div>
  </div>




  <form method="POST" action="{{route('posts.comments',$id)}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Add your comment</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="comment">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @foreach($comments as $comment)
  <div class="card" @if($comment->post_id ==$posts->id) selected @else hidden @endif>
    <div class="card-header">
      comment
    </div>
   <div class="card-body" >
      <h5 class="card-title">Special title treatment</h5>

       <p class="card-text">{{$comment['comment_body']}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

  {{-- <option @if($comment->post_id ==$posts->id) selected @else hidden @endif>{{$comment->comment_body}}</option> --}}

  @endforeach


@endsection
