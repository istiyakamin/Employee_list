@extends('layouts.app')
@section('title', 'Employee List')
@section('create')

<form action="/employee/@yield('editId')" method="post">
	{{csrf_field()}}
	@section('editMethod')
	@show
	<div class="modal-header">
		<h4 class="modal-title">Add Employee</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label>Name</label>
			<input type="text" value="@yield('nameField')" name="name" class="form-control" >
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" value="@yield('emailField')" class="form-control" >
		</div>
		<div class="form-group">
			<label>Address</label>
			<textarea class="form-control" name="address" >@yield('addressField')</textarea>
		</div>
		<div class="form-group">
			<label>Phone</label>
			<input type="text" class="form-control" name="phone" value="@yield('phoneField')">
		</div>
	</div>
	<div class="modal-footer">
		<a href="/employee"><input type="button" class="btn btn-default" value="Cancel"></a>
		<input type="submit" class="btn btn-success" value="Add">
	</div>
	@include('employee.partials.errors')
</form>
@endsection