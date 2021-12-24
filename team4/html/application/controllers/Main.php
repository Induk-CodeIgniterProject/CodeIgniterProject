<?
	// team 4 호텔
	class Main extends CI_Controller {               // 클래스이름 첫 글자는 대문자
		function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("main_m");    // 모델 booking_m 연결
			$this->load->helper(array("url","date")); // 헬퍼등록
			$this->load->library("pagination");
			date_default_timezone_set("Asia/Seoul");         // 지역설정
			$today=date("Y-m-d"); 
        }

		public function index()                      // 제일 먼저 실행되는 함수
		{
			$this->lists();
		}
		public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("+1 day")) ;
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d",strtotime("+3 day")) ;
			$text3 = array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "0";
			$text4 = array_key_exists("text4",$uri_array) ? urldecode($uri_array["text4"]) : "0";

			$base_url = "/booking/lists/text1/$text1/text2/$text2/text3/$text3/text4/$text4/page";    // $page_segment = 6;
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

			$base_url = "/~team4" . $base_url;

			$data["text1"]=$text1;
			$data["text2"]=$text2;
			$data["text3"]=$text3;
			$data["text4"]=$text4;

			$data["list_review"] = $this->main_m->getlist_review();	// 리뷰 랜덤 생성
			$data["list_room"] = $this->main_m->getlist_room();
			
			$present = "main";
			$this->load->view("main_header",$present);		// view폴더의 header.php 와
			$this->load->view("index", $data);
			$this->load->view("main_footer");		//  footer.php 호출
		}
	}
?>
