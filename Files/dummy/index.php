<head>
	<link rel="stylesheet" href="lib/css/style.css">
</head>
<body>
<div id="login_wrap" class="wrap">
    <div>
        <h1>로그인</h1>
        <form action="login_ok.php" method="post" id="login_form" class="form">
            <p><input type="text" name="name" id="name" placeholder="ID(email)"></p>
            <p><input type="password" name="pw" id="pw" placeholder="PW"></p>
            <p class="forgetpw"><a href="changepw.php">비밀번호 찾기</a></p>
            <p><input type="submit" value="Login" class="form_btn"></p>
        </form>
        <p class="signup_btn">아직 계정이 없으신가요? &nbsp; <a href="signup.php">가입하기</a></p>
    </div>
</div>
</body>