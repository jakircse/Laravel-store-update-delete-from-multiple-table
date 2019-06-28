@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Update Staff</h2>
    <form method="post" action="{{ route('staff.update', $staffinfo->user_id) }}" enctype="multipart/form-data">
    	@method('PATCH')
        @csrf
		<div class="form-row">
		    <div class="form-group col-md-3">
		      <label for="staffcat">Category</label>
		      <select name="staffcat" class="form-control">
		      	<option value="{{ $cat->catname }}">{{ $cat->catname }}</option>
		      	@foreach($staffcats as $cat)
		      	<option value="{{ $cat->catname }}">{{ $cat->catname }}</option>
		      	@endforeach
		      </select>
		     
		    </div>
		    <div class="form-group col-md-3">
		      <label for="stfid">ID</label>
		      <input type="text" name="stfid" value="{{ $staffinfo->user_id }}" class="form-control" id="stfid">
		  	</div>
		  	<div class="form-group col-md-6">
		      <label for="stfname">Name</label>
		      <input type="text" name="stfname" value="{{ $staffinfo->name }}" class="form-control" id="stfname">
		  	</div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-4">
		      <select name="staffcat" class="form-control">
		      	<option value="{{ $staffinfo->Gender }}">{{ $staffinfo->Gender }}</option>
		      	<option value="Male">Male</option>
		      	<option value="Female">Female</option>
		      </select>
		    </div>
		    <div class="form-group col-md-4">
		    	<label for="stfdesig">Designation</label>
		      <input type="text" name="stfdesig" value="{{ $staffinfo->designation }}" class="form-control" id="stfdesig">
		      
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffdob">Date of Birth</label>

		      <input type="date" name="staffdob" value="{{ $staffinfo->dob }}" class="form-control" id="staffdob">
		    </div>
		 </div>
		 <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="staffnid">NID</label>
		      <input type="text" name="staffnid" value="{{ $staffinfo->nid }}" class="form-control" id="staffnid">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffmobile">Mobile</label>
		      <!-- Get mobile number from User table -->
		      <input type="text" name="staffmobile" value="{{ $userinfo->mobile }}" class="form-control" id="staffmobile">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffdoj">Joining Date</label>
		      <input type="date" name="staffdoj" value="{{ $staffinfo->doj }}" class="form-control" id="staffdoj">
		    </div>
		 </div>
		 <div class="form-row">
		    <div class="form-group col-md-2">
		      <label for="staffblood">Blood Group</label>
		      <input type="text" name="staffblood" value="{{ $staffinfo->blood }}" class="form-control" id="staffblood">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="staffmail">Email</label>
		      <!-- Get email from User table -->
		      <input type="email" name="staffmail" value="{{ $userinfo->email }}" class="form-control" id="staffmail">
		    </div>
		    <div class="form-group col-md-3">
		      <label for="staffindex">Index</label>
		      <input type="text" name="staffindex" value="{{ $staffinfo->mpoin }}" class="form-control" id="staffindex">
		    </div>
		    <div class="form-group col-md-3">
		      <label for="staffpw">Password</label>
		      <!-- Get password from User table -->
		      <input type="password" name="staffpw" value="{{ $userinfo->password }}" class="form-control" id="staffpw">
		    </div>
		 </div>

	  <button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection