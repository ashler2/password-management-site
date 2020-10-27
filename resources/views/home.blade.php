@extends('layouts.app')

@section('content')

{{Auth::user()->id}}
<div class="" id="app">
<app :userId="{{ json_encode(Auth::user()) }}"></app>
</div>

@endsection
