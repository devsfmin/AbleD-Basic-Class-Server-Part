<?php
session_start();

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwcheck = $_POST['pwcheck'];

//조건 달성 검사
if ($pwd != $pwcheck){//비밀번호 확인 틀리다면
    echo "비밀번호 확인 입력 문자가 서로 일치하지 않습니다!";
    echo "<a href=register.html> back page</a>";
    exit();
}

if ($user_name==NULL || $email==NULL || $pwd==NULL){//정보 입력에 누락이 있다면
    echo "정보를 모두 입력해 주세요!";
    exit();
}

//데이터 저장 및 유효성 검사
$mysqli = mysqli_connect(//접근하기
    'localhost', 'min', '0000', 'members','3306');

if (mysqli_connect_errno())//접근 실패 시
{
    printf("Connection failed %s\n", mysqli_connect_error());
exit();
}


$sql_check = "SELECT * FROM new_table WHERE user_name='$user_name'";
$request_name = mysqli_query($mysqli, $sql_check);

//활동할 닉네임 중복 체크
if (mysqli_num_rows($request_name) == 1){
    echo "이미 해당 닉네임이 존재합니다.";
}

//transaction
mysqli_query($mysqli, "Start transaction");

$last_id =-1;
$sql_register = "INSERT INTO new_table (user_name, pwd, email) VALUES ('$user_name','$pwd','$email')";
$result_register = mysqli_query($mysqli, $sql_register);
if($result_register){
    $last_id = mysqli_insert_id($mysqli);
}

//테이블 조인 이후 활용할 구간

//user_name(활동명), pwd, email 등의 개인 정보들이 테이블에 삽입되었는지 확인하기
if($result_register){
    echo "성공적으로 가입이 되었습니다!";
    header('Location: ../../index.html');
    mysqli_query($mysqli, "COMMIT");
} else {
    mysqli_query($mysqli, "ROLLBACK");
    echo "가입에 실패하였습니다!";
}

mysqli_close($mysqli);

?>