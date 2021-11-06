<html>
<head>
    <title>login</title>
    <style>
        body {font-size:16pt; color:#999; }
        h1 {font-size:30pt; text-align:center;}
        p {text-align:center;}
    </style>
</head>
<body>
    <h1>ログイン画面</h1>
    <form method="POST" action="/login">
    @csrf
    <p>ユーザーID:<input type="text" name="id"></p>
    <p>パスワード:<input type="text" name="password"></p>
    <p><input type="submit" value="ログイン"></p>

</body>
</html>