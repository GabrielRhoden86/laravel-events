<x-mail::message>
# Introduction

The body of your message.

O TOTAL DE VENDAS FOI:
<b>{{$sales.' | '.$date}}</b>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

