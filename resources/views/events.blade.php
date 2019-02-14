@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <logo-component> </logo-component>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Events</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-6">
                        <addevent-component></addevent-component>
                    </div>
                    <div class="col-md-6">
                        <viewevent-component></viewevent-component>
                    </div>
                    <!-- <div class="col-md-6">

                    <component v-bind:is="component"></component>
                        <button v-on:click="component='add-comp'"> Add Component </button>
                        <button v-on:click="component='view-comp'"> View Component </button>

                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
