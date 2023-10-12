@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' =>'', 'color' => 'error'])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
