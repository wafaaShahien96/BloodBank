@component('mail::message')
# Introduction

Blood Bank Reset Password .

@component('mail::button', ['url' => 'http://bloodbank.com'])
Reset 
@endcomponent

 <p>Your Reset Code is : {{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
