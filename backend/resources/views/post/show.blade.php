@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Show</div>
                <div class="card-body">
                    <div class="table-resopnsive">
                        <table class="table table-striped text-center">
                            <tbody>
                                <tr>
                                    <td>{{ __('ID') }}</td>
                                    <td>{{ __(':') }}</td>
                                    <td>{{ $posts->id }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('post') }}</td>
                                    <td>{{ __(':') }}</td>
                                    <td>{{ $posts->post }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('user') }}</td>
                                    <td>{{ __(':') }}</td>
                                    <td>{{ $posts->user_id }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary w-25" onclick="history.back()" >
                            {{ __('back') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection