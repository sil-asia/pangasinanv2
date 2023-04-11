<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_Registry extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('Patient_registry_model');
        $this->load->model('Location_model');
     if(!($this->session->has_userdata('user'))){
        redirect('landing', 'refresh');

           
        }
        

    }

    public function index()
    {
    	$data = array();
        $this->load->view('internal/patient_registry/list_all', $data);
        
    }
    public function list_all($msg = "")
    {
        ini_set('memory_limit', '-1');
        $data = $this->user_header_data();
        $data["module"] = "Patient Regsistry Module";
         $data["msg"] = "";
        
        if ($msg == 3)
        {
            $data["msg"] =  $data["msg"] = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>User deleted </strong>  
                                    </div>";
        }


        $data['patients'] = $this->Patient_registry_model->get_all('Patient');
        $this->load->view('internal/patient_registry/list_all', $data);

    }
    public function view($id,$msg = "")
    {
            $data = $this->load_data($id, $msg);
           $this->load->view('internal/patient_registry/view', $data);

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
           
            
            
            $data["module"] = "Patient Registry Management";
            $data["action"] = base_url().'Patient_Registry/edit/'.$id;
            $data['dd_gender'] = $this->Patient_registry_model->get_all('dd_gender');
            $data['dd_source'] = $this->Patient_registry_model->get_all('dd_source');
            $data['profile'] = $this->Patient_registry_model->get_all('dd_yesno');            
            $patient = $this->Patient_registry_model->get_row_by_1_value("Patient", "id", $id);
            $data['region'] = $this->Patient_registry_model->get_all('region');
            $data['facility'] = $this->Patient_registry_model->get_all('health_facility');
           
            $data["loc"] = $this->get_loc($patient->barangay);
            $data["patient"] = $patient;

            
           return $data;



    }

    public function edit_patient($data, $id)
    {
         $patientID = $this->Patient_registry_model->get_row_by_1_value("patient_registry", "patient_id", $id)->id;


        $barangay = $this->Patient_registry_model->get_row_by_1_value('barangay', 'barangayID', $data['barangay'])->barangay;
        $gender = $this->Patient_registry_model->get_row_by_1_value('dd_gender', 'dd_genderID', $data['gender'])->name;
        $facility = $this->Patient_registry_model->get_row_by_1_value('health_facility', 'id', $data['facility'])->name;
         $date = new DateTime($data['birth_date']);
         $now = new DateTime();
        $interval = $now->diff($date);
         $age =  $interval->y;

        $patientin = array(
            'patient_ID' => $id,
            'barangay' => $barangay,
            'facility' => $facility,
            'gender' => $gender,
            'age' => $age);

           $this->Patient_registry_model->update_by_id('patient_registry', 'id', $patientID, $patientin);


    }

    public function edit($id, $msg="")
    {
        $patient = $this->Patient_registry_model->get_row_by_1_value("Patient", "id", $id);
        $profiled = $this->input->post('profiled');
        $date_profiled = NULL;
        
        if($patient->profiled == 2 && $profiled == 1)
        {
            $date_profiled = date('y-m-d');
        }      
        else
        {
            $date_profiled =  $patient->date_profiled;
        }



        $datain = array(
            'last_name' => $this->input->post('last_name'),
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'suffix' => $this->input->post('suffix_name'),
            'barangay' => $this->input->post('i_bgy'),
            'mun_city' => $this->input->post('i_muncity'),
            'province' => $this->input->post('i_province'),
            'region' => $this->input->post('i_region'),
            'street_address' => $this->input->post('street'),
            'gender' =>$this->input->post('gender'),
            'birth_date' =>$this->input->post('birth_date'),
            'philhealth_no' =>$this->input->post('philhealth'),
            'profiled' =>$this->input->post('profiled'),
            'source' =>$this->input->post('source'),
            'facility' =>$this->input->post('facility'),
            'date_profiled' => $date_profiled
            
           
        );

    
        $this->Patient_registry_model->update_by_id('patient', 'id', $id, $datain);
        $this->edit_patient($datain, $id);
        
        $data = $this->load_data($id,1);
        $this->load->view('internal/patient_registry/view', $data);

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

    
     
}
