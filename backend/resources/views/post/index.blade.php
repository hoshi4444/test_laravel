@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @auth
                <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="post" class="col-md-1 col-form-label">{{ __('post') }}</label>
                        <div class="col-md-8 input-group-text">
                            <input id="post" type="text" class="form-control" name="post" value="{{ old('post') }}">
                        </div>
                        <button type="submit" class="col-md-1 ml-3 btn btn-primary" name="action">
                            {{ __('send') }}
                        </button>
                    </div>
                </form>
            @endauth
            <div class="card">
                <div class="card-header">post Index</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--成功時のメッセージ--}}
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    {{-- エラーメッセージ --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif

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