<html>
<head>
    <title>plan</title>
    <style>
        body {font-size:16pt; color:#999; }
        h1 {font-size:30pt; text-align:center;}
        p {text-align:center;}
        #head {text-align:right;}
        #logout {
                text-align: center;
                margin-right: -500px;
                }
    </style>
    <header>
    <header id="logout"><input type="submit" value="ログアウト"></header>
</head>
<body>
    <h1>予定表</h1>
    <form method="POST" action="/plan">
    @csrf
    <p>日付:<input type="text" name="date"></p>
    <p>時間:<input type="text" name="time"></p>
    <p>予定:<textarea name="plans"></textarea></p>
    <p>内容:<textarea name="content"></textarea></p>
    <p><input type="submit" value="登録"></p>

</body>
</html>