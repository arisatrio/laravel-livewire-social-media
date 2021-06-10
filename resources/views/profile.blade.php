@extends('layouts.app')
@section('header') PROFILE @endsection
@section('profile') text-primary @endsection

@section('content')
    <livewire:profile-component :user="auth()->user()" :key="auth()->user()->id"></livewire:profile-component>
@endsection
@section('right-side')
    <livewire:profpic-component :user="auth()->user()" :key="auth()->user()->id"></livewire:profpic-component>
@endsection