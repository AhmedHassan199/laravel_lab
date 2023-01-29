@extends('layouts.app')

@section('title') create @endsection

@section('content')
<div class="card">
    <h5 class="card-header">Post info</h5>
    <div class="card-body">
      <h5 class="card-title"> title </h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <h5 class="card-title"> Description </h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    </div>
  </div>


  <div class="card">
    <h5 class="card-header">Post creater info</h5>
    <div class="card-body">
      <h5 class="card-title">Name</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <h5 class="card-title">Email</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <h5 class="card-title">Created At</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="{{route('posts.index')}}" class="btn btn-primary">Go back</a>
    </div>
  </div>
@endsection
