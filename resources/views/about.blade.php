@extends('components._page')

@section('content')
    @include('components.breadcrumbs', ['page_alias' => 'services'])
    @include('contents.about')
    @include('components.testmonials')
    @include('components.faq')
    @include('components.gallery')
@endsection