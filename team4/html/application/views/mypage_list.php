<?
	$phone1 = trim(substr($info->phone,0,3));
	$phone2 = trim(substr($info->phone,3,4));
	$phone3 = trim(substr($info->phone,7,4));
?>
<script>
$(document).on('click', '#memberdel', function(){
				if($(this).data('uid') == "admin"){
					$('.modal-body').text('관리자 계정은 탈퇴할 수 없습니다.');
				}
				else{
					$('.modal-body').text($(this).data('name') +'님 탈퇴 하시겠습니까?');
				}
				
				$('#memberId').val($(this).data('id'));
				$('#memberuid').val($(this).data('uid'));
			});
$(document).on('click', '.modal_cansel', function(){
				$('.modal-body').text($(this).data('roomname')+'을 취소 하시겠습니까?');
				$('#roomId').val($(this).data('id'));
			});
$(document).on('click', '#edit', function(){
				$('#pwd').removeAttr('readonly');
				$('#pwd').removeAttr('style');
				$('#name').removeAttr('readonly');
				$('#name').removeAttr('style');
				$('#phone1').removeAttr('readonly');
				$('#phone1').removeAttr('style');
				$('#phone2').removeAttr('readonly');
				$('#phone2').removeAttr('style');
				$('#phone3').removeAttr('readonly');
				$('#phone3').removeAttr('style');
				$('#email').removeAttr('readonly');
				$('#email').removeAttr('style');
				$('#pwd').focus();

				$(this).parent().attr('style','display:none');
				$(this).parent().next().attr('style','display:block');
			});
$(document).on('click', '#cansel', function(){
				$('#pwd').attr('readonly', 'true');
				$('#pwd').css('background-color','lightgray');
				$('#name').attr('readonly', 'true');
				$('#name').css('background-color','lightgray');
				$('#phone1').attr('readonly', 'true');
				$('#phone1').css('background-color','lightgray');
				$('#phone2').attr('readonly', 'true');
				$('#phone2').css('background-color','lightgray');
				$('#phone3').attr('readonly', 'true');
				$('#phone3').css('background-color','lightgray');
				$('#email').attr('readonly', 'true');
				$('#email').css('background-color','lightgray');

				$('#pwd').val('<?=$info->pwd?>');
				$('#name').val('<?=$info->name?>');
				$('#phone1').val('<?=$phone1?>');
				$('#phone2').val('<?=$phone2?>');
				$('#phone3').val('<?=$phone3?>');
				$('#email').val('<?=$info->email?>');

				$(this).parent().attr('style','display:none');
				$(this).parent().prev().attr('style','display:block');
			});

			function memberdel(){
				if(form3.memberuid.value == "admin"){
					form3.submit();
				}
				else{
					form3.action="/~team4/mypage/memberdel/ID" + form3.memberId.value;
					form3.submit();
				}
			}
</script>

		<!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Induk Royal</h2>
                    <ol class="breadcrumb">
                        <li class="active">내정보</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<h3 class="mb-30 title_color">내 정보</h3>
								<form name="form1" method="post" action="/~team4/mypage/edit/ID/<?=$info->ID;?>">
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
										<input type="text" name="uid" id="uid" value="<?=$info->uid;?>" placeholder="아이디를 입력해주세요." required class="single-input" style="background-color:lightgray;" readonly >
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fas fa-key" aria-hidden="true"></i></div>
										<input type="password" name="pwd" id="pwd" value="<?=$info->pwd;?>" placeholder="비밀번호를 입력해주세요." required class="single-input" style="background-color:lightgray;" readonly>
									</div>
									
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fas fa-user-alt" aria-hidden="true"></i></div>
										<input type="text" name="name" id="name" value="<?=$info->name;?>" placeholder="닉네임을 입력해주세요." required class="single-input" style="background-color:lightgray;" readonly>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></div>
										<div class="row">
										<div class="col-lg-4 col-md-4">
										<input type="text" name="phone1" id="phone1" value="<?=$phone1;?>" maxlength='3' placeholder="전화번호를 입력해주세요." required class="single-input" style="background-color:lightgray;" readonly>
										</div>
										<div class="col-lg-4 col-md-4">
										<input type="text" name="phone2" id="phone2" value="<?=$phone2;?>" maxlength='4' placeholder="전화번호를 입력해주세요." required class="single-input" style="background-color:lightgray;" readonly>
										</div>
										<div class="col-lg-4 col-md-4">
										<input type="text" name="phone3" id="phone3" value="<?=$phone3;?>" maxlength='4' placeholder="전화번호를 입력해주세요." required class="single-input" style="background-color:lightgray;" readonly>
										</div>
										</div>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
										<input type="email" name="email" id="email" value="<?=$info->email;?>" placeholder="이메일을 입력해주세요." required class="single-input" style="background-color:lightgray;" readonly>
									</div>
									<div class="col-md-12 text-right">
										<div class="button-group-area" id="update_div">
											<a id="edit" class="genric-btn primary">수정하기</a>												
											<a id="memberdel" class="genric-btn primary" href="#memberdelModal" data-toggle='modal' data-id="<?=$info->ID;?>" data-uid="<?=$info->uid;?>" data-name="<?=$info->name;?>">탈퇴하기</a>
										</div>
										<div class="button-group-area" id="update_can_div" style="display:none;">
											<button type="submit" id="update" class="genric-btn primary">수정완료</button>
											<a id="cansel" class="genric-btn primary">수정취소</a>
										</div>											
									</div>
									<input type="hidden" name="rank" value="<?=$info->rank;?>">
								</form>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="comments-area">
								<h4>예약한 방</h4>
<?
foreach ($list as $row) {

?>
								<div class="comment-list">
									<div class="single-comment justify-content-between d-flex">
										<div class="user justify-content-between d-flex">
											<div class="thumb">
												<img src="/~team4/room_img/thumb/<?=$row->room_pic;?>" alt="" style="width:145px;height:150px;">
											</div>
											<div class="desc">
												<h5><?=$row->room_name;?></h5>
												<p class="date">체크인 : <?=$row->start;?> / 체크아웃 : <?=$row->end;?> </p>
												<p class="comment" >
													예약인원 : <?=$row->count;?>명
													<br>
													가격 : <?=number_format($row->prices);?>원
												</p>
											</div>
										</div>
										<div class="reply-btn">
											   <a href='#canselModal'  data-toggle='modal' data-roomname="<?=$row->room_name;?>" data-id="<?=$row->ID;?>" class="modal_cansel btn-reply text-uppercase">취소하기</a> 
										</div>
									</div>
								</div>	
<?
}
?>	                             
<?=$pagination; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="canselModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form name="form2" method="post" action="/~team4/mypage/del">
<input type="hidden" name="roomId" id="roomId" value="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">예약 취소</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        취소 하시겠습니까?
      </div>
      <div class="modal-footer">
			<button type="submit" class="btn btn-sm btn-secondary">확인</button>
	        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">닫기</button>     
      </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="memberdelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form name="form3" method="post" action="">
<input type="hidden" name="memberId" id="memberId" value="">
<input type="hidden" name="memberuid" id="memberuid" value="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">회원 탈퇴</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        탈퇴 하시겠습니까?
      </div>
      <div class="modal-footer">
			<a class="btn btn-sm btn-secondary" href="javascript:memberdel();">확인</a>
	        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">닫기</button>     
      </div>
    </div>
  </div>
</form>
</div>