@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <logo-component> </logo-component>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Prizes & Awards</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-4">
                        <addprize-component></addprize-component>
                    </div>
                    <div class="col-md-8">
                        <viewprize-component></viewprize-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
