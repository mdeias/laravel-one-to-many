@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>nuovo post</h1>

        @if ($errors->any())

            
            
            <div class="alert alert-danger" role="alert">
                <ul>
                    
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    
                </ul>
            </div>
                    
        
        @endif


        <form action="{{ route('admin.posts.store') }}" method="POST">
    
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" 
                class="form-control @error('title')
                    is-invalid
                @enderror" id="title" 
                name="title" 
                placeholder="title">   
                @error('title')
                    <p> {{$message}} </p>
                @enderror           
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Contenuto post</label>

                <textarea 
                class="form-control @error('content')
                is-invalid
                @enderror" 
                id="content" 
                name="content">
                </textarea>

                @error('content')
                    <p> {{$message}} </p>
                @enderror   
              </div>
              
              <button type="submit" class="btn btn-primary">Invia</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
              <a href="{{route('admin.posts.index')}}" class="btn btn-info">Elenco post</a>

        </form>
            
    </div>
</div>
@endsection