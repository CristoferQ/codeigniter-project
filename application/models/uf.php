<?php
class uf extends CI_Model{
    function __construct(){
        parent::__construct();
		$this->load->helper(array('api'));
        $this->load->database();
    }
    function insertar_UF(){
        $result = traer_UF();   
        
        for ($i = 1977; $i <= 2021; $i++) {
            for ($j = 0; $j <= sizeof($result[$i]->serie)-1; $j++){
                $this->db->insert('uf', array(
                    "fecha" => json_encode($result[$i]->serie[$j]->fecha),
                    "valor" => json_encode($result[$i]->serie[$j]->valor)
                ));
            }
        }
    }
    function getData(){
        $sql = $this->db->get('uf');
        return $sql->result();
    }
    function addData($fecha, $valor){
        $this->db->insert('uf', array(
            "fecha" => $fecha,
            "valor" => $valor
        ));
        return "ok";
    }
    function deleteData($id){
        $this->db->where('id', $id);
        $this->db->delete('uf');
        return "ok";
    }
    function updateData($id, $fecha, $valor){
        $this->db->where('id', $id);
        $this->db->update('uf', array(
            "fecha" => $fecha,
            "valor" => $valor
        ));
        return "ok";
    }



}