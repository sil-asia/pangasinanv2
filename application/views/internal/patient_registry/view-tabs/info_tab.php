 <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($action); ?>">

                                        <div class="form-group row">
                                            <div class="col-md-9 col-sm-9  offset-md-9">
                                                <button type="submit" class="btn btn-success">Edit Patient Information</button>
                                            </div>
                                        </div>


                                        <h4> Patient Details</h4>

                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Patient Last Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="last_name" name = "last_name" value = "<?php echo $patient->last_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Patient First Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="first_name" name = "first_name" value = "<?php echo $patient->first_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Patient Middle Name<span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="middle_name" name = "middle_name" value = "<?php echo $patient->middle_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Patient Suffix Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="suffix_name" name = "suffix_name" value = "<?php echo $patient->suffix;?>" >
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid"></div>

                                        <h4> Address </h4>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Region:  <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "i_region" name = "i_region" class="form-control">
                                                     <option value=''>-- Select a Region --</option>    
                                                
                                                                        
                                                </select>
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Province: <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select  tabindex="1" data-placeholder="Select here.." id = "i_province" name = "i_province" class="form-control">
                                                    <option value=''>-- Select a Province --</option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Municipality: <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select  tabindex="1" data-placeholder="Select here.." id = "i_muncity" name = "i_muncity" class="form-control">
                                                    <option value=''>-- Select a City/Municipality --</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Barangay: <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select  tabindex="1" data-placeholder="Select here.." id = "i_bgy" name = "i_bgy" class="form-control">
                                                    <option value=''>-- Select a Barangay --</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Street Name: <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="street" name = "street" value = "<?php echo $patient->street_address;?>" >
                                            </div>
                                        </div>
                                      
                                       
                                        <div class="ln_solid"></div>
                                        <h4> Personal Details </h4>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Birth Date: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="date" required class="form-control" id="birth_date" name = "birth_date" value = "<?php echo $patient->birth_date;?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Gender </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "gender" name = "gender" class="form-control">
                                                  <?php foreach($dd_gender as $key){?>
                                                    <option value = <?php echo $key->dd_genderID; if ($key->dd_genderID == $patient->gender){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>
                                         
                                        <div class="ln_solid"></div>
                                        <h4> Profiling Details </h4>
                                        
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Philhealth Number</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" required class="form-control" id="philhealth" name = "philhealth" value = "<?php echo $patient->philhealth_no;?>" >
                                            </div>
                                        </div>

                                     <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Profile </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "profiled" name = "profiled" class="form-control">
                                                  <?php foreach($profile as $key){?>
                                                    <option value = <?php echo $key->id; if ($key->id == $patient->profiled){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>



                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Date Profiled: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input readonly type="date" required class="form-control" id="date_profiled" name = "date_profiled" value = "<?php echo $patient->date_profiled;?>" >
                                            </div>
                                        </div>

                                           <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Source </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "source" name = "source" class="form-control">
                                                  <?php foreach($dd_source as $key){?>
                                                    <option value = <?php echo $key->sourceID; if ($key->sourceID == $patient->source){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>


                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Health Facility </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "facility" name = "facility" class="form-control">
                                                  <?php foreach($facility as $key){?>
                                                    <option value = <?php echo $key->id; if ($key->id == $patient->facility){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>
                                       
                                        
                                       
                                               
                                            </div>
                                        </div>
                                        
                                       

                                    </form>
                                </div>
</div>
