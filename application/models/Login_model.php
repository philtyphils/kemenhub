<?php
	class Login_Model extends CI_Model {
		public function __construct(){
			$this->load->database();	
		}
		public function Set_ANSI_NULLS(){
			$this->db->query('SET ANSI_NULLS ON');
			$this->db->query('SET ANSI_WARNINGS ON');
		}

		public function ubahUser($username,$pass){	
			$arrayx=array();
			$hash = password_hash(trim($pass), PASSWORD_DEFAULT);
			$query = $this->db->get_where('tbluser',array('userid' => $username));
			if($query->num_rows()>0)
			{
				$sqlx="update tbluser set PASSWORD =? where  userid=?";
				$sql1x = $this->db->query($sqlx,array($hash,$username));
				if($sql1x===FALSE){
					$arrayx[0]['status']="GAGAL";
						
				}else{
					$arrayx[0]['status']="OK";	
				}
				
			}

		 	
			return $arrayx;
		}
		
		// public function cekUser($user,$pass)
		// {
		// 	$sql="select * from tbluser a where a.userid=? ";
		// 	$sql1 = $this->db->query($sql,array($user));
		// 	if($sql1->num_rows()>0){
		// 		foreach ($sql1->result_array() as $row){
		// 			$hash = trim($row['PASSWORD']);

		// 			if (password_verify($pass, $hash)) {
		// 				$this->session->set_userdata(array("validUser" => trim($row['USERID']),"validPass" => trim($row['PASSWORD']),"validLevel" => trim($row['USERLVL']),"validNama" => trim($row['USERNM']),"validSession" => session_id(),"validRole" => $this->getDataRole(trim($row['USERID'])),"isLoggedIn" => true));
		// 			    return true;
		// 			} else {
		// 			    return false;
		// 			}
		// 		}
		// 	}else{
		// 		return false;	
		// 	}
		// }

		public function cekUser($user,$pass){
			//$query = $this->db->get_where('tbluser',array('USERID' => $user));
			$query = $this->db->query("SELECT * FROM tbluser where userid='".$user."'' ");
			if($query->num_rows()>0){
				// $row = $query->row();
				// $hash = $row->PASSWORD;
				// if(password_verify($pass, $hash)) 
				// {
				    return true;
				// }else
				// {
				//     return false;
				// }
			}else{
				return false;	
			}
		}

		// public function getDataRole($userid){
			

		// 	$arrayHasil = array();
		// 	$USER_ID = $userid;

		// 	$sql="SELECT a.USERID,a.ID_MENU,b.NAMA_MENU,
		// 		CASE WHEN a.READ=1 
		// 		THEN
		// 		'true'
		// 		ELSE
		// 		'false'
		// 		end as READX,
		// 		CASE WHEN a.WRITE=1 
		// 		THEN
		// 		'true'
		// 		ELSE
		// 		'false'
		// 		end as WRITEX,
		// 		CASE WHEN a.DELETE=1 
		// 		THEN
		// 		'true'
		// 		ELSE
		// 		'false'
		// 		end as DELETEX,
		// 		CASE WHEN a.ADD=1 
		// 		THEN
		// 		'true'
		// 		ELSE
		// 		'false'
		// 		end as ADDX,b.URUT_MENU FROM tblrole  a LEFT JOIN tblmenu as b ON a.ID_MENU=b.ID_MENU WHERE a.USERID = ? ORDER BY b.URUT_MENU";
		// 	$sql1 = $this->db->query($sql,array($USER_ID));
		// 	$i=0;
		// 	if($sql1->num_rows()>0){
		// 		foreach ($sql1->result_array() as $row){
		// 			$arrayHasil[$i]["id_user"] = trim($row['USERID']);
		// 			$arrayHasil[$i]["id_menu"] = trim($row['ID_MENU']);
		// 			$arrayHasil[$i]["nama_menu"] = trim($row['NAMA_MENU']);
		// 			$arrayHasil[$i]["read"] = trim($row['READX']);
		// 			$arrayHasil[$i]["write"] = trim($row['WRITEX']);
		// 			$arrayHasil[$i]["deletex"] = trim($row['DELETEX']);
		// 			$arrayHasil[$i]["add"] = trim($row['ADDX']);
		// 			$arrayHasil[$i]["urut"] = trim($row['URUT_MENU']);
		// 			$i++;
		// 		}
		// 	}
		// 	return $arrayHasil;
		// }
		
	}
?>