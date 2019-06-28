@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')


<h1>Staff Category List</h1>
    
    @if(count($staffcats) > 0) <!-- Checking if there any data in table -->
    	<table class="table table-hover table-dark">
		  <thead>
		    <tr>
		      <th scope="col">SL</th>
		      <th scope="col">Category</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
			@foreach($staffcats as $cat)
			<tr>
		      <th scope="row">{{ $cat->id }}</th>
		      <td>{{ $cat->catname }}</td>
		      <td><form action="{{ route('staff.destroy', $cat->id)}}" method="post">
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
		<p>No Category Found</p>
	@endif

<h2>Create Staff Category</h2>
<form method="post" action="{{ route('staff.store') }}">
	@csrf
	<div class="form-row">
	    <div class="form-group col-md-8">
	      <label for="st_cat_name">Category</label>
	      <input type="text" name="st_cat_name" class="form-control" id="st_cat_name">
	     
	    </div>
	  
	</div>
	
  <button type="submit" class="btn btn-primary">Add</button>
</form>


 
@endsection