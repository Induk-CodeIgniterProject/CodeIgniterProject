<?
    class Booking extends CI_Controller {       // booking클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("booking_m");    // 모델 booking_m 연결
			$this->load->helper(array("url","date")); // 헬퍼등록
			$this->load->library("pagination");
			date_default_timezone_set("Asia/Seoul");         // 지역설정
			$today=date("Y-m-d"); 
        }
        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                        // list 함수 호출
        }

        public function lists()
        {
			if(!$this->session->userdata('uid'))redirect("/~team4/login/loginForm/error/booking");
			else{
				$uri_array=$this->uri->uri_to_assoc(3);
				$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("+1 day")) ;
				$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d",strtotime("+3 day")) ;
				$text3 = array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "0";
				$text4 = array_key_exists("text4",$uri_array) ? urldecode($uri_array["text4"]) : "0";

				$base_url = "/booking/lists/text1/$text1/text2/$text2/text3/$text3/text4/$text4/page";    // $page_segment = 6;
				$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

				$base_url = "/~team4" . $base_url;


				$config["per_page"]	 = 3;                              // 페이지당 표시할 line 수
				$config["total_rows"] = $this->booking_m->rowcount($text1, $text2, $text3, $text4);  // 전체 레코드개수 구하기
				$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
				$config["base_url"]	 = $base_url;                // 기본 URL
				$this->pagination->initialize($config);           // pagination 설정 적용

				$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
				$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

				$start=$data["page"];                 // n페이지 : 시작위치
				$limit=$config["per_page"];        // 페이지 당 라인수

				$data["text1"]=$text1;
				$data["text2"]=$text2;
				$data["text3"]=$text3;
				$data["text4"]=$text4;
				$present = "booking";

				$data["row_count"]= $this->booking_m->rowcount($text1, $text2, $text3, $text4);  // 전체 레코드개수 구하기
				$data["limit"] = $limit;
				$data["list"] = $this->booking_m->getlist($text1, $text2, $text3, $text4);   // 해당페이지 자료읽기
				$data["list_room"] = $this->booking_m->getlist_room();

				$this->load->library("form_validation");
				$this->form_validation->set_rules("roomId","방이름","required");

				if ($this->form_validation->run()==FALSE)
				{ 
					$this->load->view("main_header", $present);                    // 상단출력(메뉴)
					$this->load->view("booking_list",$data);           // booking_list에 자료전달
					$this->load->view("main_footer");                      // 하단 출력
				}
				else              // 입력화면의 저장버튼 클릭한 경우
				{				
					$data=array(
						"roomId" => $this->input->post("roomId",TRUE),
						"memberId" => $this->input->post("memberId",TRUE),
						"start" => $this->input->post("start",TRUE),
						"end" => $this->input->post("end",TRUE),
						"count" => $this->input->post("count",TRUE),
						"prices" => $this->input->post("prices",TRUE)
					);

					$this->booking_m->insertrow($data); 

					redirect("/~team4/mypage");    //   목록화면으로 이동.
				}
			}
        }
    }
?>
