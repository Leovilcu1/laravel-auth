@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Progetto : <span class="text-danger">{{ $post->title }}</span>
            </h1>
            <h4>
                {{ $post->slug }}
            </h4>
            <p>{{ $post->content }}</p>
        </div>
        
    </div>
</div>
@endsection