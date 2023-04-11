<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_Worker_Registry extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('Health_worker_registry_model');
        $this->load->model('Location_model');
    if(!($this->session->has_userdata('user'))){
        redirect('landing', 'refresh');

           
        }
       


    }

    public function index()
    {
    	$data = array();
        $this->load->view('internal/Health_Worker_registry/list_all', $data);
        
    }
    public function list_all($msg = "")
    {
        $data = $this->user_header_data();
        $data["module"] = "Health Worker Registry";
         $data["msg"] = "";
        if ($msg == 3)
        {
            $data["msg"] =  $data["msg"] = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>User deleted </strong>  
                                    </div>";
        }


        $data['hwr'] = $this->Health_worker_registry_model->get_all('health_worker');
        $this->load->view('internal/health_worker_registry/list_all', $data);

    }
    public function view($id,$msg = "")
    {
            $data = $this->load_data($id, $msg);
           $this->load->view('internal/health_worker_registry/view', $data);

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
           
            
            
            $data["module"] = "Health Worker Registry Management";
            $data["action"] = base_url().'Health_worker_registry/edit/'.$id;
            $data['dd_gender'] = $this->Health_worker_registry_model->get_all('dd_gender');
            $data['status'] = $this->Health_worker_registry_model->get_all('dd_yesno');            
            $data['type'] = $this->Health_worker_registry_model->get_all('dd_hwr_type');            
            $data['facility'] = $this->Health_worker_registry_model->get_all('health_facility');            

            $hwr = $this->Health_worker_registry_model->get_row_by_1_value("health_worker", "id", $id);
            $data["hwr"] = $hwr;
           return $data;



    }

    public function edit_worker($worker, $id)
    {
        $workerID = $this->Health_worker_registry_model->get_row_by_1_value("health_worker_registry", "hwr_id", $id)->id;
         $type = $this->Health_worker_registry_model->get_row_by_1_value('dd_hwr_type', 'id', $worker['type'])->name;
        $gender = $this->Health_worker_registry_model->get_row_by_1_value('dd_gender', 'dd_genderID', $worker['gender'])->name;
        $facility = $this->Health_worker_registry_model->get_row_by_1_value('health_facility', 'id', $worker['facility'])->name;
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
          $this->Health_worker_registry_model->update_by_id('health_worker_registry', 'id', $workerID, $workerin);
    }

    public function edit($id, $msg="")
    {
        $hwr = $this->Health_worker_registry_model->get_row_by_1_value("health_worker", "id", $id);
        $status = $this->input->post('status');
        if($hwr->status == 2 && $status == 1)
        {
            $approved_date = date('Y-m-d');
        }
        else
        {
            $approved_date = $hwr->approved_date;
        }



        $datain = array(
            'last_name' => $this->input->post('last_name'),
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'suffix' => $this->input->post('suffix_name'),
            'approved_date' =>$approved_date,
            'prc' => $this->input->post('prc'),
            'status' => $this->input->post('status'),
            'type' => $this->input->post('type'),
            'facility' => $this->input->post('facility'),
            'philhealth_no'=> $this->input->post('philhealth')
           
        );
        $this->Health_worker_registry_model->update_by_id('health_worker', 'id', $id, $datain);
        $this->edit_worker($datain, $id);
        $data = $this->load_data($id,1);
        $this->load->view('internal/health_worker_registry/view', $data);

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
