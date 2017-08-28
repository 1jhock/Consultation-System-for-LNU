<?php 

Class Auth extends CI_Model {

	function check_existing_user($type, $value, $table) {
		
		switch($type) {
			case 'username':
				$where = array(
					'username',$value
					);
			break;

			case 'password':
				$where = array(
					'password',$value
					);
			break;

			case 'email':
				$where = array(
					'email',$value
					);
			break;
		}

		$this->db->select()->from($table)->where($where);
		$query = $this->db->get();
		return $query->first_row();
	}

	


	function login($table, $username, $password) {
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);

		$this->db->select()->from($table)->where($where);
		$query = $this->db->get();
		return $query->first_row();
	}

}

?>