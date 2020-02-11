@extends('layouts.logined')

@section('content')
    <home-component :user="{{ json_encode(Auth::user()->name) }}"></home-component>
@endsection
