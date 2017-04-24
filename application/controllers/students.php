<?php
/*
	"_" prefix means not a page.
*/
Class Students extends CI_Controller {

	function index() {
		$this->load->view('templates/header.php');
		$this->load->view('login.php');
		$this->load->view('templates/footer.php');
	}


	 function login() {
			$existing = false;
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
		
			$user = $this->auth->login('students',$username,$password);

			if( $user ) {
				$existing = true;
				$data = [
					'stud_id' => $user->stud_id,
					'name' => $user->name,
					'email' => $user->email,
					'course' => $user->course,
				];

				$this->session->set_userdata($data);
			}

			echo json_encode(['user' => $existing]);


		}
	

	function logout() {
		$newdata = array('stud_id' => '');
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}


	function home() {
		$data['professors'] = $this->crud->get_all('professors');

		$this->load->view('templates/header');
		$this->load->view('student/index', $data);
		$this->load->view('templates/footer');
	}

	function message($id) {
		$data['cur_prof'] = $this->crud->get_single('professors','prof_id',$id);
		$data['smiley_table'] = $this->crud->load_emoji('msg');

		$this->load->view('templates/header');
		$this->load->view('student/msg_box', $data);
		$this->load->view('templates/footer');
	}


	 function send_msg() {
		$response = false;

		$msg = $this->input->post('msg', true);
		$to = $this->input->post('from_id', true);

		$data = [
			'msg' => $msg,
			'status' => '0',
			'from_id' => $this->session->userdata('stud_id'),
			'to_id' =>  $to
		];

		$new_data = $this->crud->add('msg', $data);

		if( $new_data ) {
			$response = true;
		} 

		echo json_encode(['sent', $response]);
	}
	

	function get_msg_thread() {

		header('Content-Type: application/json'); 

		$data['msgs'] =  $this->crud->get_all('msg');
		
		$json = json_encode($data['msgs']);
		
		echo $json;

	}


}


?>