@props(['route', 'title'])

<a class="btn btn-primary mx1 rounded-pill" href="{{ route($route) }}">{{$title}}</a>
