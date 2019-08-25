@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('main.bar')
            <div role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @include('main.top')

                <div class="row canvas justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <form method="POST" action="{{ route('record_store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <textarea id="text" rows="5" type="text" class="form-control @error('text') is-invalid @enderror" name="text" autocomplete="name">{{ old('text') }}</textarea>
                                            @error('text')
                                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-6 text-center">
                                            <img src="{{ '/img/record/default.jpg' }}" width="90%"/>
                                            <input style="width:65%" id="image" type="file" class="@error('image') is-invalid @enderror" name="image" autocomplete="current-image">
                                            @error('image')
                                            <small class="text-danger" role="alert"><strong>{{ isset($message) ? $message : 'Error' }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <input name="author_id" type="hidden" value="{{ Auth::id() }}" />
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-link">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
