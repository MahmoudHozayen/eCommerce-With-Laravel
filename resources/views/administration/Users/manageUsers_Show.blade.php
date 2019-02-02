@extends('layouts.adminLayout.masterLayout')
@section('content')
	<img 
		@if(!empty($id->avatars))
			src="{{ asset('storage/Avatars/'.$id->avatars) }}"
		@else
			src="{{ asset('storage/Avatars/default.jpg') }}"
		@endif
	>
	{{ dd($id->avatars)}}
@endsection