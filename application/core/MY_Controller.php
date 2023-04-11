<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('user_model');
        $this->load->model('location_model');

    }


    public function user_header_data(){
        $data['msg']="";
        $data['u_name'] = $this->session->userdata('name');
        $data['userID'] = $this->session->userdata('userID');
        $data['personID'] = $this->session->userdata('personID');
        $person = $this->user_model->get_row_by_1_value('person', 'personID', $data['personID']);
        $data['role'] = $person->role;


        return $data;
    }

    public function get_loc($bgyID)
      {
        $loc = new StdClass();

        $bgy = $this->Location_model->get_row_by_1_value('barangay', 'barangayID', $bgyID);
        if ($bgy)
        {
            $loc->bgy = $bgy->barangay;
            $loc->bgyID = $bgy->barangayID;
            $mun = $this->Location_model->get_row_by_1_value('municipality_city', 'municipality_cityID', $bgy->muncityID_fk);
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
                        $loc->reg = $reg->region;
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

        }
        else
        {
                        $loc->prov = "";
                        $loc->provID = 0;
                        $loc->reg = "";
                        $loc->regID = 0;
                        $loc->mun = "";
                        $loc->munID = 0;
                        $loc->bgy = "";
                        $loc->bgyID = 0;

        }

        
       return $loc;
      

    }
    
        public function get_address($id)
    {
        $address = "";
        $organization = $this->location_model->get_row_by_1_value('organization', 'organizationID', $id);
        $zip = $organization->ZIP;
        $street = $organization->street;
        $barangay_name = "";
        $barangay = $this->location_model->get_row_by_1_value('barangay', 'barangayID', $organization->barangayID_fk);
        if($barangay)
        {
            $barangay_name = $barangay->barangay;
        }
         $mun_name = "";
        $mun = $this->location_model->get_row_by_1_value('municipality_city', 'municipality_cityID', $organization->muncityID_fk);
        if($mun)
        {
            $mun_name = $mun->muncity;
        }
         $prov_name = "";
        $prov = $this->location_model->get_row_by_1_value('province', 'provinceID', $organization->provinceID_fk);
        if($prov)
        {
            $prov_name = $prov->province;
        }
         $region_name = "";
        $region = $this->location_model->get_row_by_1_value('region', 'regionID', $organization->regionID_fk);
        if($region)
        {
            $region_name = $region->region;
        }
        $address = $street. ", ". $barangay_name. ", ". $mun_name. ", ". $prov_name. ", ". $region_name. " ". $zip;
        return $address;

    }



}
?>