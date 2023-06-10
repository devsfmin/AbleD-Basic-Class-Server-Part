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

//로그인 절차
if (mysqli_num_rows($result) === 1){//result 변수는 DB에서 체크하는 email 정보를 담고있다.
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);//email과 거져온 데이터
    if($row['pwd']==$pwd) {
        $_SESSION['email'] = $email;
        if (isset($_SESSION['email'])) {
            echo "로그인 성공!";
            sleep(3);
            header('Location: index.php');
        } else {
            echo "Fail to Session Save";
        }
    } else {
        echo "비밀번호 또는 이메일이 일치하지 않습니다.";
        echo "<a href=log_in.html> 돌아가기 </a>";
    exit();
    }
} else {
    echo "가입된 계정이 없습니다.";
    echo "<a href=log_in.html> 돌아가기 </a>";
    exit();
}

mysqli_close($conn);

?>