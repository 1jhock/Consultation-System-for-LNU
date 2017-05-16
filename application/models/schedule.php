<?php 

Class schedule extends CI_Model {

	function get_schedules($prof_id, $weekday) {
		$query = $this->db->query("SELECT DATE_FORMAT(from_time, '%h:%i %p') as from_time,  DATE_FORMAT(to_time, '%h:%i %p') as to_time, room, prof_id, weekday FROM schedule where prof_id = $prof_id AND weekday = $weekday");
	
		return $query->result();
		
	}

	function check_existing_schedule($from, $to) {
		$this->db->select()->from('schedule');
		$this->db->where('from_time <=', $from);
		$this->db->where('to_time >=', $to);
		$this->db->where('weekday', date('N'));
		$query = $this->db->get();
		return $query->result();
	
	}


	function get_current_schedule($cur_time, $prof_id, $weekday) {
		$result = $this->db->query("SELECT room FROM schedule WHERE '$cur_time' BETWEEN from_time AND to_time AND prof_id='$prof_id' AND weekday='$weekday'");
		$cur_room = $result->row();
		return ( $result->num_rows() > 0 ) ? $cur_room->room  : 'VACANT';	
		
	}



}

?>