@component('mail::message')
# Introduction
welcom {{$data['data']->name}}


@component('mail::button', ['url' => 'aurl("reset/password/".$data["token"])'])
click here to reset your password

@endcomponent
or
<br>Copy this link<br>
<a href='{{aurl("reset/password/".$data["token"])}}' >{{aurl("reset/password/".$data["token"])}}</a><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
