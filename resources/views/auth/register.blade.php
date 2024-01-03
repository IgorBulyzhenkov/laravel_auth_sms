@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <main id="success-page">
        <section class="page-form">
            <div class="page-form__container">
                <div class="page-form__wrapper">
                    <form action="{{ route('reg.create') }}" method="POST" class="page-form__info form">
                        @csrf
                        <h3 class="form__title">Зареєструватися</h3>
                        <div class="form__wrap">
                            <div class="form__item">
                                <label>
                                    <input data-error="Заповніть" data-required data-validate name="name" type="text" placeholder="Ім'я" class="form__input">
                                </label>
                            </div>
                            <div class="form__item">
                                <label>
                                    <input data-error="Введіть номер телефону" data-required="phone" data-validate name="phone" type="tel" placeholder="Введіть номер телефону" class="form__input phone-mask">
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="form__button btn">Зареєструватися</button>
                        <a href="{{ route('login') }}" class="form__link">Вхід</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
