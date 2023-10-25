@extends('components._page')

@section('content')
    @include('components.message')
    @include('components.modal')
    @include('components.slider')
    @include('components.about')
    @include('components.services')
    @include('components.video')
    @include('components.testmonials')
    {{-- @include('components.blog') --}}
    @include('components.faq')
    @include('components.gallery')
@endsection