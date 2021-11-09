@component('mail::message')
# Introduction

{{ $newUser->name }} ({{ $newUser->email }}) has joined the system!

@component('mail::button', ['url' => route('dashboard')])
See dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
