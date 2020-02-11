@extends('layouts.logined')

@section('content')
    <create-home-component :user="{{ json_encode(Auth::user()->name) }}"></create-home-component>
@endsection
