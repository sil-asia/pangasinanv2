<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library('table');
        $this->load->model('Knowledge_model');
        $this->load->helper('download');
   if(!($this->session->has_userdata('user'))){
        redirect('landing', 'refresh');

           
        }
    

       
      

    }

    public function index()
    {
         if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }
      
    	$data = array();
        
        $this->load->view('public/landing', $data);
        
    }
    public function list_all($msg =0)
    {
    if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }
       $data = $this->user_header_data();
        $data["msg"] = "";
        if ($msg == 2)
        {
            $data["msg"] ="<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Knowledge material added </strong>  
                                    </div>";
        }
        elseif ($msg == 3)
        {
              $data["msg"] ="<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Knowledge Material deleted </strong>  
                                    </div>";

        }

        $data["module"] = "Knowledge Center";
        $data["dd_product_line"] = $this->Knowledge_model->get_all("product_line");
        $data["product_line"] = "";
        $data["dd_resource_type"] = $this->Knowledge_model->get_all("dd_resourcetype");
        $data["resource_type"] = "";
        $data["dd_resource_file_type"] = $this->Knowledge_model->get_all("dd_resourcefiletype");
        $data["resource_file_type"] = "";
        $files = $this->Knowledge_model->get_all("resource_materials");
        $fi = array();
        foreach($files as $file)
        {
            $fil = new StdClass();
            $fil->name = $file->name;
            $fil->file_name = $file->file_name;
            $fil->id = $file->resource_materialsID;
            $fil->description = $file->description;
            $fil->date_uploaded = $file->date_uploaded;
            $fil->info_type = $file->info_type;
            $fil->resourceType = "";
            $type = $this->Knowledge_model->get_row_by_1_value("dd_resourcetype", "dd_resourcetypeID",$file->dd_resourcetypeID_fk);
            if($type)
            {
                $fil->resourceType = $type->name;
            }
             $fil->resourcefileType = "";
            $filetype = $this->Knowledge_model->get_row_by_1_value("dd_resourcefiletype", "dd_resourcefiletypeID",$file->dd_resourcefiletypeID_fk);
            if($filetype)
            {
                $fil->resourcefileType = $filetype->name;
            }
            $fil->product_line = "";
            $productline = $this->Knowledge_model->get_row_by_1_value("product_line", "product_lineID",$file->product_lineID_fk);
            if($productline)
            {
                $fil->product_line = $productline->name;
            }
            array_push($fi, $fil);


        }
        $data["files"] = $fi;
        
        $data["file_action"] = base_url()."knowledge/do_upload";
        $this->load->view('internal/knowledge/list_all', $data);

    }
    public function view($id, $msg="")
    {
        if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }

        $data = $this->user_header_data();
        
        $data["module"] = "Knowledge Material Management";       
        $data["action"] = base_url()."knowledge/edit/".$id;
        $data["dd_product_line"] = $this->Knowledge_model->get_all("product_line");
        $data["dd_resource_type"] = $this->Knowledge_model->get_all("dd_resourcetype");
        $data["dd_resource_file_type"] = $this->Knowledge_model->get_all("dd_resourcefiletype");
        
        $material = $this->Knowledge_model->get_row_by_1_value('resource_materials', 'resource_materialsID', $id);
        $data["id"] = $id;
        $data["name"] = $material->name;
        $data["file_name"] = $material->file_name;
        $data["type"] = $material->dd_resourcetypeID_fk;
        $data["file_type"] = $material->dd_resourcefiletypeID_fk;
        $data["product_line"] = $material->product_lineID_fk;       
        $data['description'] = $material->description;
        $data['info_type'] = $material->info_type;
        $data['msg'] = $msg;

        $this->load->view('internal/knowledge/view', $data);

    }

   

    public function do_file_upload(){
        if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }

        $baseFPath= base_url().'files/';
        if (!is_dir($baseFPath.'knowledge')) {
            mkdir($baseFPath.'knowledge', 0777, TRUE);
           
        }

        $filePath=FCPATH.'files/'.'knowledge/';
         $config['upload_path']  = $filePath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf|xls|xlsx|csv|text|ppt|pptx';
        $this->load->library('upload', $config);
        $file_data = $this->upload->do_upload('userfile');

        if ( ! $file_data )
        {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                
        }
        else
        {


                $data = array('upload_data' => $this->upload->data());
                $dateT = $this->input->post('date_uploaded');
                $desc = $this->input->post('description');
                $name = $this->input->post('name');
                $product_line = $this->input->post('product_line');
                $resource_type = $this->input->post('resource_type');
                $resource_file_type = $this->input->post('resource_file_type');
                
                $datain = array( 
                        'file_name' => $data["upload_data"]["file_name"],
                        'name' => $name,
                        'description' => $desc,
                        'product_lineID_fk' => $product_line,
                        'dd_resourcetypeID_fk' => $resource_type,
                        'dd_resourcefiletypeID_fk' => $resource_file_type,
                        'date_uploaded' => date('Y-m-d'),
                        'info_type' => 1

                    );
                $msg = 2;

                $imid = $this->Knowledge_model->insert_to_db("resource_materials", $datain);

        }
        

       

        $path=base_url()."knowledge/list_all/$msg";
        redirect($path);
        
    }

    public function share_link()
    {
            if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }
                $dateT = $this->input->post('date_uploaded');
                $link = $this->input->post('userlink');
                $desc = $this->input->post('description');
                $name = $this->input->post('name');
                $product_line = $this->input->post('product_line');
                $resource_type = $this->input->post('resource_type');
                $resource_file_type = $this->input->post('resource_file_type');
                
                $datain = array( 
                        'file_name' => $link,
                        'name' => $name,
                        'description' => $desc,
                        'product_lineID_fk' => $product_line,
                        'dd_resourcetypeID_fk' => $resource_type,
                        'dd_resourcefiletypeID_fk' => $resource_file_type,
                        'date_uploaded' => date('Y-m-d'),
                        'info_type' => 2

                    );
                $msg = 2;

                $imid = $this->Knowledge_model->insert_to_db("resource_materials", $datain);
                $path=base_url()."knowledge/list_all/$msg";
                redirect($path);

    }

 public function upload_video()
    {
        if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }
                $dateT = $this->input->post('date_uploaded');
                $link = $this->input->post('uservideo');
                $desc = $this->input->post('description');
                $name = $this->input->post('name');
                $product_line = $this->input->post('product_line');
                $resource_type = $this->input->post('resource_type');
                $resource_file_type = $this->input->post('resource_file_type');
                
                $datain = array( 
                        'file_name' => $link,
                        'name' => $name,
                        'description' => $desc,
                        'product_lineID_fk' => $product_line,
                        'dd_resourcetypeID_fk' => $resource_type,
                        'dd_resourcefiletypeID_fk' => $resource_file_type,
                        'date_uploaded' => date('Y-m-d'),
                        'info_type' => 3

                    );
                $msg = 2;

                $imid = $this->Knowledge_model->insert_to_db("resource_materials", $datain);
                $path=base_url()."knowledge/list_all/$msg";
                redirect($path);

    }

    public function file_update($iid){
       if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }
        $capt = $this->input->post('e_caption');
        $datetaken = $this->input->post('e_datetaken');
        $imageid = $this->input->post('e_imageid2');

        $datain = array( 
                'description' => $capt,
                'date_uploaded' =>  date('Y-m-d')
            );

        $imid = $this->user_model->update_by_id("knowledge_management_file", "knowledge_management_fileID", $imageid, $datain);

        

        redirect(base_url()."Knowledge/view/".$iid);
    }

        public function file_delete($imid)
    {
        $fname = $this->Knowledge_model->get_row_by_1_value("resource_materials", "resource_materialsID", $imid)->file_name;

        $baseFPath= FCPATH.'files/knowledge/';
        unlink($baseFPath.$fname);
        $this->Knowledge_model->delete_by_1_value("resource_materials", "resource_materialsID", $imid);

        $path=base_url()."knowledge/list_all/3";
        redirect($path);
    }

    public function file_download($id)
    {

        $fname = $this->Knowledge_model->get_row_by_1_value('resource_materials', 'resource_materialsID', $id)->file_name;
        $file = base_url().'files/knowledge/'.$fname;
        $data = file_get_contents($file);
        force_download($fname, $data);
        
        
    }

    public function edit($id)
    {
        if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }
        $data = $this->user_header_data();
        $data["module"] = "Knowledge Material Management";       
        $data["action"] = base_url()."knowledge/edit/".$id;
        $data["dd_product_line"] = $this->Knowledge_model->get_all("product_line");
        $data["dd_resource_type"] = $this->Knowledge_model->get_all("dd_resourcetype");
        $data["dd_resource_file_type"] = $this->Knowledge_model->get_all("dd_resourcefiletype");

        $dateT = $this->input->post('date_uploaded');
        $desc = $this->input->post('description');
        $name = $this->input->post('name');
        $product_line = $this->input->post('product_line');
        $resource_type = $this->input->post('resource_type');
        $resource_file_type = $this->input->post('file_type');

        $datain = array( 
                        'name' => $name,
                        'description' => $desc,
                        'product_lineID_fk' => $product_line,
                        'dd_resourcetypeID_fk' => $resource_type,
                        'dd_resourcefiletypeID_fk' => $resource_file_type,
                        'date_uploaded' => date('Y-m-d')
                    );
     

        $this->Knowledge_model->update_by_id("resource_materials", 'resource_materialsID', $id, $datain);
        $material = $this->Knowledge_model->get_row_by_1_value('resource_materials', 'resource_materialsID', $id);
        $data["id"] = $id;
        $data["name"] = $material->name;
        $data["type"] = $material->dd_resourcetypeID_fk;
        $data["file_type"] = $material->dd_resourcefiletypeID_fk;
        $data["product_line"] = $material->product_lineID_fk;
        $data['description'] = $material->description;
        $data['info_type'] = $material->info_type;
        $data['file_name'] = $material->file_name;
         $data["msg"] ="<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Knowledge material details editted. </strong>  
                                    </div>";
   
        $this->load->view('internal/knowledge/view', $data);


    }
    public function add()
    {
        if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }
        $data = $rhis->user_header_data();
        $data["module"] = "Knowledge Material Management";       
        $data["action"] = base_url()."Knowledge/do_file_upload/";
        $data["dd_product_line"] = $this->Knowledge_model->get_all("product_line");
        $data["dd_resource_type"] = $this->Knowledge_model->get_all("dd_resourcetype");
        $data["dd_resource_file_type"] = $this->Knowledge_model->get_all("dd_resourcefiletype");
          
        $this->load->view('internal/knowledge/add', $data);
        
    }

    public function new_()
    {
        if(!($this->session->has_userdata('user'))){
            redirect('landing', 'refresh');
        }

        $dateT = $this->input->post('date_uploaded');
        $desc = $this->input->post('description');
        $name = $this->input->post('name');
        $product_line = $this->input->post('product_line');
        $resource_type = $this->input->post('resource_type');
        $resource_file_type = $this->input->post('file_type');

        $datain = array( 
                        'name' => $name,
                        'description' => $desc,
                        'product_lineID_fk' => $product_line,
                        'dd_resourcetypeID_fk' => $resource_type,
                        'dd_resourcefiletypeID_fk' => $resource_file_type,
                        'date_uploaded' => date('Y-m-d')
                    );
     

        $this->Knowledge_model->update_by_id("resource_materials", 'resource_materialsID', $id, $datain);
        $material = $this->Knowledge_model->get_row_by_1_value('resource_materials', 'resource_materialsID', $id);
        $data["id"] = $id;
        $data["name"] = $material->name;
        $data["type"] = $material->dd_resourcetypeID_fk;
        $data["file_type"] = $material->dd_resourcefiletypeID_fk;
        $data["product_line"] = $material->product_lineID_fk;
        $data['description'] = $material->description;
         $data["msg"] ="<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Knowledge material details editted. </strong>  
                                    </div>";
 
    }

     
}
