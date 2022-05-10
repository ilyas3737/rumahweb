<?php

class Template{
	protected $_ci;

	function __construct(){
		$this->_ci = &get_instance();
	}

	function view($content, $data = NULL, $template = NULL){
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);
		$data['template'] = $template;
		$this->_ci->load->view('template/front-end', $data);
	}
}
?>
