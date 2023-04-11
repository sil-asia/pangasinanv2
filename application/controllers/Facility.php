<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/REST_Controller.php';


class Facility extends REST_Controller {

    
	  /*
     * Get All Data from this method.
     *
     * @return Response
    */
        public function __construct() {
        parent::__construct();
          $username = $this->session->userdata('name');

        $this->load->database();
    }

  

       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
         $username = $this->session->userdata('name');  

         if($username == null)
         {
            var_dump('No username');
         }
         else
         {
             if(!empty($id)){
            $data = $this->db->get_where("health_facility", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("health_facility")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
         }
        
              
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('items',$input);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}