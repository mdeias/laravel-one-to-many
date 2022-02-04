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
                <th scope="col">Categoria</th>
                <th scope="col">Titolo</th>
                <th scope="col">Contenuto</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    @if ($post->category)
                      
                       <td>{{ $post->category->name }}</td>
                      
                    @else
                       <td>-----</td>
                    @endif
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

          @foreach ($categories as $category)
            <h3>{{$category->name}}</h3>
            <ul>
              @foreach ($category->posts as $post_category)
                <li>
                  <a href="{{ route('admin.posts.show', $post_category) }}">{{$post_category->title}}</a>
                </li>
              @endforeach
            </ul>
          @endforeach
    </div>
</div>
@endsection