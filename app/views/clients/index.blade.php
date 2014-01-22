@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Clients
@stop

{{-- Content --}}
@section('content')
<div class="row">
	<div class="col-md-6">
		<h3>Clients</h3>
	</div>
	<div class="col-md-6">
		
	</div>
</div>

<div class="row">
  <div class="col-md-9">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>Name</th>
				<th>Address</th>
				<th>Options</th>
			</thead>
			<tbody>
			@foreach ($clients as $client)
				<tr>
					<td>{{ $client->name }}</td>
					<td>{{ nl2br($client->address) }}</td>
					<td>
						<button class="btn btn-default" onClick="location.href='{{ action('ClientController@edit', array($client->id)) }}'">Edit</button>
					 	<button class="btn btn-default action_confirm" type="button" data-method="delete" href="/clients/{{ $client->id}}">Delete</button>
					 </td>
				</tr>	
			@endforeach
			</tbody>
		</table> 
	</div>
   </div>
   <div class="col-md-3">
		<button class="btn btn-primary btn-lg btn-block" onClick="location.href='{{ action('ClientController@create') }}'">New Client</button>
	</div>
</div>
<!--  
	The delete button uses Resftulizer.js to restfully submit with "Delete".  The "action_confirm" class triggers an optional confirm dialog.
	Also, I have hardcoded adding the "disabled" class to the Admin group - deleting your own admin access causes problems.
-->
@stop

