@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Client Info
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-12 ">

        <h2>Client Info</h2>
    
        <p><strong>{{ $client->name}}</strong></p>

        <p>{{ nl2br($client->address) }}</p>

    </div>
</div>

@stop