@extends('layouts.app')
@section('header') LIKED POST @endsection
@section('liked-post') text-primary @endsection

@section('content')
    <livewire:liked-post></livewire:liked-post>
@endsection
@section('right-side')
    <livewire:user-index :user="auth()->user()" :key="auth()->user()->id"></livewire:user-index>
@endsection