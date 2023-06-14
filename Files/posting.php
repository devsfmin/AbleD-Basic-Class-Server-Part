<!DOCTYPE html>
<?php session_start(); ?>
<?php if(!isset($_SESSION['user'])){ /* 세션 x 의 경우 */ 
    echo "<script>alert(\"로그인 후 작성하실 수 있습니다!\");</script>";
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
                        <li class="nav-item"><a class="nav-link active" href="myfeed.php">나의 피드</a></li>
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

        <!-- Posting Section -->
        <div id="board_write">
            <div id="write_area">
                <form action="write_ok.php" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="in_content" id="in_content" placeholder="작성할 내용" required></textarea>
                    </div>
                    <div id="in_tag">
                        <textarea name="in_tag" id="in_tag" placeholder="#해시태그" required></textarea>
                    </div>
                    <div class="bt_se">
                        <button class="btn btn-outline-dark mx-auto" button type ="button" onclick="location.href='write_ok.php'">작성 완료</button>
                    </div>
                </form>
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