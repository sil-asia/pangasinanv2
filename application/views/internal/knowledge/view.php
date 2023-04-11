<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('internal/common/header')?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php $this->load->view('internal/common/sidebar.php')?>

       <?php $this->load->view('internal/common/page_head.php')?>

        <!-- top navigation -->
        
        <!-- /top navigation -->

        <div class="right_col" role="main">
            <h3> <?php echo $module;?></h3>

            <div class="col-md-13 ">


                    <div class="x_panel">
                                <div class="x_title">
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo(base_url().'knowledge/list_all')?>">Resource Center</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Resource Material</li>
                              </ol>
                            </nav>

                                    <h2>Knowledge Material<small> Knowledge Materials can be edited</small></h2>
                                    <br/>
                                    <br/>
                                    <?php echo ($msg);?>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($action); ?>">

                                        <?php if($info_type == 1){?>

                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Knowledge Material Download</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                            <a href = "<?php echo(base_url().'Knowledge/file_download/'. $id); ?>"><label class="control-label col-md-3 col-sm-3 ">DOWNLOAD LINK</label></a>
                                            </div>
                                        </div>
                                    <?php } else if($info_type == 2){?>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Link Shared</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                            <a href = "<?php echo($file_name);?>" target="_blank" rel="noopener noreferrer" > 
                                                <label class="control-label col-md-3 col-sm-3 ">URL LINK</label></a>
                                            </div>
                                        </div>
                                        <?} else{?>
                                            <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Video Shared</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                            <?php echo($file_name); ?>
                                           
                                            </div>
                                        </div>
                                        <?}?>
                                        
                                         <div class="form-group row ">

                                        <label class="control-label col-md-3 col-sm-3 ">Display Name<span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="name" name = "name" value = "<?php echo $name;?>" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Description:</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                 <textarea  rows="5" class="form-control" placeholder="details" name = "description"><?php echo ($description); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Item</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select tabindex="1" data-placeholder="Select here.." id = "product_line" name = "product_line" class="form-control">


                                                    <?php foreach ($dd_product_line as $option)
                                                    {
                                                        echo ("<option value = '");
                                                        echo ($option->product_lineID);
                                                         echo("'");
                                                        if ($product_line == $option->product_lineID)
                                                        {
                                                            echo(" selected ");
                                                        }
                                                        echo (">" . $option->name . "</option>");
                                                    }

                                                    ?>

                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Resource Material Type</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select tabindex="1" data-placeholder="Select here.." id = "resource_type" name = "resource_type" class="form-control">
                                                    <?php foreach ($dd_resource_type as $option)
                                                    {
                                                        echo ("<option value = '");
                                                        echo ($option->dd_resourcetypeID);
                                                         echo("'");
                                                        if ($type == $option->dd_resourcetypeID)
                                                        {
                                                            echo(" selected ");
                                                        }
                                                        echo (">" . $option->name . "</option>");

                                                    }?>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9  offset-md-3">
                                                <button type="submit" class="btn btn-success">Edit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                
                </div>
            </div>

            
        
          
          <!-- /top tiles -->
        <!-- footer content -->
         
        <!-- /footer content -->
      </div>
    </div>
</div>

   <?php $this->load->view('internal/common/footer.php')?>
    
    
  </body>
</html>
