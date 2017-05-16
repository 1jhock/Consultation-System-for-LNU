<?php
/*
	"_" prefix means not a page.
*/
Class Professors extends CI_Controller {

	function index() {
		if($this->session->userdata('prof_id') == TRUE ) {
				redirect('professors/home','refresh');
		}

		$this->load->view('templates/header.php');
		$this->load->view('login.php');
		$this->load->view('templates/footer.php');
	}


	/*AJAX REQUEST*/
	 function login() {

			$existing = false; //SET boolean for check fo existense
			// CREDENTIALS
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
		
			// Check if the credentials are not empty
			if( !empty($username) || !empty($password) ) {
				// Check if existing account
				$user = $this->auth->login('professors',trim($username),trim($password));

				// If existing
				if( $user ) {
					$existing = true; //Set existing to TRUE

					// Userdata
					$data = [
						'prof_id' => $user->prof_id,
						'name' => $user->name,
						'department' => $user->department,
						'email' => $user->email
					];

					// Set session using useredata
					$this->session->set_userdata($data);

				}
			
			}

			echo json_encode(['prof' => $existing]);

		}
	

	function logout() {
		if($this->session->userdata('prof_id') == FALSE ) {
				redirect('professors','refresh');
		}

		// flush all session data
		$newdata = array('stud_id' => '');
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}


	function home() {
		if($this->session->userdata('prof_id') == FALSE ) {
				redirect('professors','refresh');
		}

		// Get all the list of existing students
		$data['students'] = $this->crud->get_all('students');

		// GET the recent msg where sender is the user
		$recent_msg = $this->crud->get_single('msg',['from_id'=> $this->session->userdata('prof_id')]);

		if($recent_msg) {
			// Determine the users
			// Needed to get necessary data to load in view
			$user1 = $recent_msg->from_id;
			$user2 = $recent_msg->to_id;

			// get info of the student of the current message thread
			$data['cur_stud'] = $this->crud->get_single('students',['stud_id' => $user2]);

			// Get the conversation_id
			$data['conversation_data'] = $this->crud->get_single('conversation',"(user_1 = $user1 AND user_2 = $user2) OR (user_1= $user2 AND user_2 = $user1)");
		} else {
			$data['conversation_data'] = '';
		}
		

		$this->load->view('templates/header');
		$this->load->view('professor/index', $data);
		$this->load->view('templates/footer');
	}

	function professor_signup() {
		$data['courses'] = $this->crud->get_all('courses');

		$this->load->view('templates/header');
		$this->load->view('professor/signup', $data);
		$this->load->view('templates/footer');
	}


	/*AJAX REQUEST*/
	function add_professor() {
		$added = false; //Set added boolean 

		// Inputs
		$name = $this->input->post('name', true);
		$email = $this->input->post('email', true);
		$about = $this->input->post('about', true);
		$department = $this->input->post('department', true);
		$password = $this->input->post('password', true);
		$username = $this->input->post('username', true);
		// Check if any field is not empty
		if(!empty($name) && !empty($email) && !empty($department) && !empty($username) && !empty($password) && !empty($about)) {
			// Data
			$data = [
				'name' => trim($name),
				'img' => 'default.png', //*default profile picture
				'email' => trim($email),
				'department' => trim($department),
				'about' => trim($about),
				'username' => trim($username),
				'password' => trim(md5($password)) //I need to change this to *bcrypt
			];

			// Add to datbase
			$new_data = $this->crud->add('professors', $data);

			// If added update the boolean
			if( $new_data ) {
				$added = true;
			}
		}

		echo json_encode(['added'=> $added]);
	}

	function message($id) {

		
		/*USERS*/
		$user1 = $this->session->userdata('prof_id'); //the student
		$user2 = $id; //ID of teh professor

		// GET all the conversation/s where user_1 and user_2 (vice-versa) exist
		$conversation_id = $this->crud->get_single('conversation',"(user_1 = $user1 AND user_2 = $user2) OR (user_1= $user2 AND user_2 = $user1)");

		// IF there is existing conversation_id
		if( $conversation_id ) { 
			// SET it to another variable.
			$data['conversation_data'] = $conversation_id;

		// IF the conversation_is does not exist, create an ID for them.
		} else {
			$data = [
				'user_1' => $this->session->userdata('prof_id'),
				'user_2' => $id 
			];
			/*ADD new conversation*/
			$new_conversation = $this->crud->add('conversation', $data);
		}

		return $this->current_message($id);

		
	}

	function current_message($id) {

		if($this->session->userdata('prof_id') == FALSE ) {
		redirect('professors','refresh');
		}


		// get the current professor where ID is $_GET['id']
		$data['cur_stud'] = $this->crud->get_single('students',['stud_id' => $id]);

		/*USERS*/
		$user1 = $this->session->userdata('prof_id'); //the student
		$user2 = $id; //ID of teh professor

		// GET all the conversation/s where user_1 and user_2 (vice-versa) exist
		$conversation_id = $this->crud->get_single('conversation',"(user_1 = $user1 AND user_2 = $user2) OR (user_1= $user2 AND user_2 = $user1)");
		
		$data['conversation_data'] = $conversation_id;


		$this->load->view('templates/header');
		$this->load->view('professor/msg_box', $data);
		$this->load->view('templates/footer');
	}


	/*AJAX REQUEST*/
	 function send_msg() {
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
			'from_id' => $this->session->userdata('prof_id'),
			'to_id' =>  $to
		];

		// add DATA to DB
		$new_data = $this->crud->add('msg', $data);

		if( $new_data ) { //if added successfully
			$response = true;
		} 

		echo json_encode(['sent', $response]);
	}
	

	/*AJAX REQUEST*/
	function get_msg_thread($conversation_id) {

		header('Content-Type: application/json'); 
		// GET all the conversation where the conversation_id = $conversation_id
		// ::$conversation_id above is appended using JS from its AJAX Request
		$data['msgs'] =  $this->crud->get_specified('msg', ['conversation_id'=> $conversation_id]);

		$json = json_encode($data['msgs']);	
		/*GET THE CONV ID*/
		echo $json;

	}

	function account($id) {
		// Get the current account information
		$data['infos'] =  $this->crud->get_single('professors',['prof_id' => $id]);
		// Ge Courses as dropdown
		$data['courses'] = $this->crud->get_all('courses');
		
		$this->load->view('templates/header');
		$this->load->view('professor/account',$data);
		$this->load->view('templates/footer');
	}

	/*==============UPDATES of DATA===================*/

	/*AJAX REQUEST*/
	function update_name() {
		$updated = false; //Set updated boolean

		// input
		$name = $this->input->post('name', true);

		// Check if the input is not emty
		if( !empty($name) ) {
			$data = [
				'name' => trim($name)
			];

			// Update the input
			$update_user = $this->crud->update('professors',['prof_id' => $this->session->userdata('prof_id')], $data);

			if( $update_user ) { //if successfully updated
				$updated = true;
			}
		}

		echo json_encode(['updated' => $updated]);
	}

	/*AJAX REQUEST*/
	function update_username() {
		$updated = false;

		$username = $this->input->post('username', true);

		if( !empty($username) ) {
			$data = [
				'username' =>trim($username)
			];

			$update_user = $this->crud->update('professors',['prof_id' => $this->session->userdata('prof_id')], $data);

			if( $update_user ) {
				$updated = true;
			}
		}

		echo json_encode(['updated' => $updated]);
	}

	/*AJAX REQUEST*/
	function update_email() {
		$updated = false;

		$email = $this->input->post('email', true);

		if( !empty($email) ) {
			$data = [
			'email' => trim($email)
			];

			$update_user = $this->crud->update('professors',['prof_id' => $this->session->userdata('prof_id')], $data);

			if( $update_user ) {
				$updated = true;
			}
		}

		echo json_encode(['updated' => $updated]);
	}

	/*AJAX REQUEST*/
	function update_about() {
		$updated = false;

		$email = $this->input->post('about', true);

		if( !empty($email) ) {
			$data = [
			'about' => trim($email)
			];

			$update_user = $this->crud->update('professors',['prof_id' => $this->session->userdata('prof_id')], $data);

			if( $update_user ) {
				$updated = true;
			}
		}

		echo json_encode(['updated' => $updated]);
	}

	/*AJAX REQUEST*/
	function update_dept() {
		$updated = false;

		$course = $this->input->post('department', true);

		if( !empty($course) ) {
			$data = [
				'department' => trim($course)
			];

			$update_user = $this->crud->update('professors',['prof_id' => $this->session->userdata('prof_id')], $data);

			if( $update_user ) {
				$updated = true;
			}
		}
 
		echo json_encode(['updated' => $updated]);
	}


	function update_profile_pic() {

		if($this->session->userdata('prof_id') == FALSE ) {
			redirect('professors','refresh');
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

		        redirect('/professors/account/'. $this->session->userdata('prof_id') .'', 'refresh');
		     	
		    } else {	

	    		$upload_data = $this->upload->data(); 

				$file_name = $upload_data['file_name'];

	            $data = array(
	            	'img' => $file_name
	            	);
					
	            $new_profile = $this->crud->update('professors', ['prof_id' => $this->session->userdata('prof_id')], $data);

	            // SUCCESSs
	            $data['success'] = 'You have successfully updated you profile picture';
			}

			redirect('/professors/account/'. $this->session->userdata('prof_id') .'', 'refresh');

	}


	/*AJAX REQUEST*/
	function get_profile_picture() {

		header('Content-Type: application/json'); 

		$data['profile_picture'] = $this->crud->get_single('professors', ['prof_id' => $this->session->userdata('prof_id')]);

		$json = json_encode($data['profile_picture']);

		echo $json;
	}

	// function activity_date() {
		
	// 	$dates = $this->crud->get_all('msg');

	// 	foreach ($dates as $date) {
	// 		$dates_repo[] = date_create($date->date_created);
	// 	}

	// 	/*===================================
	
	// 	=====================================*/


	// 	foreach($dates_repo as $single) {
	// 		$times[] = date_format($single, 'g:i A');

	// 		foreach($times as $time) {
	// 			$splitted_time[] = explode(' ', $time);
				
	// 		}
	// 	}

	// 	foreach($splitted_time as $time) {
	// 		echo 'The time is: ' . $time[0] . ' and the desc is: ' . $time[1] . "<br>";
	// 	}
		
	// }



		/*AJAX Request*/
	function add_schedule() {
		$added = false;

		$weekday = $this->input->post('week', true);
		$from_time = $this->input->post('from_time', true);
	
		$to_time = $this->input->post('to_time', true);
	
		$room = $this->input->post('room', true);

		$existing = $this->schedule->check_existing_schedule($from_time, $to_time);

		
		if( !$existing ) {
			
			if( !empty($from_time) && !empty($to_time)  && !empty($room)) {

				$data = [
					'weekday' => $weekday,
					'from_time' => trim($from_time),
					
					'to_time' => trim($to_time),
					
					'room' => $room,
					'prof_id' => $this->session->userdata('prof_id')
				];

				$add_sched = $this->crud->add('schedule',$data);

				if( $add_sched ) {
					$added = true;
				}
			}
		}
 
		echo json_encode(['added' => $added]);
	}

	/*AJAX REQUEST*/
	function get_schedules() {
		// SET TIMEZONE
		date_default_timezone_set('Asia/Kuala_Lumpur'); //for PHL

		$current_day = date('N');

		header('Content-Type: application/json'); 
		
		$data['schedules'] =  $this->schedule->get_schedules($this->session->userdata('prof_id'), $current_day);


		
		$json = json_encode($data['schedules']);

		echo $json;
	
	
	}




}


?>