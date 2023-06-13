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


$sql_check = "SELECT * FROM new_table WHERE email='$email'";//DB new_table에서 email 정보와 post 된 email 값 비교해서 같은 친구 선택하기
$result = mysqli_query($conn, $sql_check);//결과값

// $username = "SELECT user_name FROM new_table WHERE email='$email'";//DB에서 이름을 선택
// $Nrst = $dbConnect->query($username);//쿼리 송신
// $memberInfo = $Nrst->fetch_array(MYSQLI_ASSOC);

//로그인 절차
if (mysqli_num_rows($result) === 1){//선택한 db결과값이 존재하는 경우(=email계정 존재 확인 여부) 진행한다
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);//계정 db를 row 변수에 담아준다
    if($row['pwd']==$pwd) {//row 변수에 있는 pwd db가 post된 입력 pwd와 같을 경우 진행한다
        $_SESSION['user'] = $row['user_name'];//
        if (isset($_SESSION['user'])) {//로그인 성공
            // $sql_check2 = "SELECT user_name FROM new_table";
            // $namerst = mysqli_query($conn, $sql_check2)
            // $user_name = mysqli_fetch_array($namerst, MYSQLI_ASSOC);
            // echo "<p><strong>$user_name</strong>님, 로그인 성공!</p>";
            // sleep(3);
            session_start();//세션 시작
            $_SESSION['user'] = $row['user_name'];//
            // $_SESSION['user_name'] = $user_name;
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