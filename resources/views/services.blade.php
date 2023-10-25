@extends('components._page', ['page_title' => 'Услуги'])

@section('content')
    @include('contents.' . $name)
    @include('contents.about')
    @include('components.testmonials')
    @include('components.faq')
    @include('components.gallery')
@endsection