@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <logo-component> </logo-component>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 <div class="flex-center position-ref full-height" id="app">
                    <div class="container">
                        <data-table-component
                            fetch-url="users/view"
                            :columns="['id', 'email',' ','name',' ','phone', 'created_at','updated_at']"
                        ></data-table-component>
                    </div>
                </div>

                    <!-- <viewuser-component></viewuser-component> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
