@component('mail::message')
# Introduction

{{ $newUser->name }} ({{ $newUser->email }}) has joined the system!

@component('mail::See Dashboard', ['url' => route('dashboard')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
