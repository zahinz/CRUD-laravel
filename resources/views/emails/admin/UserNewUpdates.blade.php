@component('mail::message')
# Introduction

{{ $newUpdate->name }} ({{ $newUpdate->email }}) has update the account.

@component('mail::button', ['url' => route('dashboard')])
See dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
