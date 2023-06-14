<!DOCTYPE html>
<?php session_start(); ?>

<?php if(!isset($_SESSION['user'])){ /* 세션 x 의 경우 */ 
    echo "<script>alert(\"로그인 후 이용 가능합니다!\");</script>";
 ?>
 <meta http-equiv="refresh" content="0;url=log_in.html" />   
<?php }else{ 
    $username = $_SESSION['user']; /* 가 아닌 세션 o 의 경우 */ ?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Social Paper Main Page</title>

        <!--폰트 관련 -->
         <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
         <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
         <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <?php
    //데이터 접근
    $conn = mysqli_connect(
    'localhost', 'min', '0000', 'members','3306');

    if (mysqli_connect_errno())//접근 실패 시
    { printf("Connection failed %s\n", mysqli_connect_error());
    exit(); }
    ?>

    <body>
        <!-- NO session 네비 (Navigation) 코너 : index logo / all DB contents / introducing-->
        <!-- IF session is exist : index logo / all DB contents / myfeedset / following tag-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Social Paper</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="mainfeed.php">피드 모아보기</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">나의 피드</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">팔로잉 태그</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">#달팽이</a></li>
                                <li><a class="dropdown-item" href="#!">#고양이</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">팔로잉 피드 관리</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!--우측 상단 status 코너-->
                    <form class="d-flex">
                        <div>
                            <button class="btn btn-outline-dark mx-1" button type ="button" id="logoutbtn" onclick="location.href='logout.php' ">로그아웃</button>
                            <button class="btn btn-outline-dark" button type="button" onclick="location.href='' ">
                            <i class="bi-heart-fill me-1" style="color:lightcoral"></i>
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-3">
                <div class="text-center text-white"><!--텍스트 박스-->
                    <h2 class="display-5 fw-bolder"><?php echo $username;?>님의 피드</h2>
                    <p class="lead fw-normal text-white-50 mb-0">배경 꾸미기 준비중이에요 !</p>
                </div>
            </div>
        </header>
        
        <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    //현재 페이지
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{$page = 1;}
                    
                    //게시판 총 데이터 갯수
                    $sql = "SELECT * from board where writer=$_SESSION['user']";
                    $rst = mysqli_query($conn,$sql);
                    $row_num = mysqli_num_rows($rst);
                    
                    $list_sz = 8;//1페이지당 보여줄 데이터 갯수
                    $block_sz = 5;//한 블럭당 페이지 수

                    $block_num = ceil($page/$block_sz); // 현재 페이지 블록 구하기
                    $block_start = (($block_num - 1) * $block_sz) +1; // 블록 시작 번호
                    $block_end = $block_start + $block_sz -1; //블록 마지막 번호
                    
                    $total_page = ceil($row_num/$list_sz);//전체 페이지 갯수
                    if($block_end > $total_page) $block_end = $total_page; //블록 마지막 번호가 패아자수보다 많다면 마지막 번호는 페이지 수
                    $total_block = ceil($total_page/$block_sz);//블럭 총 갯수
                    $start_num = ($page-1) * $list_sz;//시작 번호 (page-1)에 list 사이즈 곱하기

                    $listup = "SELECT * from board where writer=$_SESSION['user'] order by postnum desc limit $start_num,$list_sz";
                    $result = mysqli_query($conn, $listup);
                    while($board = mysqli_fetch_assoc($result))
                        { //title 변수처리하기
                        $title = $board['title'];
                        if(strlen($title)>30){
                            $strim = mb_strimwidth($board['title'], '0', '30', '...', 'utf-8');
                            $title = $strim;
                        }
                        // content 변수처리하기
                        $content = $board['content'];
                        if(strlen($content)>80){
                            $strim2 = mb_strimwidth($board['content'], '0', '80', '...', 'utf-8');
                            $content = $strim2;
                        }
                        // {$title = str_replace($board['title'],mb_substr($board['title'],0,20,"utf-8")."...",$board['title']);
                        // } ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                        <!-- 작성 시간 뱃지-->
                        <div class="badge rounded-pill bg-danger text-white position-absolute" style="top: 0.5rem; left: 0.5rem">
                        <?php echo $board['wr_date']; ?>
                        </div>
                        <!-- Post image-->
                        <!-- Post image-->
                        <?php if($board['imgurl']==NULL){?>
                        <img class="card-img-top" src="https://usagi-post.com/wp-content/uploads/2020/05/no-image-found-360x250-1.png" alt="..." />
                        <?php }else{?>
                        <img class="card-img-top" src="<?php echo $board['imgurl']; ?>" alt="..." /> <?php }?>
                            <!-- Post details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- 제목과 작성자-->
                                    <h5 class="fw-bolder"><?php echo $title; ?></h5>
                                    <h6 class="fw-normal">@<?php echo $board['writer']; ?></h6>
                                    <!-- 내용-->
                                    <?php echo $content; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#"> 더 보기 </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    ?>
                
                </div>
            </div>
            <div class="container px-4 px-lg-5 my-3 mb-2">
                <div class="text-center align-center">
                    <p class="fs-6 text-black-50 mb-0">
                    <?php
                    if($page <= 1){ //만약 page가 1이면
                    echo "<b> ◀︎ </b>"; //처음임
                    }else{ echo "<a href='?page=1'> ◀︎ </a>"; //1 이상이면 1페이지로 링크연결
                    }
            
                    if($page <= 1){ //만약 page가 1이면            
                    }else{ $pre = $page-1; //1보다 큰 page에 1을 빼고, pre변수에 넣어준다.
                    echo "<a href='?page=$pre'> ◁ </a>"; //
                    }
            
                    for($i=$block_start; $i<=$block_end; $i++){ 
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                        if($page == $i){ //만약 page가 $i와 같다면 
                        echo "<b> [$i] </b>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                        }else{
                        echo "<a href='?page=$i'> [$i] </a>"; //아니라면 $i
                        }
                    }
            
                    if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면
                    }else{//현재 블록 < 블록 전채 개수
                    $next = $page + 1; //next변수에 page + 1을 해준다.
                    echo "<a href='?page=$next'> ▷ </a>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                    }
            
                    if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                    echo "<b> ▶︎ </b>"; //마지막 글자에 긁은 빨간색을 적용한다.
                    }else{
                    echo "<a href='?page=$total_page'> ▶︎ </a>"; //아니라면 마지막글자에 total_page를 링크한다.
                    }?>
                    </p>
                </div>
            </div>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Min Web Server Project Jun 2023</p></div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <?php }; ?>
  </html>