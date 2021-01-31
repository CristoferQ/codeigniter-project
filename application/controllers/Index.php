<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('api'));
	}
	public function index(){
		$this->load->view('index');
	}
	public function getData($tipo){
		$result = traer_por_tipo($tipo);
		echo json_encode($result);
	}
}
