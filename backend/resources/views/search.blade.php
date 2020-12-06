@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">search result</div>

                <div class="card-body">
                    <div class="table-resopnsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('post')}}</th>
                                    <th>{{__('user')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($posts))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->post }}</td>
                                            @if(Auth::id() == $post->user_id)
                                                <td><a href="{{ route('post.edit', $post->id) }}">{{ $post->user_id }}</a></td>
                                            @else
                                            <td><a href="{{ route('post.show', $post->id) }}">{{ $post->user_id }}</a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection