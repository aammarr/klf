@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <logo-component> </logo-component>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Sponsors</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-4">
                        <addsponsor-component></addsponsor-component>
                    </div>    
                    <div class="col-md-8">
                        <viewsponsor-component></viewsponsor-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
