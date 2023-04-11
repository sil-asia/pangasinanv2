<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . 'google/vendor/autoload.php';

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('dashboard_model');

        if(!($this->session->has_userdata('user'))){
        redirect('landing', 'refresh');

           
        }

        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets and PHP');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig(FCPATH. 'google/credentials.json');
        $service = new Google_Service_Sheets($client);
        $spreadsheetId = "1fTO9IqtwLRrB85Za7eFtb9DsFuQ3gfwxfe54VZBKD_Q"; //It is present in your URL
        $update_range = "patient!A2:G";
        $column = array();
        $patients = $this->dashboard_model->get_all("patient_registry");
        foreach($patients as $patient)
        {
            $pat = $this->dashboard_model->get_row_by_1_value('Patient', 'id', $patient->patient_ID);
            $row = array();
            array_push($row, $patient->patient_ID);
            array_push($row, $patient->gender);
            array_push($row, $patient->barangay);
            array_push($row, $pat->profiled);
            if ($pat->profiled == 1)
            {
                 array_push($row, $pat->date_profiled);
            }
            else
            {
                 array_push($row, "");
            }
           
            array_push($row, $patient->facility);
            array_push($row, $patient->age);
            array_push($column, $row);
        }
        
        $body = new Google_Service_Sheets_ValueRange([
            'values' =>$column
        ]);
      
         $params = [

          'valueInputOption' => 'RAW'

        ];

        
        $update_sheet = $service->spreadsheets_values->update($spreadsheetId, $update_range, $body, $params);
        $update_range2 = "facility!A2:G";
        $column = array();
        $facilities = $this->dashboard_model->get_all("health_facility");
        foreach($facilities as $facility)
        {
           
            $row = array();
            array_push($row, $facility->id);
            array_push($row, $facility->name);
            
            array_push($row, $facility->level);
            array_push($row, $facility->ownership);
            array_push($row, $facility->capacity);
            array_push($row, $facility->current_load);
            array_push($row, $facility->latitude.",".$facility->longtitude);
            array_push($column, $row);
        }
        
        $body2 = new Google_Service_Sheets_ValueRange([
            'values' =>$column
        ]);
      
         $params = [

          'valueInputOption' => 'RAW'

        ];
        $update_sheet = $service->spreadsheets_values->update($spreadsheetId, $update_range2, $body2, $params);

         $update_range3 = "worker!A2:G";
        $column = array();
        $hwrs = $this->dashboard_model->get_all("health_worker_registry");
        foreach($hwrs as $hwr)
        {
           
            $row = array();
            array_push($row, $hwr->hwr_id);
            array_push($row, $hwr->type);
            
            array_push($row, $hwr->facility);
            array_push($row, $hwr->gender);
            array_push($column, $row);
        }
        
        $body3 = new Google_Service_Sheets_ValueRange([
            'values' =>$column
        ]);
      
         $params = [

          'valueInputOption' => 'RAW'

        ];

        
        $update_sheet = $service->spreadsheets_values->update($spreadsheetId, $update_range3, $body3, $params);
        
      
        
      




    }

    public function index()
    {
        $this->view(date('y-m-d'),date('Y-m-d', strtotime('+1 day', strtotime(date('y-m-d')))));
        
    }

    public function view($start, $end)
    {
       
        $data = $this->user_header_data();
        $data['module'] = "General Dashboard";
        



        
        $this->load->view('internal/dashboard/view',$data);

    }

   

   

     
}
