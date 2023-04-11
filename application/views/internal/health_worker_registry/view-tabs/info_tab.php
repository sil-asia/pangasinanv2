 <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($action); ?>">

                                        <div class="form-group row">
                                            <div class="col-md-9 col-sm-9  offset-md-9">
                                                <button type="submit" class="btn btn-success">Edit Health Worker Information</button>
                                            </div>
                                        </div>


                                        <h4> Health Worker Details</h4>

                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Health Worker Last Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="last_name" name = "last_name" value = "<?php echo $hwr->last_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Health Worker First Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="first_name" name = "first_name" value = "<?php echo $hwr->first_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Health Worker Middle Name<span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="middle_name" name = "middle_name" value = "<?php echo $hwr->middle_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Health Worker Suffix Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="suffix_name" name = "suffix_name" value = "<?php echo $hwr->suffix;?>" >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="ln_solid"></div>
                                        <h4> Personal Details </h4>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Birth Date: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="date" required class="form-control" id="birth_date" name = "birth_date" value = "<?php echo $hwr->date_of_birth;?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Gender </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "gender" name = "gender" class="form-control">
                                                  <?php foreach($dd_gender as $key){?>
                                                    <option value = <?php echo $key->dd_genderID; if ($key->dd_genderID == $hwr->gender){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>
                                         
                                        <div class="ln_solid"></div>
                                        <h4> Professional Details </h4>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Type</label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "type" name = "type" class="form-control">
                                                  <?php foreach($type as $key){?>
                                                    <option value = <?php echo $key->id; if ($key->id == $hwr->type){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>
                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Health Facility</label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "facility" name = "facility" class="form-control">
                                                  <?php foreach($facility as $key){?>
                                                    <option value = <?php echo $key->id; if ($key->id == $hwr->facility){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>
                                        
                                     <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Status</label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "status" name = "status" class="form-control">
                                                  <?php foreach($status as $key){?>
                                                    <option value = <?php echo $key->id; if ($key->id == $hwr->status){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>

                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Date Approved: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input readonly type="date" required class="form-control" id="date_approved" name = "date_approved" value = "<?php echo $hwr->approved_date;?>" >
                                            </div>
                                        </div>

                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Philhealth Number: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" required class="form-control" id="philhealth" name = "philhealth" value = "<?php echo $hwr->philhealth_no;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">PRC </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" required class="form-control" id="prc" name = "prc" value = "<?php echo $hwr->PRC;?>" >
                                            </div>
                                        </div>

                                           
                                        
                                       
                                               
                                            </div>
                                        </div>
                                        

                                    </form>
                                </div>
</div>
