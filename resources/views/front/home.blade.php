@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <header data-scroll="60" data-scroll-show class="header">
        <div class="header__container">
            <div class="header__wrapper">
                <a href="" class="header__logo">php<span>laravel</span></a>
                <div class="header__wrap">
                    <div class="header__block">
                    </div>
                    <div class="header__info">
                        <a href="{{ route('logout') }}" class="header__contact btn _icon-arrow-1">Вийти</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="success-page">
        <section class="page-form">
            <div class="page-form__container">
                <div class="page-form__wrapper">
                    <div class="page-form__info form">
                        <h1>Вітаємо <strong>{{ auth()->user()->name }}</strong></h1>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
