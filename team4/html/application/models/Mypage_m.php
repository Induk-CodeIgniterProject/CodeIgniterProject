<?
    class Mypage_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($uid, $start,$limit)
        {    	
			$sql="select book.*, member.uid as member_uid, room.name as room_name, room.pic as room_pic
			from (book left join member on book.memberId=member.ID) left join room on book.roomId=room.ID
			where member.uid = '$uid' order by ID asc limit $start,$limit";    // 전체 자료
            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($uid)
		{
			$sql="select book.*, member.uid as member_uid
			from book left join member on book.memberId=member.ID
			where member.uid = '$uid' order by ID asc";
			return $this->db->query($sql)->num_rows();
		}

		function getrow($ID)
		{
			$sql="select * from member where ID=$ID";
			return  $this->db->query($sql)->row();
		}

		function deleterow($ID)
		{
			$sql="delete from book where ID=$ID";
			return  $this->db->query($sql);
		}

		
		function updaterow($row, $ID)
		{
			$where=array("ID"=>$ID);
			return $this->db->update("member",$row,$where);
		}

		function getinfo($uid) 
		{
			$sql="select * from member where uid='$uid'";	// 조인 할 거 개많음
			return  $this->db->query($sql)->row();
		}

		function deletemember($ID)
		{
			$sql="delete from member where ID=$ID";
			return  $this->db->query($sql);
		}
		
    }
?>
