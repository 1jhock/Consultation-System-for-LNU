<?php 

Class Crud extends CI_Model {

	function add($table, $data) {
		return $this->db->insert($table, $data);
	}

	function update($table, $where, $data) {
		$this->db->where($where);
		 return $this->db->update($table, $data);
	}

	function delete($table, $table_id, $id) {
		$this->db->where($table_id, $id);
		return $this->db->delete($table);
	}

	function get_single($table, $where) {
		$this->db->select()->from($table)->where($where);
		$single = $this->db->get();
		return $single->first_row();
	} 


	function get_recent($table, $order) {
		$this->db->select()->from($table)->order_by('date_created',$order);
		$single = $this->db->get();
		return $single->first_row();
	}	

	function get_all($table) {
		$this->db->select()->from($table);
		$this->db->order_by('date_created', 'asc');
		$result = $this->db->get();
		return $result->result();
	}

	function get_specified($table, $where) {
		$this->db->select()->from($table);
		$this->db->where($where);
		$this->db->order_by('date_created', 'asc');
		$result = $this->db->get();
		return $result->result();
	}

	function get_distinct($table, $where) {
		$this->db->select()->from($table);
		$this->db->where($where);
		$this->db->order_by('date_created', 'asc');
		$this->db->distinct();
		$result = $this->db->get();
		return $result->result();
	}



	//return total number
	function get_total($table) {
		$this->db->select()->from($table);
		return $this->db->get()->num_rows();
	}

	function get_total_where($table, $where) {
		$this->db->select()->from($table);
		$this->db->where($where);
		return $this->db->get()->num_rows();
	}




	// function get_private_msgs($from, $to) {
	// 	$this->db->query("SELECT * FROM msg uhm1 WHERE uhm1.msg_id=(
 //       SELECT msg_id FROM msg uhm2 
 //       WHERE (uhm1.to_id=uhm2.to_id AND uhm1.from_id=uhm2.from_id) 
 //       OR uhm1.to_id=uhm2.from_id ORDER BY msg_id DESC)

	// 	SELECT * from msg 
 //       ");
	// 	$msg = $this->db->get();
	// 	return $msg->result();
	// }

	// function load_emoji($input_carrier) {

 // 		$image_array = get_clickable_smileys(asset_url() . 'smileys/', $input_carrier); //input_carrier is hte inpnut where emojis are used.
 //        $col_array = $this->table->make_columns($image_array, 8);

 //        return  $this->table->generate($col_array);
	// }
}

?>