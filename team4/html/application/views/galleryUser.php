<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/~team4/my/image/Indukfavicon.png" type="image/png">
        <title>Induk Royal</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/~team4/my/css/bootstrap.css">
        <link rel="stylesheet" href="/~team4/my/vendors/linericon/style.css">
        <link rel="stylesheet" href="/~team4/my/css/font-awesome.min.css">
        <link rel="stylesheet" href="/~team4/my/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/~team4/my/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="/~team4/my/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/~team4/my/vendors/lightbox/simpleLightbox.css">
        <!-- main css -->
        <link rel="stylesheet" href="/~team4/my/css/style.css">
        <link rel="stylesheet" href="/~team4/my/css/responsive.css">

		<link rel="stylesheet" href="/~team4/my/css/my.css">
    </head>
    <body>
        <!--================Header Area =================-->
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
                                    <li class="nav-item active"><a class="nav-link" href="/~team4/gallery/user">갤러리</a></li>
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
        <!--================Header Area =================-->
<script>
    function find_gallery(text1)
	{
		if (!text1)					// 값이 없는 경우, 전체 자료
			form1.action="/~team4/gallery/user";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~team4/gallery/user/text1/" + text1;
		form1.submit();
	}
</script>
       <!--================Banner Area =================-->
        <section class="banner_area blog_banner d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
				<h3>자연과 같은 편안한 분위기</h3>
						<h2>Induk Royal</h2><br/>
						<h5>자연과 하나가 된 Induk Royal의 구석구석을 한눈에 볼 수 있는 페이지</h5>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================Breadcrumb Area =================-->
        <section class="gallery_area section_gap">
            <div class="container-fluid">
					<div class="section_title text-center">
						<h2 class="title_color">호텔 갤러리</h2>
						<p>친환경 시스템이 마음 속에 깃들여 있는 우리 호텔 갤러리입니다.</p>
						<!--================ Categorie Area =================-->
						<form name="form1" action="" method="post">
<?
	// 카테고리 목록
	foreach ($category as $row)
	{
		$caID[] = $row->ID;
		$caName[] = $row->name;
		$caPic[] = $row->pic;
		$caTmi[] = $row->tmi;
	}	
?>
	<!-- 화면 carousel3-->
			<div id="carouselGallery3" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000" >
				<div class="carousel-inner">
