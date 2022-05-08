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

    <section class="section section-inset-2 bg-default text-md-left main-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </section>

    @includeWhen($advantages, 'layouts.sections.advantages')

    <!-- About Us-->
    <section class="section section-inset-2 bg-default text-md-left">
        <div class="container">
            <div class="row row-30 align-items-start justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="form__question_marin">
                        <h4 class="wow fadeInRight decorate title">Дорогие друзья!</h4>
                        <p class="offset-top-md-20 wow fadeInRight decorate" data-wow-delay=".2s">
                        </p>
                        <p class="offset-top-md-20 wow fadeInRight decorate" data-wow-delay=".2s"><b>С уважением, коллектив
                                "Private Estate"</b></p>
                        <div class="group-middle d-md-flex justify-content-md-start wow fadeInRight" data-wow-delay=".3s">
                            <div class="form_question">
                                <div>
                                    <div class="form_info"><p>Задать вопрос</p></div>
                                    <form action="{{ route('send.question') }}"
                                          class="rd-form rd-mailform rd-form-inline rd-form-inline-2" method="post"
                                          id="form__subscribe">
                                        @csrf
                                        <div class="form-wrap">
                                            <input class="form-input" id="subscribe-form-2-email" type="text" name="name"
                                                   autocomplete="off" placeholder="Имя" required=""/>
                                        </div>
                                        <div class="form-wrap">
                                            <input class="form-input" id="subscribe-form-2-email" type="text" name="phone"
                                                   autocomplete="off" placeholder="Телефон" required=""/>
                                        </div>
                                        <div class="form-button submit">
                                            <button class="button button-sm button-secondary" type="submit">
                                                Задать вопрос
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
