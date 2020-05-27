@extends('green.layouts.main')

@section('content')
<div class="mo2">
    <div class="wrapper">
        <form method="POST" action="{{ route('forgot.password') }}">
            @csrf
            <div class="form">
                <div class="form">
                    <label for="email" class="col-md-4 col-form-label text-md-right">
                        {{ __('Напишите свою почту') }}
                    </label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" name="send-mail" class="form_btn">
                            {{ __('Получить сгенерированный пароль') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
