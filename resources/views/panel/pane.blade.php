@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('panel.bar')
            <div role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="h2">Dashboard</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <div class="row canvas">
                    <div class="col-12">
                        <div class="table-responsive my-4">
                            <h5>All Users:</h5>
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Register</th>
                                    <th>Updated</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                <tr>
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ date('d-m-y', strtotime($u->created_at)) }}</td>
                                    <td>{{ date('d-m-y', strtotime($u->updated_at)) }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row canvas">
                    <div class="col-12">
                        <div class="table-responsive my-4">
                            <h5>All Users:</h5>
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Register</th>
                                    <th>Updated</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ date('d-m-y', strtotime($u->created_at)) }}</td>
                                        <td>{{ date('d-m-y', strtotime($u->updated_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
