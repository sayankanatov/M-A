@extends('layouts.profile')

@section('content')

@if($user->role_id == 1)
    @include('pages.profile.user')
@elseif($user->role_id == 2)
    @include('pages.profile.lawyer')
@elseif($user->role_id == 3)
    @include('pages.profile.company')
@endif

@endsection
