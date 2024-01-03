@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <main id="success-page">
        <section class="page-form">
            <div class="page-form__container">
                <div class="page-form__wrapper">
                    <form action=" {{ route('login.create') }} " method="POST" class="page-form__info form">
                        @csrf
                        <h3 class="form__title">Вхід</h3>
                        <div class="form__wrap">
                            <div class="form__item">
                                <label>
                                    <input data-error="Введіть номер телефону" data-required="phone" data-validate name="phone" type="tel" placeholder="Введіть номер телефону" class="form__input phone-mask">
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="form__button btn">Вхід</button>
                        <a href="{{ route('reg_page') }}" class="form__link">Зареєструватися</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
