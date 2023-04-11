<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('User_model');
        $this->load->model('Location_model');
        $user_data = $this->user_header_data();
     if(!($this->session->has_userdata('user'))){
        redirect('landing', 'refresh');

           
        }
        if ($user_data['role'] == "1")
        {
               
            redirect('landing', 'refresh');
            
        }
      

    }

    public function index()
    {
    	$data = array();
        $this->load->view('internal/admin/list_all', $data);
        
    }
    public function list_all($msg = "")
    {
        $data = $this->user_header_data();
        $data["module"] = "User Management";
         $data["msg"] = "";
        if ($msg == 3)
        {
            $data["msg"] =  $data["msg"] = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>User deleted </strong>  
                                    </div>";
        }
            
        $admins_a = $this->User_model->get_all('person');
        $admins = array();
        foreach ($admins_a as $admin_user)
        {
            $a_user = new StdClass();
            $a_user->id = $admin_user->personID;
            $a_user->name = $admin_user->first_name. " " . $admin_user->last_name;
            $a_user->user = $this->User_model->get_row_by_1_value('user', 'userID', $admin_user->userID_fk);
            array_push($admins, $a_user);
        }
        $data["admins"] = $admins;

        
        $this->load->view('internal/admin/list_all', $data);

    }
    public function view($id,$msg = "")
    {
            $data = $this->load_data($id, $msg);
            $this->load->view('internal/admin/view', $data);

    }

      public function get_loc($munID)
    {
        $loc = new StdClass();
        $mun = $this->Location_model->get_row_by_1_value('municipality_city', 'municipality_cityID', $munID);
        if($mun)
        {
            $loc->mun = $mun->muncity;
            $loc->munID = $mun->municipality_cityID;
            $prov = $this->Location_model->get_row_by_1_value('province','provinceID', $mun->provinceID_fk);
            if($prov)
            {
                $loc->prov = $prov->province;
                $loc->provID = $prov->provinceID;
                $reg = $this->Location_model->get_row_by_1_value('region','regionID', $prov->regionID_fk);
                if ($reg)
                {
                    $loc->reg = $reg->region_longname;
                    $loc->regID = $reg->regionID;
                    
           
                }
                else
                {
                    $loc->reg = "";
                    $loc->regID = 0;
                }
            }
            else
            {
                     $loc->prov = "";
                    $loc->provID = 0;
                    $loc->reg = "";
                    $loc->regID = 0;

            }

           

        }
        else
        {

                     $loc->prov = "";
                    $loc->provID = 0;
                    $loc->reg = "";
                    $loc->regID = 0;
                    $loc->mun = "";
                    $loc->munID = 0;


        }
       return $loc;
      

    }

    
    public function load_data($id, $msg = "")
    {

            $data = $this->user_header_data();
            if ($msg == 1)
            {
                $data["msg"] =   "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Admin Detail updated</strong>  
                                    </div>";
            }
            else if ($msg == 3)
            {
                $data["msg"] =   "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Item Deleted</strong>  
                                    </div>";
            }
            else if ($msg == 2)
            {
                $data["msg"] =   "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>New User Added</strong>  
                                    </div>";
            }
            
            
            $data["module"] = "User Management";
            $data["action"] = base_url().'admin/edit/'.$id;
            $data["password_action"] = base_url().'admin/edit_password/'.$id;
            $data["status_action"] = base_url().'admin/edit_status/'.$id;
            
            
            $admin = $this->user_model->get_row_by_1_value("person", "personID", $id);
            $user = $this->user_model->get_row_by_1_value("user", "userID", $admin->userID_fk);
            $data["admin"] = $admin;
            $data["user"] = $user;
            $data["id"] = $id;
            $data['roles'] = $this->User_model->get_all('role');
           return $data;



    }

    public function edit($id, $msg="")
    {

        $datain = array(
            'first_name' => $this->input->post('first_name'),
            'middle_initial' => $this->input->post('middle_initial'),
            'last_name' => $this->input->post('last_name'),
            'role' => $this->input->post('type')
        );
        $this->User_model->update_by_id('person', 'personID', $id, $datain);
        $data = $this->load_data($id,1);
        $this->load->view('internal/admin/view', $data);

    }
 
    public function edit_status($id)
    {
        $admin = $this->User_model->get_row_by_1_value('person', 'personID', $id);
        $user = $this->User_model->get_row_by_1_value('user', 'userID', $admin->userID_fk);
        $datain = array('status' => $this->input->post('status'));
         $this->User_model->update_by_id('user', 'userID', $user->userID, $datain);
        $data = $this->load_data($id,1);
        $this->load->view('internal/admin/view', $data);
        
    }

    public function edit_password($id)
    {
        $admin = $this->User_model->get_row_by_1_value('person', 'personID', $id);
        $user = $this->User_model->get_row_by_1_value('user', 'userID', $admin->userID_fk);
        $datain = array('password' => $this->hash_password($this->input->post('password')));
         $this->User_model->update_by_id('user', 'userID', $user->userID, $datain);
        $data = $this->load_data($id,1);
        $this->load->view('internal/admin/view', $data);
        
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
        $data['roles'] = $this->User_model->get_all('role');
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
                'status' => '0',
                'signup_date' => date('Y-m-d'));
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
