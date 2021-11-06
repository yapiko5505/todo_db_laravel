@extends('layout')
@section('title', 'スケジュール設定')
@section('content')
    <h1>スケジュール設定</h1>
    <!-- スケジュール入力フォーム -->
    <form method="POST" action="/holiday"> 
        <div class="form-group">
        {{csrf_field()}}  
        <label for="day">日付 [YYYY/MM/DD]</label>
        <input type="text" name="day" class="form-control" id="day" value="{{$data->day}}">
        <label for="description">予定</label>
        <input type="text" name="description" class="form-control" id="description" value="{{$data->description}}"> 
        <div>
        <button type="submit" class="btn btn-primary"> 登録</button>
        <input type="hidden" name="id" value="{{$data->id}}">
    </form> 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- スケジュール一覧表示 -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">日付</th>
                <th scope="col">説明</th>
                <th scope="col">作成日</th>
                <th scope="col">更新日</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $val)
            <tr>
                <th scope="row"><a href="{{ url('/holiday/'.$val->id) }}">{{$val->day}}</a></th>
                <td>
                    <form action="/holiday" method="post">
                    @csrf
                        <input type="hidden" name="id" value="{{$val->id}}">
                        {{ method_field('delete') }}
                        {{csrf_field()}}
                        <button class="btn btn-default" type="submit">Delete</button>
                    </form>
                </td>
                <td>{{$val->description}}</td>
                <td>{{$val->created_at}}</td>
                <td>{{$val->updated_at}}</td>
            </tr>
            @endforeach
        <tbody>
    </table>
    <a href="{{ url('/index') }}">カレンダーに戻る</a><br>
    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
        ログアウト
    </a>
    <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="d-none">
        @csrf
    </form>
    <script>
    $( function() {
        $( "#day").datepicker({dateFormat: 'yy-mm-dd'});
    });
    </script>
@endsection