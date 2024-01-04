@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
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
