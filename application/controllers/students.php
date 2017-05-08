<?php
/*
	"_" prefix means not a page.
*/
Class Students extends CI_Controller {

	function index() {
		if($this->session->userdata('stud_id') == TRUE ) {
			redirect('students/home','refresh');
		}

		$this->load->view('templates/header.php');
		$this->load->view('login.php');
		$this->load->view('templates/footer.php');
	}


	/*AJAX REQUEST: Needed when session is not yet set*/ 
	 function login() {

		 	if($this->session->userdata('stud_id') == TRUE ) {
				redirect('students/home','refresh');
			}

			$existing = false; //SET boolean for check fo existense
			// CREDENTIALS
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
		
			// Check if the credentials are not empty
			if( !empty($username) || !empty($password) ) {
				// Check if existing account
				$user = $this->auth->login('students',trim($username),trim($password));

				// If existing
				if( $user ) {
					$existing = true; //Set existing to TRUE

					// Userdata
					$data = [
						'stud_id' => $user->stud_id,
						'name' => $user->name,
						'email' => $user->email,
						'course' => $user->course,
					];

					// Set session using useredata
					$this->session->set_userdata($data);

				}
			
			}

			echo json_encode(['user' => $existing]);

		}
	

	function logout() {
		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}


		// flush all session data
		$newdata = array('stud_id' => '');
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}


	function home() {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}


		// Get all the professors where department=student.course
		$data['professors'] = $this->crud->get_all('professors');
		


		// GET the recent msg where sender is the user
		$recent_msg = $this->crud->get_single('msg',['from_id'=> $this->session->userdata('stud_id')]);

		if($recent_msg) {
			// Determine the users
			// Needed to get necessary data to load in view
			$user1 = $recent_msg->from_id;
			$user2 = $recent_msg->to_id;

			// get info of the professor of the current message thread
			$data['cur_prof'] = $this->crud->get_single('professors',['prof_id' => $user2]);

			// Get the conversation_id
			$data['conversation_data'] = $this->crud->get_single('conversation',"(user_1 = $user1 AND user_2 = $user2) OR (user_1= $user2 AND user_2 = $user1)");
		} else {
			$data['conversation_data'] = '';
		}

		$this->load->view('templates/header');
		$this->load->view('student/index', $data);
		$this->load->view('templates/footer');

	}



	function student_signup() {

		if($this->session->userdata('stud_id') == TRUE ) {
			redirect('students/home','refresh');
		}

		$data['courses'] = $this->crud->get_all('courses');

		$this->load->view('templates/header');
		$this->load->view('student/signup', $data);
		$this->load->view('templates/footer');
	}


	/*AJAX REQUEST: Needed when session is not yet set*/
	function add_student() {
		
		if($this->session->userdata('stud_id') == TRUE ) {
			redirect('students/home','refresh');
		}

		

		$added = false; //Set added boolean 

		// Inputs
		$name = $this->input->post('name', true);
		$email = $this->input->post('email', true);
		$course = $this->input->post('course', true);
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		// Check if any field is not empty
		if(!empty($name) || !empty($email) || !empty($courses) || !empty($username) || !empty($password)) {
			// Data
			$data = [
				'name' => trim($name),
				'img' => 'default.png', //*default profile picture
				'email' => trim($email),
				'course' => trim($course),
				'username' => trim($username),
				'password' => trim(md5($password)) //I need to change this to *bcrypt
			];

			// Add to datbase
			$new_data = $this->crud->add('students', $data);

			// If added update the boolean
			if( $new_data ) {
				$added = true;
			}
		}

		echo json_encode(['added'=> $added]);

	}

	function walkthrough() {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}


		$this->load->view('templates/header');
		$this->load->view('student/walkthrough');
		$this->load->view('templates/footer');
	}

	/*=================================
			OPENING A CONVERSATION
	To handle the error of inserting a new conversation
	for the users that don't have conversation_id yet,
	load first the message($id) to check if both users have
	already a conversation_id then RETURN to another method
	current_message($id) to load all necessary data to the view.
	===================================*/
	function message($id) {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}

	
		/*USERS*/
		$user1 = $this->session->userdata('stud_id'); //the student
		$user2 = $id; //ID of teh professor

		// GET all the conversation/s where user_1 and user_2 (vice-versa) exist
		$conversation_id = $this->crud->get_single('conversation',"(user_1 = $user1 AND user_2 = $user2) OR (user_1= $user2 AND user_2 = $user1)");

		// IF there is existing conversation_id
		if( $conversation_id ) { 
			// SET it to another variable.
			$data['conversation_data'] = $conversation_id;

		// IF the conversation_id does not exist, create an ID for them.
		} else {
			$data = [
				'user_1' => $this->session->userdata('stud_id'),
				'user_2' => $id 
			];
			/*ADD new conversation*/
			$new_conversation = $this->crud->add('conversation', $data);
		}

		return $this->current_message($id);
		
	}

	function current_message($id) {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}


		// get the current professor where ID is $_GET['id']
		$data['cur_prof'] = $this->crud->get_single('professors',['prof_id'=> $id]);

		/*USERS*/
		$user1 = $this->session->userdata('stud_id'); //the student
		$user2 = $id; //ID of teh professor

		// GET all the conversation/s where user_1 and user_2 (vice-versa) exist
		$conversation_id = $this->crud->get_single('conversation',"(user_1 = $user1 AND user_2 = $user2) OR (user_1= $user2 AND user_2 = $user1)");
		
		$data['conversation_data'] = $conversation_id;

		$this->load->view('templates/header');
		$this->load->view('student/msg_box', $data);
		$this->load->view('templates/footer');
		
	}



	/*AJAX REQUEST: Needed when session is already set*/
	 function send_msg() {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}

		$response = false; //Set boolean of the response

		// inputs
		$msg = $this->input->post('msg', true);
		$to = $this->input->post('to_id', true); //hidden input based on the ID of the professor
		$conversation_id = $this->input->post('conversation_id', true); //hidden input of the conversation id

		// DATA
		$data = [
			'conversation_id' => $conversation_id,
			'msg' => trim($msg),
			'status' => '0',
			'from_id' => $this->session->userdata('stud_id'),
			'to_id' =>  $to
		];

		// add DATA to DB
		$new_data = $this->crud->add('msg', $data);

		if( $new_data ) { //if added successfully
			$response = true;
		} 

		echo json_encode(['sent', $response]);
	}
	

	/*AJAX REQUEST: Needed when session is already set*/
	function get_msg_thread($conversation_id) {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}
		header('Content-Type: application/json'); 
		// GET all the conversation where the conversation_id = $conversation_id
		// ::$conversation_id above is appended using JS from its AJAX Request
		$data['msgs'] =  $this->crud->get_specified('msg', ['conversation_id'=> $conversation_id]);

		$json = json_encode($data['msgs']);	
		/*GET THE CONV ID*/
		echo $json;

	}

	function account($id) {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}

		// Get the current account information
		$data['infos'] =  $this->crud->get_single('students',['stud_id' => $id]);

		// Ge Courses as dropdown
		$data['courses'] = $this->crud->get_all('courses');
		$this->load->view('templates/header');
		$this->load->view('student/account',$data);
		$this->load->view('templates/footer');
	}

	/*==============UPDATES of DATA===================*/

	/*AJAX REQUEST: Needed when session is already set*/
	function update_name() {
		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}
		

		$updated = false; //Set updated boolean

		// input
		$name = $this->input->post('name', true);

		// Check if the input is not emty
		if( !empty($name) ) {
			$data = [
				'name' => trim($name)
			];

			// Update the input
			$update_user = $this->crud->update('students',['stud_id' => $this->session->userdata('stud_id')], $data);

			if( $update_user ) { //if successfully updated
				$updated = true;
			}
		}

		echo json_encode(['updated' => $updated]);
	}

	/*AJAX REQUEST: Needed when session is already set*/
	function update_username() {
		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}
		

		$updated = false;

		$username = $this->input->post('username', true);

		if( !empty($username) ) {
			$data = [
				'username' =>trim($username)
			];

			$update_user = $this->crud->update('students',['stud_id' => $this->session->userdata('stud_id')], $data);

			if( $update_user ) {
				$updated = true;
			}
		}

		echo json_encode(['updated' => $updated]);
	}

	/*AJAX REQUEST: Needed when session is already set*/
	function update_email() {
		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}
		
		$updated = false;

		$email = $this->input->post('email', true);

		if( !empty($email) ) {
			$data = [
			'email' => trim($email)
			];

			$update_user = $this->crud->update('students',['stud_id' => $this->session->userdata('stud_id')], $data);

			if( $update_user ) {
				$updated = true;
			}
		}

		echo json_encode(['updated' => $updated]);
	}

	/*AJAX REQUEST: Needed when session is already set*/
	function update_course() {
		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}

		$updated = false;

		$course = $this->input->post('course', true);

		if( !empty($course) ) {
			$data = [
				'course' => trim($course)
			];

			$update_user = $this->crud->update('students',['stud_id' => $this->session->userdata('stud_id')], $data);

			if( $update_user ) {
				$updated = true;
			}
		}
 
		echo json_encode(['updated' => $updated]);
	}


	function update_profile_pic() {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}


			$config['upload_path']          = 'assets/uploads';
		    $config['allowed_types']        = 'gif|jpg|jpeg|png';
		    $config['max_size']             = 3072;
		    // $config['max_width']            = 2400;
		    // $config['max_height']           = 1800;	

		    $this->upload->initialize($config);
		    $this->load->library('upload', $config);

		    if (!$this->upload->do_upload('profile')) {

		        $data = ['error' => $this->upload->display_errors('','')];

		        redirect('/students/account/'. $this->session->userdata('stud_id') .'', 'refresh');
		     	
		    } else {	

	    		$upload_data = $this->upload->data(); 

				$file_name = $upload_data['file_name'];

	            $data = array(
	            	'img' => $file_name
	            	);
					
	            $new_profile = $this->crud->update('students', ['stud_id' => $this->session->userdata('stud_id')], $data);

	            // SUCCESS
	            $data['success'] = 'You have successfully updated you profile picture';
			}

			redirect('/students/account/'. $this->session->userdata('stud_id') .'', 'refresh');

	}


	/*AJAX REQUEST: Needed when session is already set*/
	function get_profile_picture() {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}


		header('Content-Type: application/json'); 
		$get['profile_picture'] = $this->crud->get_single('students', ['stud_id',$this->session->userdata('stud_id')]);

		$json = json_encode($get['profile_picture']);

		echo $json;
	}


	function list_professor() {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}
		// GET THE NUMBER OF PROFESSORS BY DEPT
		// courses available
		$courses = [
			'ITs' => ['BSIT' => 1],
			'CSs' => ['BSCS' => 2],
			'BSEDs' =>['BSED' => 4],
			'BEEDs' => ['BEED' => 3],
			'CEs' => ['BSCE' => 8],
			'BLISs' => ['BLIS' => 7]
		];
		// loop the assoc-arr
		foreach($courses as $course => $course_info) {
			foreach($course_info as $value => $id) {
				$data[$course] = $this->crud->get_total_where('professors',['department'=>$id]);
				$data['department'] = $this->crud->get_all('professors',['department' => $id]);
			}
		}

		// GET THE TOTAL NUMBER OF CONV/DEPT

		// GET THE ID OF EVERY DEPARTMENT
		

		$this->load->view('templates/header');
		$this->load->view('student/professor_list', $data);
		$this->load->view('templates/footer');
	}

	function professor_by_department($department_id) {
		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}

		$this->load->view('templates/header');
		$this->load->view('student/professor_by_department');
		$this->load->view('templates/footer');
	}

	function current_professor($prof_id) {

		if($this->session->userdata('stud_id') == FALSE ) {
			redirect('students','refresh');
		}

		$this->load->view('templates/header');
		$this->load->view('student/current_professor');
		$this->load->view('templates/footer');
	}

}


?>