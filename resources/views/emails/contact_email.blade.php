<x-mail::message>
# {{ request()->subject }}

{{ request()->message }}

Kind Regards,<br>
{{ request()->name }}
</x-mail::message>
