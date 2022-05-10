<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
    }
	public function index()
	{
		if(isset($_SESSION['userdata'])){
			redirect('home');
		}
		
		if(!isset($_GET['token'])){
			$data['config'] = array('title'=>'Login');
			$this->template->view('login/index', $data);
		}else{
			//pengecekan token masih statis 
			if($_GET['token']=='QpwL5tke4Pnpja7X4'){
				$data = [
					'token'=>$_GET['token'],
					'email'=>$_GET['email'],

				];
				$this->session->set_userdata($data);
				
				redirect('home');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('email');
        redirect('login');
	}
}
