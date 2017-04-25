<?php 

Class Crud extends CI_Model {

	function add($table, $data) {
		return $this->db->insert($table, $data);
	}

	function update($table, $table_id, $id, $data) {
		$this->db->where($table_id, $id);
		 return $this->db->update($table, $data);
	}

	function delete($table, $table_id, $id) {
		$this->db->where($table_id, $id);
		return $this->db->delete($table);
	}

	function get_single($table, $table_id, $id) {
		$this->db->select()->from($table)->where($table_id, $id);
		$single = $this->db->get();
		return $single->first_row();
	} 	

	function get_all($table) {
		$this->db->select()->from($table);
		$this->db->order_by('date_created', 'asc');
		$result = $this->db->get();
		return $result->result();
	}

	function get_specified($table, $order, $table_id, $id) {
		$this->db->select()->from($table)->where($table_id,$id);
		$this->db->order_by($order);
		$result = $this->db->get();
		return $result->result();
	}

	//return total number
	function get_number() {
		$this->db->select()->from($table);
		return $this->db->get()->num_rows();
	}

	// function load_emoji($input_carrier) {

 // 		$image_array = get_clickable_smileys(asset_url() . 'smileys/', $input_carrier); //input_carrier is hte inpnut where emojis are used.
 //        $col_array = $this->table->make_columns($image_array, 8);

 //        return  $this->table->generate($col_array);
	// }
}

?>