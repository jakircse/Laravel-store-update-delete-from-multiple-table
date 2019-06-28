@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Create Staff</h2>
    <form method="post" action="{{ route('staff.store') }}" enctype="multipart/form-data">
    	@csrf
		<div class="form-row">
		    <div class="form-group col-md-3">
		      <label for="staffcat">Category</label>
		      <select name="staffcat" class="form-control">
		      	<option>Select</option>
		      	@foreach($staffcats as $cat) <!-- Get Staff Category from Category table -->
		      	<option value="{{ $cat->catname }}">{{ $cat->catname }}</option>
		      	@endforeach
		      </select>
		     
		    </div>
		    <div class="form-group col-md-3">
		      <label for="stfid">ID</label>
		      <input type="text" name="stfid" class="form-control" id="stfid">
		  	</div>
		  	<div class="form-group col-md-6">
		      <label for="stfname">Name</label>
		      <input type="text" name="stfname" class="form-control" id="stfname">
		  	</div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-4">
		      <select name="staffcat" class="form-control">
		      	<option>Select</option>
		      	<option value="Male">Male</option>
		      	<option value="Female">Female</option>
		      </select>
		    </div>
		    <div class="form-group col-md-4">
		    	<label for="stfdesig">Designation</label>
		      <input type="text" name="stfdesig" class="form-control" id="stfdesig">
		      
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffdob">Date of Birth</label>
		      <input type="date" name="staffdob" class="form-control" id="staffdob">
		    </div>
		 </div>
		 <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="staffnid">NID</label>
		      <input type="text" name="staffnid" class="form-control" id="staffnid">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffmobile">Mobile</label>
		      <input type="text" name="staffmobile" class="form-control" id="staffmobile">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffdoj">Joining Date</label>
		      <input type="date" name="staffdoj" class="form-control" id="staffdoj">
		    </div>
		 </div>
		 <div class="form-row">
		    <div class="form-group col-md-2">
		      <label for="staffblood">Blood Group</label>
		      <input type="text" name="staffblood" class="form-control" id="staffblood">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffmail">Email</label>
		      <input type="email" name="staffmail" class="form-control" id="staffmail">
		    </div>
		    <div class="form-group col-md-3">
		      <label for="staffindex">Index</label>
		      <input type="text" name="staffindex" class="form-control" id="staffindex">
		    </div>
		    <div class="form-group col-md-3">
		      <label for="staffpw">Password</label>
		      <input type="password" name="staffpw" class="form-control" id="staffpw">
		    </div>
		 </div>

	  <button type="submit" class="btn btn-primary">Save</button>
	</form>
@endsection