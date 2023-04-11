<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('Landing_model');
        $this->load->model('Location_model');
        $this->load->helper('download');
        
      
    }

    public function load_data()
    {
      //  $data = $this->user_header_data();


        $data['region'] = $this->Location_model->get_all_as_array('region');
        $data["action_login"]=base_url().'login/signin';
        $data["action_signup_patient"]=base_url().'Landing/signup_patient';
        $data["action_signup_facility"]=base_url().'Landing/signup_facility';
        $data["action_signup_worker"]=base_url().'Landing/signup_worker';

        $data["dashboard_link1"]=base_url().'product/list_all';
        $data["dashboard_link2"]=base_url().'dashboard';
        $data["dashboard_link3"]=base_url().'Landing/';
        
       
        $data["home_link"]=base_url().'landing';
        $data["gender"]=$this->Landing_model->get_all('dd_gender');
        $data["facilities"] = $this->Landing_model->get_all('health_facility');
        $data["level"] = $this->Landing_model->get_all('dd_level');
        $data["ownership"] = $this->Landing_model->get_all('dd_ownership');

        $data["dd_hwr_type"]=$this->Landing_model->get_all('dd_hwr_type');

        $data['signup_trigger']=0;
        $data['success'] = 0;
        return $data;
    }

    public function about()
    {
        $data = $this->load_data();
        $this->load->view('public/about', $data);

    }

    public function index()
    {
        $data = $this->load_data();
        $data["dashboard_link3"]=base_url().'Landing/index';
              
        $this->load->view('public/main', $data);
        
    }

    public function contact()
    {
        $this->load->view('public/contact');
    }

    public function view_health_facilities()
    {
        $data = $this->load_data();
        $this->load->view('public/health_facilities', $data);
    }
    public function view_API()
    {
        $data = $this->load_data();
        $this->load->view('public/API', $data);
    }
    

    public function view_resources()
    {
        $data = $this->load_data();
        $data["resources"] = $this->Landing_model->get_all('resource_materials');
        $this->load->view('public/resource', $data);
    }

    public function view_video($id)
    {
        $data = $this->load_data();
        $resource = $this->Landing_model->get_row_by_1_value('resource_materials', 'resource_materialsID', $id);
        $data['file'] = $resource->file_name;
        $this->load->view('public/view_video', $data);
    }


   

    public function landing($trigger=0)
    {
       
         $data = $this->load_data();
          $data["dashboard_link3"]=base_url().'Landing/index';
        
        $this->load->view('public/main', $data);
        
    }

    public function login()
    {
        $data = $this->load_data();
         $this->load->view('public/login', $data);
    }

    public function add_to_patient_dashboard($patient, $id)
    {
        $barangay = $this->Landing_model->get_row_by_1_value('barangay', 'barangayID', $patient['barangay'])->barangay;
        $facility = $this->Landing_model->get_row_by_1_value('health_facility', 'id', $patient['facility'])->name;
       $gender = $this->Landing_model->get_row_by_1_value('dd_gender', 'dd_genderID', $patient['gender'])->name;
       $date = new DateTime($patient['birth_date']);
       $now = new DateTime();
       $interval = $now->diff($date);
        $age =  $interval->y;

        $patientin = array(
            'patient_ID' => $id,
            'barangay' => $barangay,
            'facility' => $facility,
            'gender' => $gender,
            'age' => $age);

        $this->Landing_model->insert_to_db('patient_registry', $patientin);

    }

    public function signup_patient()
    {

        $data = $this->load_data();
        $data["dashboard_link3"]=base_url().'Landing/index';

        $patientin = array(
            'last_name' => $this->input->post('lname'),
            'first_name' => $this->input->post('fname'),
            'middle_name' => $this->input->post('mname'),
            'suffix' => $this->input->post('suffix'),
            'gender' => $this->input->post('gender'),
            'philhealth_no' => $this->input->post('philhealth'),
            'birth_date' => $this->input->post('bdate'),
            'facility' => $this->input->post('facility'),
             'region' => $this->input->post('i_region'),
             'province' => $this->input->post('i_province'),
            'mun_city' => $this->input->post('i_muncity'),
            'barangay' => $this->input->post('i_bgy'),
            'street_address' => $this->input->post('street'),
            'signup_date' => date('Y-m-d')

        );

        $data['success'] = 1;
        $id = $this->Landing_model->insert_to_db("patient", $patientin);   
        $this->add_to_patient_dashboard($patientin, $id);           
        $this->load->view('public/main', $data);

    }

    public function add_facility_to_dashboard($facility, $id)
    {
        $city = $this->Landing_model->get_row_by_1_value('municipality_city', 'municipality_cityID', $facility['mun_city'])->muncity;
        $barangay = $this->Landing_model->get_row_by_1_value('barangay', 'barangayID', $facility['barangay'])->barangay;
        $level = $this->Landing_model->get_row_by_1_value('dd_level', 'levelID', $facility['level'])->name;
        $ownership = $this->Landing_model->get_row_by_1_value('dd_ownership', 'ownershipID', $facility['ownership'])->name;
        

        $facilityin = array(
            'name' => $facility['name'],
            'muncity' => $city,
            'barangay' => $barangay,
            'level' => $level,
            'ownership' => $ownership,
            'facility_ID' => $id

        );

         $this->Landing_model->insert_to_db("health_facility_dashboard", $facilityin);
    }

     public function signup_facility()
    {

        
        $data = $this->load_data();
        $data["dashboard_link3"]=base_url().'Landing/index';

        $facilityin = array(
            'name' => $this->input->post('name'),
            'philhealthID' => $this->input->post('philhealth'),
            'level' => $this->input->post('level'),
            'ownership' => $this->input->post('ownership'),
             'region' => $this->input->post('i_region2'),
             'province' => $this->input->post('i_province2'),
            'mun_city' => $this->input->post('i_muncity2'),
            'barangay' => $this->input->post('i_bgy2'),
            'street_name' => $this->input->post('street'),
            'signup_date' => date('Y-m-d'),
            'geolocation' => $this->input->post('geolocation')

        );

         $data['success'] = 1;

        $id = $this->Landing_model->insert_to_db("health_facility", $facilityin);
        $this->add_facility_to_dashboard($facilityin, $id);
              
        $this->load->view('public/main', $data);

    }

    public function add_worker_to_dashboard($worker, $id)
    {
       
        $type = $this->Landing_model->get_row_by_1_value('dd_hwr_type', 'id', $worker['type'])->name;
        $gender = $this->Landing_model->get_row_by_1_value('dd_gender', 'dd_genderID', $worker['gender'])->name;
        $facility = $this->Landing_model->get_row_by_1_value('health_facility', 'id', $worker['facility'])->name;
        
        $workerin = array(
            'first_name' => $worker['first_name'],
            'middle_name' => $worker['middle_name'],
            'last_name' => $worker['last_name'],
            'suffix' => $worker['suffix'],
            'type' => $type,
            'gender' => $gender,
            'facility' => $facility,
            'hwr_id' =>$id

        );

         $this->Landing_model->insert_to_db("health_worker_registry", $workerin);
    }




     public function signup_worker()
    {

        $data = $this->load_data();
        $data["dashboard_link3"]=base_url().'Landing/index';

        $workerin = array(
            'last_name' => $this->input->post('lname'),
            'first_name' => $this->input->post('fname'),
            'middle_name' => $this->input->post('mname'),
            'suffix' => $this->input->post('suffix'),
            'gender' => $this->input->post('gender'),
            'philhealth_no' => $this->input->post('philhealth'),
            'date_of_birth' => $this->input->post('bdate'),
            'facility' => $this->input->post('facility'),
            'prc' => $this->input->post('prc'),
            'prc_validity' => $this->input->post('prc_date'),
             'type' => $this->input->post('type'),
            'signup_date' => date('Y-m-d')

        );

         $data['success'] = 1;

        $id = $this->Landing_model->insert_to_db("health_worker", $workerin);
        $this->add_worker_to_dashboard($workerin, $id);
              
        $this->load->view('public/main', $data);

    }

       

   

     
}
