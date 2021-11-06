@extends('layout')
@section('title', 'カレンダー')
@section('content')
<a href="{{ url('/holiday') }}">スケジュール設定</a><br>
<!-- <a href="{{ url('/logout') }}">ログアウト</a> -->
<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
    ログアウト
</a>
<form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="d-none">
    @csrf
</form>
    {!!$cal_tag!!}
@endsection
