@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                TUTTI GLI POSTS
            </h1>
            <div>
                <a href="{{ route("admin.posts.create") }}" class="btn btn-success">Aggiungi Progetto</a>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @foreach ($posts as $index => $post)
                <tbody>
                  <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        <a href="{{ route("admin.posts.show",$post->id) }}" class="btn btn-primary" >Detagli</a>
                        <a href="{{ route("admin.posts.update",$post->id) }}" class="btn btn-warning" >Aggiorna</a>
                        <a href="#" class="btn btn-danger" >Elimina</a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
        </div>
    </div>
    {{ $posts->links() }}
    
</div>
@endsection