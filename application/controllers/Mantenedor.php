<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenedor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('api'));
		$this->load->model('uf');
	}
	public function index(){
		$this->load->view('mantenedor');
	}
	public function insert(){
		$this->uf->insertar_UF();
	}
	public function create($fecha, $valor){
		$result = $this->uf->addData($fecha, $valor);
		echo $result;
	}
	public function read(){ //leer
		$result = $this->uf->getData();
		echo json_encode($result);
	}
	public function update($id, $fecha, $valor){
		$result = $this->uf->updateData($id, $fecha, $valor);
		echo $result;
	}
	public function delete($id){
		$result = $this->uf->deleteData($id);
		echo $result;
	}
	
}
