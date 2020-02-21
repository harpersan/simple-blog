@extends('layouts.app')

@section('content')
<edit-profile :user="{{  json_encode(Auth::user()) }}"></edit-profile>
@endsection
