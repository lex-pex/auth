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
                            <form method="POST" action="{{ route('record_update', $record) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $record->name }}" autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 p-0">
                                            <textarea id="text" rows="6" type="text" class="form-control @error('text') is-invalid @enderror" name="text" autocomplete="name">{{ old('text') ? old('text') : $record->text }}</textarea>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-6 p-0 text-center">
                                            <img src="{{ $record->image ? $record->image : '/img/record/default.jpg' }}" width="90%"/>
                                            <input style="width:65%" id="image" type="file" class="@error('image') is-invalid @enderror" name="image" autocomplete="current-image">
                                            <input class="form-check-input" type="checkbox" name="image_del" id="image_del" {{ old('image_del') ? 'checked' : '' }}>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-link btn-danger"
                                            onclick="event.preventDefault(); document.getElementById('delete-record-form').submit();"
                                    >Delete</button> |
                                    <button type="submit" class="btn btn-link btn-success">Save</button>
                                </div>
                            </form>
                            <form id="delete-record-form" action="{{ route('record_destroy', $record) }}" method="post" style="display: none;">
                                <input type="hidden" name="_method" value="delete" />
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
