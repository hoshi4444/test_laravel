@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Edit</div>
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
                    <form action="/post/{{ $posts->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="post" class="col-md-4 col-form-label text-md-right">{{ __('Post') }}</label>
                            <div class="col-md-6">
                                <input id="post" type="text" class="form-control" name="post" value="{{ old('post',$posts->post) }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-right">
                                <form style="display:inline" action="{{ route('post.destroy', $posts->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('delete') }}
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-primary" name='action' value='edit'>
                                    {{ __('edit') }}
                                </button>
                                <button type="submit" class="btn btn-primary" name='action' value='back'>
                                    {{ __('back') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection