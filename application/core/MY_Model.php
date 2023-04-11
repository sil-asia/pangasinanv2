<?php
class MY_Model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		// $this->load->database("neda");
	}

	public function get_fields($table)
	{
		
		return $this->db->list_fields($table);

	}

	public function get_tables()
	{
		
		return $this->db->list_tables();

	}

	public function insert_to_db($table, $datain)
	{
		$this->db->insert($table, $datain);
		return  $this->db->insert_id();
	}

	public function delete_by_id($table, $field, $value)
	{
		if ($value != NULL)
		{
			$this->db->where($field, $value);
			$this->db->delete($table); 
		}
	}
	public function delete_by_2_value($table, $field, $value, $field2, $value2)
	{
		if ($value != NULL)
		{
			$this->db->where($field, $value);
			$this->db->where($field2, $value2);
			$this->db->delete($table); 
		}
	}

	public function search_string_by_1_value($table, $field1, $value1){   
		//$this->db->like($field, $value, 'both');
		$this->db->like(strtolower($field1), strtolower($value1), 'both');
		//$this->db->limit(10);
		$res = $this->db->get($table);
	    return $res->result_array();
	}
	
	public function search_string_in_2_fields($table, $field1, $field2, $value1){ 
		$this->db->like(strtolower($field1), strtolower($value1), 'both');
		$this->db->or_like(strtolower($field2), strtolower($value1), 'both');
		$res = $this->db->get($table);
	    return $res->result_array();
	}
	public function search_string_in_3_fields($table, $field1, $field2, $field3, $value1){ 
		$this->db->like(strtolower($field1), strtolower($value1), 'both');
		$this->db->or_like(strtolower($field2), strtolower($value1), 'both');
		$this->db->or_like(strtolower($field3), strtolower($value1), 'both');
		$res = $this->db->get($table);
	    return $res->result_array();
	}

	public function get_row_by_1_value($table, $field1, $value1){
		$this->db->where($field1, $value1);
		$query = $this->db->get($table);		
		return $query->row();
	}
	
	public function get_row_by_2_values($table, $field1, $value1, $field2, $value2){
		$this->db->where($field1, $value1);
		$this->db->where($field2, $value2);
		$query = $this->db->get($table);		
		return $query->row();
	}
	public function get_row_by_3_values($table, $field1, $value1, $field2, $value2, $field3, $value3){
		$this->db->where($field1, $value1);
		$this->db->where($field2, $value2);
		$this->db->where($field3, $value3);
		$query = $this->db->get($table);		
		return $query->row();
	}

	public function get_all($table){
		$query = $this->db->get($table);		
		return $query->result();
	}

	public function get_all_as_array($table){
		$response =array();
		$query = $this->db->get($table);	
        $response = $query->result_array();	
		return $response;
	}
	public function get_all_by_1_value_as_array($table, $field1, $value1){
		$response =array();
		$this->db->where($field1, $value1);
		$query = $this->db->get($table);
        $response = $query->result_array();	
		return $response;
	}

	public function get_all_sort_by_order($table, $sortby, $order){
		$this->db->order_by($sortby, $order);
		$query = $this->db->get($table);		
		return $query->result();
	}

	public function get_all_by_1_value($table, $field1, $value1){
		$this->db->where($field1, $value1);
		$query = $this->db->get($table);		
		return $query->result();
	}

	public function get_all_by_1_value_sort_by_order($table, $field1, $value1, $sortby, $order){
		$this->db->where($field1, $value1);
		$this->db->order_by($sortby, $order);
		$query = $this->db->get($table);		
		return $query->result();
	}

	public function get_all_by_2_values($table, $field1, $value1, $field2, $value2){
		$this->db->where($field1, $value1);
		$this->db->where($field2, $value2);
		$query = $this->db->get($table);		
		return $query->result();
	}

	public function update_by_id($table, $field, $value, $data){
		$this->db->where($field,$value);
		$this->db->update($table,$data);

		return 1;
	}

	public function count_all($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->num_rows();

	}

	public function count_by_1_param($table, $field1, $value1)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field1, $value1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_by_2_param($table, $field1, $value1, $field2, $value2)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field1, $value1);
		$this->db->where($field2, $value2);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_id_by_1_value($table, $id, $field1, $value1)
	{
		$this->db->select($id);
		$this->db->where($field1, $value1);
		$query = $this->db->get($table);		
		return $query->result();
	}

	public function delete_by_1_value($table, $field, $value)
	{
		$this ->db-> where($field, $value);
   		$this ->db-> delete($table);
	}
	public function delete_by_2_values($table, $field, $value, $field2, $value2)
	{
		$this ->db-> where($field, $value);
		$this ->db-> where($field2, $value2);
   		$this ->db-> delete($table);
	}

	

}

?>