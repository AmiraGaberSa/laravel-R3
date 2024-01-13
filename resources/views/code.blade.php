<x-mail::message>
# Name: {{ $data['name'] }}
# Email:{{ $data['email'] }}<br>
# Phone:{{ $data['name'] }}<br>
Subject: {{ $data['subject'] }} <br><br>
Message:<br> {{ $data['message'] }}
 
<x-mail::button :url="$url">
Visit Our Website
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>


@component('mail::message')
# Name: {{ $name }}
# Email: {{ $email }}<br>
Subject: {{ $sub }} <br><br>
Message:<br> {{ $mess }}
{{ - @component('mail::button', '$url')
Visit Our Website
@endcomponent - }}
Thanks,
{{ config('app.name') }}
@endcomponent


<x-mail::message>
# Welcome
# Name: {{ $data['name'] }}
# Email:{{ $data['email'] }}<br>
# Phone:{{ $data['phone'] }}<br><br>
# Message:<br> {{ $data['message'] }}

<x-mail::button :url="'/'">
Visit our site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>