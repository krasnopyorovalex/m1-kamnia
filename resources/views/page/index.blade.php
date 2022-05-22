@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
    <meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($page->image ? $page->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Private Estate - недвижимость для жизни">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    @includeWhen($page->slider, 'layouts.sections.slider', ['slider' => $page->slider])

    @if($page->text)
    <section class="section section-inset-2 bg-default text-md-left main-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="section-inset-2 bg-default">
        <div class="container">
            @include('layouts.shortcodes.catalogs', ['catalogs' => $categories])
        </div>
    </section>

    @includeWhen($advantages, 'layouts.sections.advantages')
    @includeWhen($guestbook, 'layouts.sections.guestbook')

    @include('layouts.forms.question_form')

    <section class="section-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('images/banner-01.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    @includeWhen($partners, 'layouts.sections.partners')

    <section class="section">
        <div class="yandex-map-container" id="map-yandex"></div>
    </section>
@endsection