<?
	if($row_count == 0) {
		echo("<div class='carousel-item active'>
				<div style='float:center;'>
					<div class='accomodation_item text-center'>
						<h5> 카테고리가 없습니다. </h5>
					</div>
				</div>
			</div>
		");
	}
	else {							
		$row_mod = $limit;
		for($i=0; $i < ($row_count/$limit); $i++) {
			
			if( $i+1 > ($row_count/$limit)) {
				$row_mod = $row_count % $limit;
			}
?>
					<div class="carousel-item <? if($i == 0) {echo("active");} ?>" style=" text-align: center;">
						<div class="container">
						<div class="row" display:flex="disabled">
<?
			for($j = $i*$limit; $j < ($i*$limit) + $row_mod; $j++) {
?>
					<div class="col-lg">
							<div class="<? if($j == $i*$limit) echo("gallery-item-first"); else echo("gallery-item");?>">
								
										<div class="categories_post">
											<a href="javascript:find_gallery('<?=$caID[$j]; ?>');">
											<img src="/~team4/category_img/<?=$caPic[$j]; ?>" alt="post">
											<div class="categories_details">
												<div class="categories_text">
														<h5><?=$caName[$j]; ?></h5>
													<div class="border_line"></div>
													<p><?=$caTmi[$j]; ?></p>
												</div>
											</div>
											</a>
										</div>
									</div>

								</div>
					
<?
			}
?>
	</div>
						</div>
					</div>
<?
		}
	}
?>
				  </div>

<?
	if($row_count > 0) {
?>
				  <a class="carousel-control-prev" href="#carouselGallery3" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselGallery3" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
<?
	}
?>
				</div>
	<!-- 화면 carousel3-->

	<!-- 화면 carousel2-->
			<div id="carouselGallery2" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000" >
				<div class="carousel-inner">
<?
	if($row_count == 0) {
		echo("<div class='carousel-item active'>
				<div style='float:center;'>
					<div class='accomodation_item text-center'>
						<h5> 카테고리가 없습니다. </h5>
					</div>
				</div>
			</div>
		");
	}
	else {			
		$limit = 2;
		$row_mod = $limit;
		for($i=0; $i < ($row_count/$limit); $i++) {
			
			if( $i+1 > ($row_count/$limit)) {
				$row_mod = $row_count % $limit;
			}
?>
					<div class="carousel-item <? if($i == 0) {echo("active");} ?>" style=" text-align: center;">
						<div class="container">
						<div class="row" style="justify-content:flex-center;">
						<div class="col-lg-2"></div>
<?
			for($j = $i*$limit; $j < ($i*$limit) + $row_mod; $j++) {
?>
					<div class="col-lg">
							<div class="<? if($j == $i*$limit) echo("gallery-item-first"); else echo("gallery-item");?>">

										<div class="categories_post">
											<a href="javascript:find_gallery('<?=$caID[$j]; ?>');">
											<img src="/~team4/category_img/<?=$caPic[$j]; ?>" alt="post">
											<div class="categories_details">
												<div class="categories_text">
														<h5><?=$caName[$j]; ?></h5>
													<div class="border_line"></div>
													<p><?=$caTmi[$j]; ?></p>
												</div>
											</div>
											</a>
										</div>
									</div>
								</div>
<?
			}
?>
	<div class="col-lg-2"></div>
	</div>
						</div>
					</div>
<?
		}
	}
?>
				  </div>

<?
	if($row_count > 0) {
?>
				  <a class="carousel-control-prev" href="#carouselGallery2" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselGallery2" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
<?
	}
?>
				</div>
	<!-- 화면 carousel2-->


	<!-- 화면 carousel1-->
			<div id="carouselGallery1" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000" >
				<div class="carousel-inner">
<?
	if($row_count == 0) {
		echo("<div class='carousel-item active'>
				<div style='float:center;'>
					<div class='accomodation_item text-center'>
						<h5> 카테고리가 없습니다. </h5>
					</div>
				</div>
			</div>
		");
	}
	else {			
		$limit = 1;
		$row_mod = $limit;
		for($i=0; $i < ($row_count/$limit); $i++) {
			
			if( $i+1 > ($row_count/$limit)) {
				$row_mod = $row_count % $limit;
			}
?>
					<div class="carousel-item <? if($i == 0) {echo("active");} ?>" style=" text-align: center;">
						<div class="container">
						<div class="row" style="justify-content:flex-center;">
						<div class="col-lg-2"></div>
<?
			for($j = $i*$limit; $j < ($i*$limit) + $row_mod; $j++) {
?>
					<div class="col-lg">
							<div class="<? if($j == $i*$limit) echo("gallery-item-first"); else echo("gallery-item");?>">
								
								

									
										<div class="categories_post">
											<a href="javascript:find_gallery('<?=$caID[$j]; ?>');">
											<img src="/~team4/category_img/<?=$caPic[$j]; ?>" alt="post">
											<div class="categories_details">
												<div class="categories_text">
														<h5><?=$caName[$j]; ?></h5>
													<div class="border_line"></div>
													<p><?=$caTmi[$j]; ?></p>
												</div>
											</div>
											</a>
										</div>
									</div>

								</div>
							
						
<?
			}
?>
	<div class="col-lg-2"></div>
	</div>
						</div>
					</div>
<?
		}
	}
?>
				  </div>

<?
	if($row_count > 0) {
?>
				  <a class="carousel-control-prev" href="#carouselGallery1" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselGallery1" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
<?
	}
?>
				</div>
	<!-- 화면 carousel1-->
						</form>
					<!--================ Categorie Area =================-->
                </div>

                <div class="row imageGallery1" id="gallery">
<?
	 foreach ($list as $row1)
	 {
?>
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="/~team4/gallery_img/<?=$row1->pic; ?>" alt="">
                            <div class="hover">
                            	<a class="light" href="/~team4/gallery_img/<?=$row1->pic; ?>"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
<?
    }
?>               
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================ start footer Area  =================-->	
        <footer class="footer-area section_gap">
            <div class="container">
    
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#" style="font-size:15px;">201712046 한정수</a>
						<a href="#" style="font-size:15px;">201812044 임호성</a>
						<a href="#" style="font-size:15px;">2016120691 전영준</a>
						<a href="#" style="font-size:15px;">201718048 유재우</a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/~team4/my/js/jquery-3.2.1.min.js"></script>
        <script src="/~team4/my/js/popper.js"></script>
        <script src="/~team4/my/js/bootstrap.min.js"></script>
        <script src="/~team4/my/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/~team4/my/js/jquery.ajaxchimp.min.js"></script>
        <script src="/~team4/my/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="/~team4/my/vendors/nice-select/js/jquery.nice-select.js"></script>
        <script src="/~team4/my/js/mail-script.js"></script>
        <script src="/~team4/my/js/stellar.js"></script>
        <script src="/~team4/my/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="/~team4/my/vendors/isotope/isotope-min.js"></script>
        <script src="/~team4/my/js/stellar.js"></script>
        <script src="/~team4/my/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="/~team4/my/js/custom.js"></script>
    </body>
</html>