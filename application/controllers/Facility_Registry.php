<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility_Registry extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('Facility_registry_model');
        $this->load->model('Location_model');
    if(!($this->session->has_userdata('user'))){
        redirect('landing', 'refresh');

           
        }
       

      

    }

    public function index()
    {
    	$data = array();
        $this->load->view('internal/facility_registry/list_all', $data);
        
    }
    public function list_all($msg = "")
    {
        $data = $this->user_header_data();
        $data["module"] = "Facility Registry Module";
         $data["msg"] = "";
        if ($msg == 3)
        {
            $data["msg"] =  $data["msg"] = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>User deleted </strong>  
                                    </div>";
        }


        $facility = $this->Facility_registry_model->get_all('health_facility');
        $facilities = array();
        foreach($facility as $f)
        {
            $fac = new StdClass();
            $fac->name = $f->name;
            $fac->id = $f->id;
            $fac->barangay = $this->Facility_registry_model->get_row_by_1_value('barangay', 'barangayID', $f->barangay)->barangay;
            $fac->level = $this->Facility_registry_model->get_row_by_1_value('dd_level', 'levelID', $f->level)->name;
            $fac->ownership = $this->Facility_registry_model->get_row_by_1_value('dd_ownership', 'ownershipID', $f->ownership)->name;
            $fac->status = $f->status;
            $fac->approval_date = $f->approval_date;

            array_push($facilities, $fac); 
        }
        $data['facilities'] = $facilities;
        $this->load->view('internal/facility_registry/list_all', $data);

    }
    public function view($id,$msg = "")
    {
            $data = $this->load_data($id, $msg);
           $this->load->view('internal/facility_registry/view', $data);

    }

  
    
    public function load_data($id, $msg = "")
    {

            $data = $this->user_header_data();
            if ($msg == 1)
            {
                $data["msg"] =   "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Patient Detail updated</strong>  
                                    </div>";
            }
            else if ($msg == 3)
            {
                $data["msg"] =   "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Patient Deleted</strong>  
                                    </div>";
            }
           
            
            
            $data["module"] = "Facility Registry Management";
            $data["action"] = base_url().'Facility_Registry/edit/'.$id;
            $data['status'] = $this->Facility_registry_model->get_all('dd_yesno');
            $data['level'] = $this->Facility_registry_model->get_all('dd_level');
            $data['ownership'] = $this->Facility_registry_model->get_all('dd_ownership');
            $data['region'] = $this->Facility_registry_model->get_all('region');

                        
            $facility = $this->Facility_registry_model->get_row_by_1_value("health_facility", "id", $id);
            $data["loc"] = $this->get_loc($facility->barangay);

            $data["facility"] = $facility;
           return $data;



    }

    public function edit_facility($data, $id)
    {
         $facilityID = $this->Facility_registry_model->get_row_by_1_value("health_facility_dashboard", "facility_id", $id)->id;

        $city = $this->Facility_registry_model->get_row_by_1_value('municipality_city', 'municipality_cityID', $data['mun_city'])->muncity;
        $barangay = $this->Facility_registry_model->get_row_by_1_value('barangay', 'barangayID', $data['barangay'])->barangay;
        $level = $this->Facility_registry_model->get_row_by_1_value('dd_level', 'levelID', $data['level'])->name;
        $ownership = $this->Facility_registry_model->get_row_by_1_value('dd_ownership', 'ownershipID', $data['ownership'])->name;
        $location = $data['latitude'].','.$data['longtitude'];
         $datain = array(
            'barangay' => $barangay,
            'muncity' => $city,
            'level' => $level,
            'ownership' => $ownership,
            'capacity' => $data['capacity'],
            'current_load' => $data['current_load'],
            'location' => $location);


         $this->Facility_registry_model->update_by_id('health_facility_dashboard', 'id', $facilityID, $datain);


    }

    public function edit($id, $msg="")
    {
        $facility = $this->Facility_registry_model->get_row_by_1_value("health_facility", "id", $id);
        $status = $this->input->post('status');
        if($facility->status == 2 && $status == 1)
        {
            $approval_date = date('Y-m-d');
        }
        else
        {
            $approval_date = $facility->approval_date;
        }



        $datain = array(
            'barangay' => $this->input->post('i_bgy'),
            'mun_city' => $this->input->post('i_muncity'),
            'province' => $this->input->post('i_province'),
            'region' => $this->input->post('i_region'),
            'street_name' => $this->input->post('street'),
            'status' => $this->input->post('status'),
            'level' => $this->input->post('level'),
            'ownership' => $this->input->post('ownership'),
            'capacity' => $this->input->post('capacity'),
            'current_load' => $this->input->post('current_load'),
            'philhealthID' => $this->input->post('philhealth'),
            'longtitude' => $this->input->post('longtitude'),
            'latitude' => $this->input->post('latitude'),
            'approval_date' => $approval_date
           
        );
        $this->Facility_registry_model->update_by_id('health_facility', 'id', $id, $datain);
        $this->edit_facility($datain,$id);
        $data = $this->load_data($id,1);
        $this->load->view('internal/facility_registry/view', $data);

    }
 
    


     public function delete($id)
    {
        if($id)
        {
            $organization = $this->User_model->get_row_by_1_value('organization', 'organizationID', $id);
            $user = $this->User_model->get_row_by_1_value('user', 'userID', $organization->userID_fk);
            $this->User_model->delete_by_id("user", "userID", $user->userID);
            $this->User_model->delete_by_id("organization", "organizationID", $id);

            $this->list_all("3");
        }
        else
        {
            $this->list_all();
        }

    }

    public function add()
    {
        $data = $this->user_header_data();
        $data["action"] = base_url()."admin/new_";
        $data["module"] = "Admin User Management Module";
        $data["msg"] = "";
        $this->load->view('internal/admin/add', $data);

    }

    public function new_()
    {
        $email = $this->input->post('email');
        $count = $this->User_model->count_by_1_param('user', 'email', $email);
        if ($count == 0)
        {
             $userin = array('email' => $this->input->post('email'),
                'type' => 'person',
                'status' => '0');
             $userid = $this->user_model->insert_to_db('user', $userin);
             $personin= array('first_name' => $this->input->post('first_name'),
                'middle_initial' => $this->input->post('middle_initial'),
                'last_name' => $this->input->post('last_name'),
                'userID_fk' =>$userid,
                'role' => $this->input->post('type'));
        $id = $this->user_model->insert_to_db('person', $personin);
        
         $data = $this->user_header_data();
        $data = $this->load_data($id, 2);
        $this->load->view('internal/admin/view', $data);

        }
        else
        {
            $data = $this->user_header_data();
            $data["action"] = base_url()."admin/edit";
            $data["module"] = "Admin User Management Module";
             $data["msg"] =   "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Email is already in the database. Please choose another email</strong>  
                                    </div>";
            $this->load->view('internal/admin/add', $data);

        }

       

    }
  

    private function hash_password($password){
       return password_hash($password, PASSWORD_BCRYPT);
    }

     
}
