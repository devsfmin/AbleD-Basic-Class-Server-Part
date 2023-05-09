<!-- signup.php -->
<head>
	<link rel="stylesheet" href="lib/css/style.css">
</head>
<body>
    <div id="signup_wrap" class="wrap">
        <div>
            <h1>회원 가입</h1>
            <form action="signup_suc.php" method="post" name="signform" id="members" class="form" onsubmit="return sendit()">
                <p><input type="text" name="username" id="name" placeholder="활동할 닉네임(영문)"></p>
                <p><input type="text" name="id" id="email" placeholder="ID(email)"></p>
                <p><input type="password" name="pw" id="pw" placeholder="PW"></p>
                <p><input type="password" name="pw_ch" id="pw_ch" placeholder="PW Check"></p>
                <!-- <p><input type="text" name="userphone" id="userphone" placeholder="Phone Number 000-0000-0000"></p> -->
                <!-- <p><input type="text" name="useremail" id="useremail" placeholder="E-mail"></p> -->
                <!-- <p class="interest"> -->
                    <!-- <label for="drive">Drive <input type="checkbox" name="interest[]" id="drive" value="Drive"></label> -->
                    <!-- <label for="movie">Movie <input type="checkbox" name="interest[]" id="movie" value="Movie"></label> -->
                    <!-- <label for="study">Study <input type="checkbox" name="interest[]" id="study" value="Study"></label> -->
                    <!-- <label for="game">Game <input type="checkbox" name="interest[]" id="game" value="Game"></label>  -->
                    <!-- <label for="health">Health <input type="checkbox" name="interest[]" id="health" value="Health"></label> -->
                    <!-- <label for="coding">Coding <input type="checkbox" name="interest[]" id="coding" value="Coding"></label> -->
                <!-- </p> -->
                <p><input type="submit" value="가입 신청" class="form_btn"></p>
            </form>
            <p class="signup_btn">이미 계정이 있으신가요? &nbsp; <a href="index.php">로그인</a></p>
        </div>
    </div>
    <!-- <script src="./lib/js/regist.js"></script> -->
</body>