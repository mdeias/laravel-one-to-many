@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>Home</h1>
        @if (session('deleted'))
        <div class="alert alert-success" role="alert">
          {{ session('deleted') }}
        </div>
        @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">SHOW</a></td>
                    <td><a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">EDIT</a></td>
                    <td>
                      <form onsubmit=" return confirm('Confermi di voler eliminare {{$post->title}}?') " action="{{route('admin.posts.destroy', $post)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                      </form>
                    </td>
                </tr>  
                @endforeach
            
            </tbody>
          </table>
          {{ $posts->links() }}
    </div>
</div>
@endsection