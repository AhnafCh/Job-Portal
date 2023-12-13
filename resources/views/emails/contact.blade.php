@component('mail::message')
<b>Contact from {{ $name }} <{{ $email }}> </b><br>

<b>Subject: </b>{{ $uSubject }}<br>

<p>{{ $content }}</p> <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent