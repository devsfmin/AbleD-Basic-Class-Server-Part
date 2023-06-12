<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- <meta name="description" content=""/> -->
        <!-- <meta name="author" content="" /> -->
        
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
                            <?php
                            if(!isset($_SESSION['email'])){ /* 세션 x 의 경우 */ ?>
                            <button class="btn btn-outline-dark mx-1" button type ="button" id="loginbtn" onclick="location.href='log_in.html' ">로그인</button>
                            <button class="btn btn-outline-dark" button type="button" onclick="location.href='register.html' ">회원가입</button>
                            <?php } else{
                                $email = $_SESSION['email']; /* 가 아닌 세션 o 의 경우 */
                            // $user_name = $_SESSION['user_name'];
                            // echo "<p><strong>$email</strong>님, 안녕하세요? 로그인 된 상태에요.</p>";
                            // echo "<p><strong>$user_name</strong>님, 안녕하세요? 로그인 된 상태에요.</p>";
                            // echo "<a href=\"logout.php\">[로그아웃]</a></p>";
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

        <!-- Masthead-->
        <?php
        if(!isset($_SESSION['email'])){ /* 세션 x 의 경우 */ ?>

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
        <!-- Section -->
        <!-- <header class="text-black text-center"> -->
        <div class="min-wrap">
            <div class="min-image">
                <img src="assets/gc_bg.jpg" style="width: 100%; " />
                <!--object-fit:cover; overflow: cover;-->
            </div>
            <div class="min-text">
            <h1>다양한 소식을 친구들과 공유하세요!</h1>
            <h2>관심있는 분야의 태그도 팔로우 할 수 있습니다.</h2>
            </div>
        </div>

        <?php }else{
            $email = $_SESSION['email']; /* 가 아닌 세션 o 의 경우 */ ?>
            <!-- Personal Section -->
            <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-80">
                            <!-- Time badge-->
                            <div class="badge rounded-pill bg-danger text-white position-absolute" style="top: 0.5rem; left: 0.5rem">25min</div>
                            <!-- Post image-->
                            <img class="card-img-top" src="https://img.insight.co.kr/static/2021/12/19/1200/img_20211219074348_3179gowq.jpg" alt="..." />
                            <!-- Post details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- 소식 작성자-->
                                    <h4 class="fw-bolder">진구쨩</h4>
                                    <h6 class="fw-normal"> @jin9ice</h6>
                                    <!-- 소식 내용-->
                                    날씨가 춥다. 그러나 얼어 죽어도 아이스 아메리카노다. 아아 없이는 살 수 없는 몸이 되어버렸어...
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
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Time badge-->
                            <div class="badge rounded-pill bg-warning text-black position-absolute" style="top: 0.5rem; left: 0.5rem">19 Feb</div>
                            <!-- Post image-->
                            <img class="card-img-top" src="https://i.pinimg.com/originals/d3/29/33/d3293384656aa87733a662f231b5dfdf.jpg" alt="..." />
                            <!-- Post details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- 소식 작성자-->
                                    <h4 class="fw-bolder">지친직장러</h4>
                                    <h6 class="fw-normal"> @wannagohome123</h6>
                                    <!-- 소식 내용-->
                                    늦은 저녁 퇴근길... 인스타 감성으로 올려본다... 내일 또 출근이다... 퇴사 마렵다...
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">더 보기</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Title~asd</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                                    $120.00 - $280.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Example Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php }; ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
  </html>