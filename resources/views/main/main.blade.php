@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('main.bar')
            <div role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @include('main.top')
                <div class="row canvas">
                    @foreach($list as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="h5">{{ $item->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 p-0">
                                        {{ $item->text }}
                                    </div>
                                    <div class="col-6 p-0">
                                        <img src="{{ $item->image ? $item->image : '/img/record/default.jpg' }}" width="100%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('record_edit', $item) }}">Edit</a> |
                                <a href="{{ '/record/' . $item->id }}">Show</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
