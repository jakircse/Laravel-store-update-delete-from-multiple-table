@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>{{$staffinfo->name}}</h1>
    <div class="row">
    	<div class="col-md-4 info-side">
    		<div class="inf-logo">
    			<img width="100%" src="photo.jpg">
    		</div>
    		<p>ID: {{$staffinfo->user_id}}</p>
    		<p><a href="/staff" class="btn btn-default">Go back</a></p>
    	</div>
    	<div class="col-md-8 info-cont">
    		<table class="table table-hover table-dark">
    			<tbody>
                    <tr>
                        <th scope="row">Mobile</th>
                        <td>{{ $userinfo->mobile }}</td>
                    </tr>
    				<tr>
    					<th scope="row">Designation</th>
    					<td>{{ $staffinfo->designatin }}</td>
    				</tr>
    				<tr>
    					<th scope="row">Gender</th>
    					<td>{{ $staffinfo->Gender }}</td>
    				</tr>
    				<tr>
    					<th scope="row">Date of Birth</th>
    					<td>{{ $staffinfo->dob }}</td>
    				</tr>
    				<tr>
    					<th scope="row">Joining Date</th>
    					<td>{{ $staffinfo->doj }}</td>
    				</tr>
    				<tr>
    					<th scope="row">Blood Group</th>
    					<td>{{ $staffinfo->blood }}</td>
    				</tr>
    				<tr>
    					<th scope="row">Email</th>
    					<td>{{ $userinfo->email }}</td>
    				</tr>
    			</tbody>
    		</table>
    	</div>
    </div>
@endsection