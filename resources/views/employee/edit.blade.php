@extends('/employee.create')
@section('title', 'Edit Employee')

@section('editId', $item->id)
@section('nameField', $item->name)
@section('emailField', $item->email)
@section('addressField', $item->address)
@section('phoneField', $item->phone)

@section('editMethod')
	{{method_field('put')}}
@endsection


