<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		cek_login();
    }
	public function index()
	{
		$data['config'] = array('title'=>'Home');
		$this->template->view('home/index', $data, 'home');
	}
	public function show()
	{
		$data['config'] = array('title'=>'Home');
		$this->template->view('home/index', $data, 'home');
	}
}
