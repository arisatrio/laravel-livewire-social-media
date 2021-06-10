@extends('layouts.app')
@section('header') HOME @endsection
@section('home') text-primary @endsection

@section('content')
    <livewire:postingan-create></livewire:postingan-create>
    <livewire:postingan-index></livewire:postingan-index>
@section('right-side')
    <livewire:user-index :user="auth()->user()" :key="auth()->user()->id"></livewire:user-index>
@endsection
@endsection
