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


	/*============ Specifics ============*/
	// works on deprtmant(professor) && course(student)
	function get_course($course_id) {	
		$this->db->select()->from('courses')->where('course_id', $course_id);
		$course = $this->db->get();
		return $course->row('full_name');
	}

	function get_dept($dept_id) {
		
		$this->db->select()->from('department')->where('dept_id', $dept_id);
		$dept = $this->db->get();
		return $dept->row('full_name');
	}

	function search_result($keyword) {
		$this->db->select('name, course, img, stud_id')->from('students');
		$this->db->like('name', $keyword);
		$results = $this->db->get();
		return $results->result();
	}

	function get_unread_msgs($prof_id) {
		$this->db->select('conversation_id, group_concat(msg) as msgs')->from('msg')->where("(to_id = '$prof_id') AND status = 0 ");
		$this->db->group_by('conversation_id');
		$results = $this->db->get();
		return $results->result();
	}

	function get_sender_id($conversation_id) {
		$this->db->select()->from('msg')->where('conversation_id', $conversation_id);
		$result = $this->db->get();

		// get the sender's ID
		$stud_id = $result->row('from_id');
		return $stud_id;
		
	}

	function get_sender($stud_id) {
		$this->db->select()->from('students')->where('stud_id', $stud_id);
		$student = $this->db->get();
		return $student->row('name');
	}

	function get_total_unread_frm_stud($prof_id, $stud_id) {
		$unread = $this->crud->get_total_where('msg', ['to_id' => $prof_id, 'from_id' => $stud_id, 'status' => 0]);

		return ($unread > 0) ? '&nbsp;&nbsp;<span class="badge" style="background-color: #e74c3c;">'.$unread .'</span>': '';
	}


	function get_total_stud_per_dept($dept_id) {
		$this->db->select('department.full_name, count(students.stud_id) as count_stud')->from('students');
		$this->db->join('courses','courses.course_id = students.course');
		$this->db->join('department','courses.dept_id = department.dept_id');
		$this->db->group_by('department.full_name');
		$this->db->where('department.dept_id', $dept_id);
		$results = $this->db->get();
		return $results->row('count_stud');
	}

	// select courses and the number of students under the course
	function get_course_data($dept_id) {
		$this->db->select('courses.course_id, courses.full_name, count(students.stud_id) as num_stud')->from('courses');
		$this->db->join('students','courses.course_id = students.course');
		$this->db->group_by('courses.full_name');
		$this->db->group_by('courses.course_id');
		$this->db->where('courses.dept_id',$dept_id);
		$results = $this->db->get();
		return $results->result();
	}



}

?>