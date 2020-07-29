<?php

class Email_controller extends CI_Controller
{
	private $token;
	private $key;
	private $site_url;

	/**
	 * Email_controller constructor.
	 * @param string $key
	 */
	public function __construct($key = 'some_key'){

		parent::__construct();
		$this->key = $key;
	}

	/**
	 *For email handling
	 */
	public function email(){

		//configuring email server
//		$config = Array(
//			'protocol' => 'smtp',
//			'smtp_host' => 'smtp.gmail.com',
//			'smtp_port' => 465,
//			'smtp_user' => 'sumeet.b@beaninnovate.com',
//			'smtp_pass' => 'Sumeet@123',
//			'mailtype'  => 'html',
//			'charset'   => 'iso-8859-1'
//		);
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = "\"C:\xampp\sendmail\sendmail.exe\" -t";
//		$config['charset'] = 'iso-8859-1';
//		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
//		$this->email->set_newline("\r\n");

		//generating data to be converted into token
		$encodedata = array();
		$encodedata['payload'] = array(
			'username'=>'sumeet',
			'exp'=> time()+600
		);
		$encodedata['key'] = $this->key;

		//encoding into token
		$this->token = JWT::encode($encodedata['payload'], $encodedata['key']);
		$data['jwt'] = $this->token;

		//appending token into the site
		$this->site_url = site_url('email_controller/verification/'.$this->token);

		//user email
		$email_to = $this->input->post('email');

		//composing email
		$this->email->to($email_to);
		$this->email->subject('See your decoded token');
		$this->email->message('follow the given link -> '.$this->site_url);
		$this->email->print_debugger();

		//sending email
		if( $this->email->send() ){
//			$this->session->set_flashdata("email_sent","Email sent successfully.");

			//loading the success view
			$this->load->view('header');
			$this->load->view('suc_email');
			$this->load->view('footer');
		}
//		else
//			$this->session->set_flashdata("email_sent","Error in sending Email.");
	}

	/**
	 * @param $token
	 * For decoding the token
	 */
	public function verification($token){

		//decoding the token
		$data['decodedtoken'] = JWT::decode($token, $this->key, array('HS256'));

		//loading views
		$this->load->view('header');
		$this->load->view('customertokendisplay', $data);
		$this->load->view('footer');
	}
}
