@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>{{$post->title}}</h1>
        <p>{{ $post->content }}</p>
        <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-success">EDIT</a>     
        <form class="d-inline" onsubmit=" return confirm('Confermi di voler eliminare {{$post->title}}?') " action="{{route('admin.posts.destroy', $post)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>  
        <a href="{{route('admin.posts.index')}}" class="btn btn-info">Home</a> 
    </div>
</div>
@endsection