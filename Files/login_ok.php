<?php
session_start();

// $user_name = $_POST['user_name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

//입력사항 체크
if ($email==NULL || $pwd==NULL){//정보 입력 누락 시
    echo "이메일과 비밀번호를 모두 입력해 주세요!";
    echo "<a href=log_in.html> 돌아가기 </a>";
    exit();
}

//데이터 저장 및 유효성 검사
$mysqli = mysqli_connect(//접근 하기
    'localhost', 'min', '0000', 'members','3306');

if (mysqli_connect_errno())//접근 실패 시
    { printf("Connection failed %s\n", mysqli_connect_error());
    exit(); }


$sql_check = "SELECT * FROM new_table WHERE email='$email'";
$result = mysqli_query($mysqli, $sql_check);

//활동할 닉네임 중복 체크
if (mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC);
    if($row['pwd']==$pwd) {
        $_SESSION['email'] = $email;
        if (isset($_SESSION['email'])) {
            echo "로그인 성공!";
            sleep(1);
            header(Location: 'index.html');
        } else {
            echo "Fail to Session Save";
        }
    } else {
        echo "wrong id or pw";
    }
} else {
    echo "wrong id or pw";
}

mysqli_close($mysqli);

?>