<!DOCTYPE html>
<?php session_start(); ?>
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
    //현재 페이지
    $page = isset($_GET['page']) ? $_GET['page']:1;
    //1페이지당 보여줄 데이터 갯수
    $list_num = 5;
    //한 블럭당 페이지 수
    $page_num = 5;
    
    //데이터 접근
    $conn = mysqli_connect(
    'localhost', 'min', '0000', 'members','3306');

    if (mysqli_connect_errno())//접근 실패 시
    { printf("Connection failed %s\n", mysqli_connect_error());
    exit(); }

    //전체 페이지 갯수
    // $total_page=ceil($total/$list_num)
    ?>

    <body>
    <!-- NO session 네비 (Navigation) 코너 : index logo / all DB contents / introducing-->
        <!-- IF session is exist : index logo / all DB contents / myfeedset / following tag-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <?php 
                if(!isset($_SESSION['user'])){ /* 세션 x 의 경우 */ ?>
                <a class="navbar-brand" href="index.php">Social Paper</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">피드 모아보기</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">웹사이트 소개</a></li>
                    </ul>
                    <?php }else{
                        $username = $_SESSION['user']; /* 가 아닌 세션 o 의 경우 */
                        ?>
                        <a class="navbar-brand" href="index.php">Social Paper</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">피드 모아보기</a></li>
                        <li class="nav-item"><a class="nav-link" href="myfeed.php">나의 피드</a></li>
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
                    <?php }; ?>

                    <!--우측 상단 status 코너-->
                    <form class="d-flex">
                        <div>
                            <?php
                            if(!isset($_SESSION['user'])){ /* 세션 x 의 경우 */ ?>
                            <button class="btn btn-outline-dark mx-1" button type ="button" id="loginbtn" onclick="location.href='log_in.html' ">로그인</button>
                            <button class="btn btn-outline-dark" button type="button" onclick="location.href='register.html' ">회원가입</button>
                            <?php } else{
                                $username = $_SESSION['user']; /* 가 아닌 세션 o 의 경우 */
                                ?>
                            <button class="btn btn-outline-dark mx-1" button type ="button" id="logoutbtn" onclick="location.href='logout.php' ">로그아웃</button>
                            <button class="btn btn-outline-dark" button type="button" onclick="location.href='' ">
                            <i class="bi-heart-fill me-1" style="color:lightcoral"></i>
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                        <?php };
                        ?>
                        
                    </div>
                    </form>

                </div>
            </div>
        </nav>
    
        <!-- Personal Section -->
            <div class="container px-4 px-lg-5 mt-5">
                <!-- <p class="masthead-subheading font-weight-light"> -->
                    <!--</?php echo $username;?> -->
                    <!-- 님의 개인 페이지 </p> -->
            </div>
            
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    $listup = "SELECT * from board order by postnum desc";
                    $result = mysqli_query($conn, $listup);
                    while($board = mysqli_fetch_assoc($result))
                        { //title 변수처리하기
                        $title = $board['title'];
                        if(strlen($title)>10){
                            $strim = mb_strimwidth($board['title'], '0', '10', '...', 'utf-8');
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
                                    <h4 class="fw-bolder"><?php echo $board['title']; ?></h4>
                                    <h6 class="fw-normal">@<?php echo $board['writer']; ?></h6>
                                    <!-- 내용-->
                                    <?php echo $board['content']; ?>
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




        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Min Web Server Project Jun 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
  </html>