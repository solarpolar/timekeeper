@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
New Client
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
	{{ Form::open(array('action' => 'ClientController@store')) }}
        <h2>Add New Client</h2>
    
        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            {{ ($errors->has('name') ? $errors->first('name') : '') }}
        </div>

        <div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
            {{ Form::textarea('address', null, array('class' => 'form-control', 'placeholder' => 'Address')) }}
            {{ ($errors->has('address') ? $errors->first('address') : '') }}
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
    </div>
</div>

@stop