<?php
session_start();
//post될 요소들 : title, content, imgurl, tag
$title = $_POST['title'];
$content = $_POST['content'];
$imgurl = $_POST['imgurl'];
$tag = $_POST['tag'];

//writer 작성자 추출
if(!isset($_SESSION['user'])){ /* 세션 x 의 경우 */ 
    echo "<script>alert(\"세션이 만료되었습니다!\");</script>";
 ?>
 <meta http-equiv="refresh" content="0;url=log_in.html" /> 
<?php }else{ /* 가 아닌 세션 o 의 경우 */
    $writer = $_SESSION['user']; }


//작성 시간 추출
$wr_date = date('Y-m-d');

//조건 달성 검사(1)
//if ($title==NULL || $content==NULL){//제목 또는 내용이 없을 경우
    // echo "<script>alert(\"제목 또는 내용을 입력해 주세요!\");</script>";
    // exit();}

//데이터 접근
$conn = mysqli_connect(
    'localhost', 'min', '0000', 'members','3306');

if (mysqli_connect_errno())//접근 실패 시
    { printf("Connection failed %s\n", mysqli_connect_error());
    exit(); }

//transaction
// mysqli_query($mysqli, "Start transaction");


$last_id =-1;
$sql_post = "INSERT INTO board (writer, title, imgurl, content, wr_date, tag) VALUES ('$writer','$title','$imgurl','$content','$wr_date','$tag')";
$result_post = mysqli_query($conn, $sql_post);
if($result_post){
    $last_id = mysqli_insert_id($conn);}

    
//작성한 내용들이 테이블에 삽입되었는지 확인하기
if($result_post){
    echo "<script>alert(\"저장되었습니다!\");</script>";
    header('Location: mainfeed.php');
    mysqli_query($conn, "COMMIT");
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "작성에 실패하였습니다!";
}
?>

