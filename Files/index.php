<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- <meta name="description" content=""/> -->
        <!-- <meta name="author" content="" /> -->
        
        <title>Social Paper Main Page</title>

        <?php if(!isset($_SESSION['user_name'])) {
            echo "<p>로그인 가능</p>";} else {
                $user_name = $_SESSION['user_name'];
                echo "<p><strong>$user_name</strong>님, 안녕하세요? 로그인 된 상태에요.</p>"
            }
            ?>
        <!-- 폰트 관련 -->
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
        <!-- 상단 네비 (Navigation) 코너-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Social Paper</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="mainfeed.html">피드 모아보기</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">주제</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">친구 피드</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">#달팽이 피드</a></li>
                                <li><a class="dropdown-item" href="#!">#고양이 피드</a></li>
                            </ul>
                        </li>
                        <!--웹사이트 소개-->
                        <li class="nav-item"><a class="nav-link" href="#!">웹사이트 소개</a></li>
                    </ul>

                    <!--우측 상단 status 코너-->
                    <form class="d-flex">
                        <div>
                            <button class="btn btn-outline-dark mx-1" button type ="button" onclick="location.href='log_in.html' ">
                            로그인
                            <!-- <i class="bi-heart-fill me-1" style="color:lightcoral"></i> -->
                            <!-- 새 소식 -->
                            <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">2</span> -->
                        </button>
                        <button class="btn btn-outline-dark" button type="button" onclick="location.href='register.html' ">회원가입</button>
                        <!--<button class="btn btn-outline-dark" type="submit">회원가입</button>-->
                    </div>
                    </form>

                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead text-white text-center">
            <!-- linear-gradient(to left, #f857a6, #ff5858) -->
            <div class="container d-flex align-items-center flex-column"> 
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/mainp_logo_s.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Social Paper</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light">새로운 소셜 네트워크, 소셜 페이퍼에 오신 것을 환영합니다!</p>
            </div>
        </header>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
  </html>