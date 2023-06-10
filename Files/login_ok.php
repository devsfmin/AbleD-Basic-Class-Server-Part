<?php
session_start();

$email = $_POST['email'];
$pwd = $_POST['pwd'];


//입력사항 체크
if ($email==NULL || $pwd==NULL){//정보 입력 누락 시
    echo "이메일과 비밀번호를 모두 입력해 주세요!";
    echo "<a href=log_in.html> 돌아가기 </a>";
    exit();
}

//데이터 접근
$conn = mysqli_connect(
    'localhost', 'min', '0000', 'members','3306');

if (mysqli_connect_errno())//접근 실패 시
    { printf("Connection failed %s\n", mysqli_connect_error());
    exit(); }


$sql_check = "SELECT * FROM new_table WHERE email='$email'";
$result = mysqli_query($conn, $sql_check);

$sql_namepik = "SELECT * FROM new_table WHERE user_name='$user_name'";
$namerst = mysqli_query($conn, $sql_namepik);

//로그인 절차
if (mysqli_num_rows($result) === 1){//result 변수는 DB에서 체크하는 email 정보를 담고있다.
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);//email과 거져온 데이터
    if($row['pwd']==$pwd) {//password
        $_SESSION['email'] = $email;
        if (isset($_SESSION['email'])) {//로그인 성공 시
            echo "로그인 성공!";
            session_start();
            $_SESSION['user_name'] = $user_name;
            header('Location: index.php');
        } else {//email
            echo "Fail to Session Save";
        }
    } else {//password 불일치
        echo "비밀번호 또는 이메일이 일치하지 않습니다.";
        echo "<a href=log_in.html> 돌아가기 </a>";
    exit();
    }
} else {//email 계정 확인 불가 시
    echo "가입된 계정이 없습니다.";
    echo "<a href=log_in.html> 돌아가기 </a>";
    exit();
}

mysqli_close($conn);

?>