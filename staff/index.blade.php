@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>Staff List</h1>
    <p class="float-right">
    	<a href="/staff/create" class="btn btn-primary">Create Staff</a>
    </p> 
    @if(count($staffinfo) > 0) <!-- Checking if there any data in table -->
    	<table class="table table-hover table-dark">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Designation</th>
		      <th scope="col">Mobile</th>
		      <th scope="col">View</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
			@foreach($staffinfo as $info)
			
			<tr>
		      <th scope="row">{{ $info->user_id }}</th>
		      <td>{{ $info->name }}</td>
		      <td>{{ $info->designaton }}</td>
		      <td> <!-- Get staff mobile number from User Table -->
		      		@foreach($userinfo as $user)
		      			@if($user->user_id == $info->user_id)
		      				{{$user->mobile}}
		      				@break;
		      			@endif
		      		@endforeach
		      	</td>
		      <td><a href="/staff/{{$info->user_id}}">View</a></td>
		      <td><a href="/staff/{{$info->user_id}}/edit">Edit</a></td>
		      <td><form action="{{ route('staff.destroy', $info->user_id )}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
		    </tr>
			@endforeach
		</tbody>
	</table>

		

	@else
		<p>No Staff Found</p>
	@endif
@endsection