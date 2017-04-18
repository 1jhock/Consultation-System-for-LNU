<?php

Class Students extends CI_Controller {

	function index() {

		if($_POST) {

			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);

			

		} else {
			$this->load->view('templates/header.php');
			$this->load->view('login.php');
			$this->load->view('templates/footer.php');
		}
	}
}


?>