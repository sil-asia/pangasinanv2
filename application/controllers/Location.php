<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('location_model');
    }

    public function get_province_dd(){ 
        $region = $this->input->post('region');
        $data = $this->location_model->get_all_by_1_value_as_array("province", "regionID_fk", $region);
        echo json_encode($data); 
    }

    public function get_muncity_dd(){ 
        $province = $this->input->post('province');
        $data = $this->location_model->get_all_by_1_value_as_array("municipality_city", "provinceID_fk", $province);
        echo json_encode($data); 
    }
    public function get_barangay_dd(){ 
        $muncity = $this->input->post('muncity');
        $data = $this->location_model->get_all_by_1_value_as_array("barangay", "muncityID_fk", $muncity);
        echo json_encode($data); 
    }


  

}
