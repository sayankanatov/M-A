@extends('green.layouts.main')

@section('content')

@if($user->role_id == 1)
    @include('green.pages.profile.user')
@elseif($user->role_id == 2)
    @include('green.pages.profile.lawyer')
@elseif($user->role_id == 3)
    @include('green.pages.profile.company')
@endif

@endsection