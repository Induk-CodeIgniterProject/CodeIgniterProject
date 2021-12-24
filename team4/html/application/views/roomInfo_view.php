        <!--================Banner Area =================-->
        <section class="banner_area blog_banner d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h3>편안하고 화목한 분위기로 초대합니다.</h3>
					<h2>Induk Royal</h2>
                    <h5>방마다 수용인원과 크기가 다름에 유의하세요!</h5>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
                <div class="row">
					<!-- 왼쪽 바 -->
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <article class="row blog_item">
                                <div class="col-md-5">
                                    <div class="blog_info text-center">
                                        <ul class="blog_meta list_style">
                                            <li><span class="lnr lnr-tag" style="font-size:20px; line-height: 2;"></span><h3>이름 : <?=$row->name; ?></h3></li>
                                            <li><span class="lnr lnr-user" style="font-size:20px; line-height: 2;"></span><h3>수용 가능 인원 : <?=$row->people; ?></h3></li>
											<li><span class="lnr lnr-bubble" style="font-size:20px; line-height: 2;"></span><h3><?=$row->tmi; ?></h3></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="blog_post">
                                        <img src="/~team4/room_img/<?=$row->pic; ?>" style="width:-webkit-fill-available;" alt="">
                                        <div class="blog_details" style="text-align:center;">
											<a href="/~team4/roomInfo" class="view_btn button_hover" style="border:outset;" onClick="history.back();"><i class="lnr lnr-enter">&nbsp;&nbsp;이전 화면으로</i></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

					<!-- 오른쪽 바 -->
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">다른 방도 살펴보세요!</h3>
<?
	foreach($list as $row1)
	{
?>
                                <div class="media post_item">
                                    <img src="/~team4/room_img/<?=$row1->pic; ?>" style="width:100px; height:60px;" alt="post">
                                    <div class="media-body">
                                        <a href="/~team4/roomInfo/view/ID/<?=$row1->ID;?>"><h3><?=$row1->name; ?></h3></a>
                                        <p><?=number_format($row1->price); ?>원</p>
                                    </div>
                                </div>
<?
	}
?>								
                                <div class="br"></div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->