<?
    class Mypage extends CI_Controller {       // mypage클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("mypage_m");				// 모델 mypage_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
			$this->load->library("pagination");			// pagination 선언
        }

        public function index()                            // 제일 먼저 실행되는 함수
		{
            $this->lists();                                        // list 함수 호출
        }

        public function lists()
        {
			if(!$this->session->userdata('uid'))redirect("/~team4/main");
			else{
				$uid  = $this->session->userdata('uid');
				$uri_array=$this->uri->uri_to_assoc(3);
				$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
				
				if ($text1=="") 
					$base_url = "/mypage/lists/page";				  //$page_segment = 4;
				else
					$base_url = "/mypage/lists/text1/$text1/page";    // $page_segment = 6;
				$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" ) + 1;
				$base_url = "/~team4" . $base_url;

				$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
				$config["total_rows"] = $this->mypage_m->rowcount($uid);  // 전체 레코드개수 구하기
				$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
				$config["base_url"]	 = $base_url;                // 기본 URL
				$this->pagination->initialize($config);           // pagination 설정 적용
				
				$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
				$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성
				
				$start=$data["page"];                 // n페이지 : 시작위치
				$limit=$config["per_page"];        // 페이지 당 라인수
				
//				$data["text1"]=$text1;                      // text1 값 전달을 위한 처리
				$data["list"]=$this->mypage_m->getlist($uid, $start,$limit);   // 해당페이지 자료읽기
				$data["info"]=$this->mypage_m->getinfo($uid);

				$this->load->view("main_header");                    // 상단출력(메뉴)
				$this->load->view("mypage_list",$data);           // mypage_list에 자료전달
				$this->load->view("main_footer");                      // 하단 출력 
			}
        }


		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID= $this->input->post("roomId",TRUE) ;		
			
			$this->mypage_m->deleterow($ID);

			redirect("/~team4/mypage/");             // 목록화면으로 돌아가기
		}

		public function memberdel()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID= $this->input->post("memberId",TRUE) ;		
			
			$this->mypage_m->deletemember($ID);

			redirect("/~team4/main/");             // 목록화면으로 돌아가기
		}

		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID	= array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");	// 폼검증 라이브러리 로드

			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
			$this->form_validation->set_rules("pwd","암호","required|max_length[20]");
			
 
				$phone1 = $this->input->post("phone1",true);
				$phone2 = $this->input->post("phone2",true);
				$phone3 = $this->input->post("phone3",true);
				$phone = sprintf("%-3s%-4s%-4s",$phone1,$phone2,$phone3);
				
				$data=array(
					"uid" => $this->input->post("uid",TRUE),
					"pwd" => $this->input->post("pwd",TRUE),
					"name" => $this->input->post("name",TRUE),
					"phone" => $phone,
					"email" => $this->input->post("email",TRUE),
					"rank" => $this->input->post("rank",TRUE)
				);

				$result = $this->mypage_m->updaterow($data,$ID);
				redirect("/~team4/mypage");

		}
	}
?>
