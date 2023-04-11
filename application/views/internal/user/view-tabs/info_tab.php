 <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($action); ?>">

                                        <h4> Organization Details</h4>

                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Organization Name: <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="org_name" name = "org_name" value = "<?php echo $org->business_name;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Legal Name: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="legal_name" name = "legal_name" value = "<?php echo $org->legal_entity_name;?>" >
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>

                                        <h4> Address </h4>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Region:  <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "i_region" name = "i_region" class="form-control">
                                                     <option value=''>-- Select a Region --</option>    
                                                <?php
                                                    foreach($region as $reg){
                                                        echo "<option value='".$reg['regionID']."'>".$reg['region']."</option>";
                                                    }
                                                ?>
                                                                        
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
                    
                                                <input required type="text" class="form-control" id="street" name = "street" value = "<?php echo $org->street;?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">House/Building No./Building Name: <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="building" name = "building" value = "<?php echo $org->building;?>" >
                                            </div>
                                        </div>

                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">ZIP Code: <span class="required-field"></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="zip" name = "zip" value = "<?php echo $org->ZIP;?>" >
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <h4> Contact Details </h4>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Email Address: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input readonly ype="text" required class="form-control" id="email" name = "email" value = "<?php echo $user->email;?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Mobile Number: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" required class="form-control" id="mobile" name = "mobile" value = "<?php echo $org->mobile_number;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Telephone Number: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="fax" name = "fax" value = "<?php echo $org->fax_number;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Social Media/Website</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="social_media" name = "social_media" value = "<?php echo $org->social_media;?>" >
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <h4> Contact Person </h4>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Contact Person: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="contact_person" name = "contact_person" value = "<?php echo $org->contact_person;?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Designation: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" required class="form-control" id="designation_cp" name = "designation_cp" value = "<?php echo $org->designation_cp;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Mobile Number: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="mobile_cp" name = "mobile_cp" value = "<?php echo $org->mobile_cp;?>" >
                                            </div>
                                        </div>
                                          <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Email Address: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="email_cp" name = "email_cp" value = "<?php echo $org->email_cp;?>" >
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <h4> Organization Details </h4>

                                      <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Form of Organization: <span class="required-field"></span> </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "organization_form" name = "organization_form" class="form-control">
                                                    <option value = ""> Select a form of organization</option>
                                                    <?php foreach ($dd_organization_form as $option)
                                                    {
                                                        echo ("<option value = '");
                                                        echo ($option->dd_organization_formID);
                                                         echo("'");
                                                        if ($org->organization_formID_fk == $option->dd_organization_formID)
                                                        {
                                                            echo(" selected ");
                                                        }
                                                        echo (">" . $option->name . "</option>");
                                                    }?>
                                                    
                                                </select>
                                            </div>
                                        </div>


                                        
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Industry Classification  <span class="required-field"></span> </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "industry" name = "industry" class="form-control">
                                                    <option value = ""> Select industry classification</option>
                                                    <?php foreach ($dd_industry_classification as $option)
                                                    {
                                                        echo ("<option value = '");
                                                        echo ($option->dd_industry_classificationID);
                                                         echo("'");
                                                        if ($org->industry_classificationID_fk == $option->dd_industry_classificationID)
                                                        {
                                                            echo(" selected ");
                                                        }
                                                        echo (">" . $option->name . "</option>");
                                                    }?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Number of employees</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="number" class="form-control" id="number_e" name = "number_e" value = "<?php echo $org->number_employee;?>" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Asset Size  <span class="required-field"></span> </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "asset_size" name = "asset_size" class="form-control">
                                                    <option value=""> Select asset size </option>
                                                    <?php foreach ($dd_asset_size as $option)
                                                    {
                                                        echo ("<option value = '");
                                                        echo ($option->dd_asset_sizeID);
                                                         echo("'");
                                                        if ($org->asset_sizeID_fk == $option->dd_asset_sizeID)
                                                        {
                                                            echo(" selected ");
                                                        }
                                                        echo (">" . $option->name . "</option>");
                                                    }?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Principal Product/Services</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="principal_product" name = "principal_product" value = "<?php echo $org->principal_product;?>" >
                                            </div>
                                        </div>
                                       
                                      
                                        


                                        <h4> Items </h4>
                                            <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 "></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <div class = "text-right">
                                                    <a href="#addPL" data-toggle="modal" data-backdrop= "static" data-keyboard="false" 
                                                            data-id="<?php echo $id; ?>">
                                                           <b>+Add Item</b>
                                                        </a>
                                                </div>
                                                <?php 
                                                if ($product_lines)
                                                {

                                                    foreach ($product_lines as $pl)
                                                    {
                                                    ?>
                                                    
                                                    <i onClick = "delete_product_line('<?php echo ($pl->name); ?>',<?php echo($id) ?>,<?php echo ($pl->product_lineID); ?>)" class = "fa fa-trash"></i>

                                                    <?php
                                                    echo ($pl->name);
                                                    echo ("<br/>");
                                                }
                                            }?>
                    
                                               
                                            </div>
                                        </div>
                                        





                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9  offset-md-3">
                                                <button type="submit" class="btn btn-success">Edit User Information</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
</div>
