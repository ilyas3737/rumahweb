<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$data['config'] = array('title'=>'registration');
		$this->template->view('registration/index', $data);
	}
}
