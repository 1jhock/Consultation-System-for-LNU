<?php 

Class Schedule extends CI_Model {

	function get_schedules($prof_id, $weekday) {
		$query = $this->db->query("SELECT DATE_FORMAT(from_time, '%h:%i %p') as f_from_time,  DATE_FORMAT(to_time, '%h:%i %p') as to_time, room, prof_id, weekday FROM schedule where prof_id = $prof_id AND weekday = $weekday ORDER BY from_time ASC");
		/*Problem: Sort time*/
		return $query->result();
	}

	function check_existing_schedule($from, $to) {
		$weekday = date('N');

		$query = $this->db->query("SELECT from_time, to_time from schedule where from_time BETWEEN '$from' AND '$to' OR to_time BETWEEN '$from' AND '$to' AND weekday = '$weekday' ");
		return $query->result();
	
	}


	function get_current_schedule($cur_time, $prof_id, $weekday) {
		$result = $this->db->query("SELECT room FROM schedule WHERE '$cur_time' BETWEEN from_time AND to_time AND prof_id='$prof_id' AND weekday='$weekday'");
		$cur_room = $result->row();
		return ( $result->num_rows() > 0 ) ? $cur_room->room  : 'VACANT';	
	}


	function get_total_class($prof_id, $weekday) {
		$class_today = $this->schedule->get_schedules($prof_id, $weekday);

		return count($class_today);
	}




}

?>