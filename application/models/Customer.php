<?php


class Customer extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getallcustomers(){
		$query = $this->db->get('customers');
		return $query->result_array();
	}
	public function insertcustomer($name, $password){
		$values = array(
			'name'=> $name,
			'password'=> $password
		);
		$this->db->insert('customers', $values);
		$affected_rows = $this->db->affected_rows();
		return $affected_rows;
	}
	public function updatecustomer($name, $password){
		$values = array(
			'name'=> $name,
			'password'=> $password
		);
		$this->db->where('name', $name);
		$this->db->update('customers', $values);
		$affected_rows = $this->db->affected_rows();
		return $affected_rows;
	}
	public function deletecustomer($name){
		$values = array(
			'name'=> $name
		);
		$this->db->where('name', $name);
		$this->db->delete('customers');
		$affected_rows = $this->db->affected_rows();
		return $affected_rows;
	}


}
