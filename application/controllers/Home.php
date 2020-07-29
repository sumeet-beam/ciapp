<?php

class Home extends CI_Controller
{
	public function view($page = 'home'){
		$this->load->view('header');
		$this->load->view($page.'');
		$this->load->view('email_form');
		$this->load->view('footer');
	}
}
