<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/~team4/my/image/Indukfavicon.png" type="image/png">
        <title>Induk Royal</title>
        <!-- Bootstrap CSS -->
        <script src="/~team4/my/js/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="/~team4/my/css/bootstrap.css">
        <link rel="stylesheet" href="/~team4/my/vendors/linericon/style.css">
        <link rel="stylesheet" href="/~team4/my/css/font-awesome.min.css">
        <link rel="stylesheet" href="/~team4/my/vendors/owl-carousel/owl.carousel.min.css">
<!--        <link rel="stylesheet" href="/~team4/my/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css"> -->
        
        <link rel="stylesheet" href="/~team4/my/vendors/nice-select/css/nice-select.css">
        <!-- main css -->
        <link rel="stylesheet" href="/~team4/my/css/style.css">
        <link rel="stylesheet" href="/~team4/my/css/responsive.css">

		<!-- datepicker -->
<!--  		<script src="/~team4/my/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script> -->
		<link href="/~team4/my/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	 	<script src="/~team4/my/admin/js/moment-with-locales.min.js"> </script>
		<script src="/~team4/my/admin/js/bootstrap-datetimepicker.js"></script>
		<link href="/~team4/my/admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<link href="/~team4/my/admin/css/fontawesome-all.min.css" rel="stylesheet">

		<!-- mycss(예약페이지) -->
		<link rel="stylesheet" href="/~team4/my/css/my.css">

    </head>
    <body style="background:aliceblue;">
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
					
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/~team4/main"><img src="/~team4/my/image/Logo.png" alt=""></a> 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="/~team4/main">메인</a></li>
                            <li class="nav-item"><a class="nav-link" href="/~team4/about">리조트 소개</a></li>
							<li class="nav-item"><a class="nav-link" href="/~team4/roomInfo">방 소개</a></li>
                            <li class="nav-item"><a class="nav-link" href="/~team4/booking">예약</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">소셜</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="/~team4/gallery/user">갤러리</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/~team4/reviewer">리뷰</a></li>
                                </ul>
                            </li>
<?
	if (!$this->session->userdata("uid")) {
		echo("<li class='nav-item'><a class='nav-link' href='/~team4/login'>로그인</a></li>
		<li class='nav-item'><a class='nav-link' href='/~team4/register'>회원가입</a></li>"); 
	}	
	else {
		echo("<li class='nav-item'><a class='nav-link' href='/~team4/mypage'>내 정보</a></li>
		<li class='nav-item'><a class='nav-link' href='/~team4/login/logout'>로그아웃</a></li>");
	}


	if ($this->session->userdata("rank")==1)
		echo("<li class='nav-item'><a class='nav-link' href='/~team4/admin'>Admin</a></li>");
?>
							<li class="nav-item"><a class="nav-link" href="/~team4/contact">직원 소개</a></li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>