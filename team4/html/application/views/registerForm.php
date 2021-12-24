<br/>
<br/>
<br/>

    <link href="/~team4/my/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/~team4/my/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">저희 리조트로 초대합니다</h1>
                            </div>
                            <form class="user" name="form2" method="post" action="/~team4/register">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" name="uid" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="아이디를 입력하세요">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="password" name="pwd" class="form-control form-control-user" id="exampleInputPassword"
                                            placeholder="암호를 입력하세요">
                                    </div>
									<div class="col-sm-4">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="이름을 입력하세요">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="이메일 주소를 입력하세요">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
											<input type="text" name="phone1" id="phone1" 
											 class="form-control form-control-user" value=""  placeholder="전화번호 앞 3자리">
                                    </div>
									<div class="col-sm-4 mb-3 mb-sm-0">
											<input type="text" name="phone2" 
											 class="form-control form-control-user" size="4" maxlength="4" value="" placeholder="전화번호 중간 4자리">
                                    </div>
									<div class="col-sm-4 mb-3 mb-sm-0">
											<input type="text" name="phone3" 
											 class="form-control form-control-user" size="4" maxlength="4" value="" placeholder="전화번호 뒤 4자리">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
									회원가입
								</button>
                                <hr>
<!--                            <a href="/~team4/login" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> 구글로 로그인
                                </a>
                                <a href="/~team4/login" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> 페이스북으로 로그인
                                </a> -->
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/~team4/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/~team4/my/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/~team4/my/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/~team4/my/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/~team4/my/admin/js/sb-admin-2.min.js"></script>


</body>

</html>