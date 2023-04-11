<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('user_model');
          $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => 'dti.empower@gmail.com', // change it to yours
            'smtp_pass' => '3mpower!!!', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE);
         $config['smtp_crypto'] = 'tls';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

    /*    if(!($this->session->has_userdata('username'))){
            redirect('login', 'refresh');
        }
        $this->admin_codes=array(1,2);*/
      

    }

    public function index()
    {
        if($this->session->has_userdata('username')){
            redirect('Dashboard', 'refresh');
        }
        else{
            redirect('Landing', 'refresh');
        }
    }

    public function signin() {
        
        $email=$this->input->post("email");
        $password=$this->input->post("password");

        // $email='philip@gmail.com';
        // $password='pipay';
        $user= $this->user_model->get_row_by_2_values("user", "email", $email, "status", "0");

        

        if($user){
            if($this->verifyHashedPassword($password,$user->password))
            {


                $user_role_h = $this->user_model->get_all_by_2_values("user_role", "userID_fk", $user->userID, "status", "1");

                $user_role=array();
                foreach ($user_role_h as $key) {
                    array_push($user_role, $key->roleID_fk);
                }
              

                $type=$user->type;

                if($type=="organization"){
                    $org = $this->user_model->get_row_by_1_value("organization", "userID_fk", $user->userID);
                    if ($org)
                    {
                        $name = $org->business_name;
                        $session_data = array('user' => $email, 'user_type' => $type, 'name' => $name,'personID' => $org->organizationID, 'userID'=>$user->userID, 'active_role'=>'Organization','user_roles'=>'Organization');
                        $this->session->set_userdata($session_data);
                         echo "yes1";
                    }
                    
                        
                }
                else if($type=="person"){
                    $person = $this->user_model->get_row_by_1_value("person", "userID_fk", $user->userID);
                    if($person){
                        $name=$person->last_name.", ".$person->first_name;
                        if($person->role == 1)
                        {
                            $session_data = array('user' => $email, 'user_type' => $type, 'name' => $name,'personID' => $person->personID, 'userID'=>$user->userID, 'active_role'=>"Admin",'user_roles'=>"Admin");

                        }
                        else if ($person->role == 5)
                        {
                            $session_data = array('user' => $email, 'user_type' => $type, 'name' => $name,'personID' => $person->personID, 'userID'=>$user->userID, 'active_role'=>"BPS",'user_roles'=>"BPS");

                        }
                        else
                        {
                            $session_data = array('user' => $email, 'user_type' => $type, 'name' => $name,'personID' => $person->personID, 'userID'=>$user->userID, 'active_role'=>"Buyer",'user_roles'=>"Buyer");

                        }
                        $this->session->set_userdata($session_data);

                        
                        echo "yes2";
                        // $path=base_url()."Dashboard";
                        // redirect($path);
                    }

            }
            else if ($type == "buyer") {

                 $buyer = $this->user_model->get_row_by_1_value("buyer", "userID_fk", $user->userID);
                    if($buyer){
                        $buyer_name=$buyer->last_name.", ".$buyer->first_name;
                        $session_data = array('user' => $email, 'user_type' => $type, 'name' => $buyer_name,'personID' => $buyer->buyerID, 'userID'=>$user->userID, 'active_role'=>"Buyer",'user_roles'=>"Buyer");

                        }
                    
                        $this->session->set_userdata($session_data);

                        
                        echo "yes3";
                        // $path=base_url()."Dashboard";
                        // redirect($path);


            }
            else{
                // echo "no";
                // $data['msg']="<div class='alert alert-danger' role='alert'>Error. Please check username and/or password.</div>";
                echo '<div class="alert alert-danger">';
                echo '<strong>Error!</strong> Incorrect username and/or password entered.';
                echo '</div>';
            }
        }
        else{
            echo '<div class="alert alert-danger">';
                echo '<strong>Error!</strong> Incorrect username and/or password entered.';
            echo '</div>';
        }
    }
}

    public function logout() {
        $this->session->sess_destroy();
        $path=base_url()."Landing";
        redirect($path);
    }

    public function signup_org(){

        $business_name=$this->input->post("i_business_name");
        $email=$this->input->post("i_email");
        $password=$this->input->post("i_password");
        $hashed_p=$this->hash_password($password);

        $emailExist = $this->user_model->get_row_by_1_value("organization", "email", $email);
        if($emailExist){
            $msg=2;
        }else{
            $userExist = $this->user_model->get_row_by_2_values("user", "type", "organization", "email", $email);
            if($userExist){
                $userID=$userExist->userID;
                $datain = array( 
                            'email' => $email,
                            'password' => $hashed_p,
                            'type' => "organization",
                            'status' => 1,
                        );
                $userUp = $this->user_model->update_by_id("user", "userID", $userID, $datain);
            }else{
                $datain = array( 
                            'email' => $email,
                            'password' => $hashed_p,
                            'type' => "organization",
                            'status' => 1,
                            'signup_date' => date('y-m-d')
                        );
                $userID = $this->user_model->insert_to_db("user", $datain);
            }
                
            $datain = array( 
                        'business_name' => $business_name,
                        'email' => $email,
                        'userID_fk'=> $userID,
                    );
            
            $orgID = $this->user_model->insert_to_db("organization", $datain);
            $datain = array('userID_fk' => $userID, 'roleID_fk' => 2, 'status' => 0);
            $this->user_model->insert_to_db("user_role", $datain);

            $msg=1;
        }
        $this->send_email_organizaton($email);

        $path=base_url()."Landing/landing/".$msg;
        redirect($path);
    }

    public function send_email_organizaton($email)
    {
        $this->email->from('dti.empower@gmail.com', 'DTI Empower');
        $this->email->to($email); 
        $this->email->subject('Application for Empower Account is Received');
        $this->email->message('This is to inform you that we have received an application from you for an account.');
        $this->email->send();
      
       
         
    }
    public function send_email_buyer($email)
    {
        $this->email->from('dti.empower@gmail.com', 'DTI Empower');
        $this->email->to($email); 
        $this->email->subject('Application for Empower Account is Approved');
        $this->email->message('This is to inform you that your buyer account is approved');
        $this->email->send();
       
         
    }  

    public function signup_buyer(){

        $email=$this->input->post("buyer_email");
        $lname=$this->input->post("buyer_lname");
        $mname=$this->input->post("buyer_mname");
        $fname=$this->input->post("buyer_fname");
        $suffix=$this->input->post("buyer_suffix");
        $designation=$this->input->post("buyer_designation");
        $gender=$this->input->post("gender");
        $social_classification=$this->input->post("social_classification");
        
        $password=$this->input->post("buyer_password");
        $hashed_p=$this->hash_password($password);

        $emailExist = $this->user_model->get_row_by_1_value("organization", "email", $email);
        if($emailExist){
            $msg=2;
        }else{
            $userExist = $this->user_model->get_row_by_2_values("user", "type", "organization", "email", $email);
            if($userExist){
                $userID=$userExist->userID;
                $datain = array( 
                            'email' => $email,
                            'password' => $hashed_p,
                            'type' => "buyer",
                            'status' => 0,
                                                    );
                $userUp = $this->user_model->update_by_id("user", "userID", $userID, $datain);
            }else{
                $datain = array( 
                            'email' => $email,
                            'password' => $hashed_p,
                            'type' => "buyer",
                            'status' => 0,
                            'signup_date' => date('y-m-d')

                        );
                $userID = $this->user_model->insert_to_db("user", $datain);
            }
                
            $datain = array( 
                        'first_name' => $fname,
                        'middle_initial' => $mname,
                        'last_name' => $lname,
                        'designation' => $designation,
                        'gender' => $gender,
                        'dd_social_classificationID_fk' => $social_classification,
                        'suffix' => $suffix,
                        'userID_fk'=> $userID
                    );
            
            $buyID = $this->user_model->insert_to_db("buyer", $datain);
            $this->send_email_buyer($email);

            $msg=3;
        }

        $path=base_url()."Landing/landing/".$msg;
        redirect($path);

    }

    public function search_unique(){
        $type=$this->input->post("type");
        $search_data=$this->input->post("search_data");
        // $type="organization";
        // $search_data="philip@gmail.com";

        $check_u = $this->user_model->get_row_by_2_values("user", "type", $type, "email", $search_data);
        if($check_u) echo "yes";
    }

    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
    private function hash_password($password){
       return password_hash($password, PASSWORD_BCRYPT);
    }
     
}
