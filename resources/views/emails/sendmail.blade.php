@component('mail::message')

{!! $data !!}

@component('mail::button', ['url' => route('login')])
Ir al sitio web
@endcomponent

{{ __('Thanks') }},<br>
{{ config('app.name') }}
@endcomponent
