<?php

Class Dashboard_model extends MY_Model {

	public function total_buyers()
	{
		$this->db->select('*');
		$this->db->from('buyer');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function total_organizations()
	{
		$this->db->select('*');
		$this->db->from('organization');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_this_week_users($type, $start, $end)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('DATE(signup_date) >=', $start);
		$this->db->where('DATE(signup_date) <=', $end);

		$this->db->where('type', $type);
		$query = $this->db->get();
		$total = $query->num_rows();
		
		return $total;

	}
	public function get_views($start, $end)
	{
		$this->db->select('*');
		$this->db->from('product_views');
		$this->db->where('DATE(date_viewed) >=', $start);
		$this->db->where('DATE(date_viewed) <=', $end);
		$query = $this->db->get();
		$total = $query->num_rows();
		
		return $total;

	}
	public function get_submitted_products($start, $end)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('DATE(submission_date) >=', $start);
		$this->db->where('DATE(submission_date) <=', $end);
		$query = $this->db->get();
		$total = $query->num_rows();
		
		return $total;

	}
	
	public function get_vetted_products($start, $end)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('DATE(vetting_date) >=', $start);
		$this->db->where('DATE(vetting_date) <=', $end);
		$query = $this->db->get();
		$total = $query->num_rows();
		
		return $total;

	}
	
	public function get_posted_products($start, $end)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('DATE(posting_date) >=', $start);
		$this->db->where('DATE(posting_date) <=', $end);
		$query = $this->db->get();
		$total = $query->num_rows();
		
		return $total;

	}



	


}

?>