@extends('layouts.app')
@section('header') YOUR POST @endsection
@section('your-post') text-primary @endsection

@section('content')
    <livewire:your-post></livewire:your-post>
@endsection
@section('right-side')
    <livewire:user-index :user="auth()->user()" :key="auth()->user()->id"></livewire:user-index>
@endsection