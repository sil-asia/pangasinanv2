 <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($action); ?>">

                                        <div class="form-group row">
                                            <div class="col-md-9 col-sm-9  offset-md-9">
                                                <button type="submit" class="btn btn-success">Edit Facility Information</button>
                                            </div>
                                        </div>

                                <h4> Facility Details </h4>



                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Facility Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input readonly type="text" class="form-control" id="name" name = "name" value = "<?php echo $facility->name;?>" >
                                            </div>
                                        </div>


                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Philhealth ID <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="philhealth" name = "philhealth" value = "<?php echo $facility->philhealthID;?>" >
                                            </div>
                                        </div>

                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Status (Approved) </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "status" name = "status" class="form-control">
                                                  <?php foreach($status as $key){?>
                                                    <option value = <?php echo $key->id; if ($key->id == $facility->status){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>

                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Bed Capacity  </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="number" class="form-control" id="capacity" name = "capacity" value = "<?php echo $facility->capacity;?>" >
                                            </div>
                                            
                                         </div>
                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Current Bed Load</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="number" class="form-control" id="current_load" name = "current_load" value = "<?php echo $facility->current_load;?>" >
                                            </div>
                                            
                                         </div>
                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Approval Date </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input readonly type="date" class="form-control" id="approval_date" name = "approval_date" value = "<?php echo $facility->approval_date;?>" >
                                            </div>
                                            
                                         </div>

                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Level </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "level" name = "level" class="form-control">
                                                  <?php foreach($level as $key){?>
                                                    <option value = <?php echo $key->levelID; if ($key->levelID == $facility->level){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>

                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Ownership </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "ownership" name = "ownership" class="form-control">
                                                  <?php foreach($ownership as $key){?>
                                                    <option value = <?php echo $key->ownershipID; if ($key->ownershipID == $facility->ownership){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>

                                         
                                        <div class="ln_solid"></div>

                                        <h4> Address </h4>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Region:  <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select tabindex="1" data-placeholder="Select here.." id = "i_region" name = "i_region" class="form-control">
                                                     <option value=''>-- Select a Region --</option>    
                                               
                                                                        
                                                </select>
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Province: <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select tabindex="1" data-placeholder="Select here.." id = "i_province" name = "i_province" class="form-control">
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
                    
                                                <input required type="text" class="form-control" id="street" name = "street" value = "<?php echo $facility->street_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Latitude  </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input  class="form-control" id="latitude" name = "latitude" value = "<?php echo $facility->latitude;?>" >
                                            </div>
                                            
                                         </div>
                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Longtitude</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input  class="form-control" id="longtitude" name = "longtitude" value = "<?php echo $facility->longtitude;?>" >
                                            </div>
                                      
                                       
                                        
                                        
                              
                                        
                                    </form>
                                </div>
</div>
