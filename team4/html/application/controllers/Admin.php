<?
	// team 4 호텔
	class Admin extends CI_Controller {               // 클래스이름 첫 글자는 대문자
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("admin_m");    
			$this->load->helper(array("url","date")); // 헬퍼등록
			date_default_timezone_set("Asia/Seoul");         // 지역설정
        }
        public function index()                            // 제일 먼저 실행되는 함수
        {
			if($this->session->userdata('uid') != 'admin'){
				redirect("/~team4/main");

			}
			else{
				$this->lists();                                 // list 함수 호출
			}
            
        }
        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("m") ;
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y") ;
			$today = date("Y");

			$data["rowcount"] = $this->admin_m->rowcount($today);
			$data["reviewcount"] = $this->admin_m->reviewcount($today);
			$data["text1"]=$text1;
			$data["text2"]=$text2;

			$data["list"] = $this->admin_m->getlist($text1);   // 해당페이지 자료읽기
			$data["list2"] = $this->admin_m->getlist2($text2);   // 해당페이지 자료읽기

            $this->load->view("admin_header");                    // 상단출력(메뉴)
            $this->load->view("admin_index", $data);           // admin_index에 자료전달
            $this->load->view("admin_footer");                      // 하단 출력 
        }
	}
?>
