<x-mail::message>
# Hello!,
you have received a new message from {{ $maildata['name'] }}<br>
Email: {{ $maildata['email'] }}<br>
Phone: {{ $maildata['phone'] }}<br>
Subject: {{ $maildata['subject'] }} <br>
# Message:<br>
{{ $maildata['message'] }}

<x-mail::button :url="'/'">
    Message Reply
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

