<?php
// session_start();

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


$sql_check = "SELECT * FROM new_table WHERE email='$email'";//DB에서 email 정보 체크
$result = mysqli_query($conn, $sql_check);//결과값은 해당 이메일 정보

$sql_namepik = "SELECT * FROM new_table WHERE user_name='$user_name'";
$namerst = mysqli_query($conn, $sql_namepik);

//로그인 절차
if (mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);//email 데이터를 row 변수에 담아준다
    if($row['pwd']==$pwd) {//email 데이터가 담긴 row 변수의 password와, 로그인 입력창에서 post한 password와 일치하는지 확인한다
        $_SESSION['email'] = $email;
        if (isset($_SESSION['email'])) {//로그인 성공 시
            $user_name = mysqli_fetch_array($namerst, MYSQLI_ASSOC);
            echo "<p><strong>$user_name</strong>님, 로그인 성공!</p>";
            sleep(3);
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['user_name'] = $user_name;
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

// mysqli_close($conn);

?>
<meta http-equiv="refresh" content="0;url=index.php" />