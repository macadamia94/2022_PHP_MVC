<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="join.css">
    <title>로그인</title>
</head>
<body class="container">
    <h1>로그인</h1>
    <form action="login_proc.php" method="post">
        <div><input type="text" name="uid" placeholder="아이디" autofocus></div>
        <div><input type="password" name="upw" placeholder="비밀번호"></div>
        <div><input type="submit" value="로그인"></div>
    </form>
    <a href="join.php">회원가입</a>
</body>
</html>