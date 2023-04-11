<div class="reveal" id="patient-modal" data-reveal>
  <form action="<?php echo $action_signup_patient; ?>" method="post">
    <h4> Patient Signup</h4>
  <div class="row">
    <div class="large-12 columns">
        <label>First Name <span class="required-field"></span></label>
        <input required type="text" class="form-control" id="fname" name="fname" placeholder="Your first name...">
    </div>
  </div>
   <div class="row">
    <div class="large-12 columns">
        <label>Middle Name</label>
        <input type="text" class="form-control" id="mname" name="mname" placeholder="Your middle name...">
    </div>
  </div>
   <div class="row">
    <div class="large-12 columns">
        <label>Last Name<span class="required-field"></span></label>
        <input required type="text" class="form-control" id="lname" name="lname" placeholder="Your last name...">
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
        <label>Suffix<span class="required-field"></span></label>
                        <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Your name suffix...">
    </div>
    <div class="large-12 columns">
        <label>Gender<span class="required-field"></span></label>
                                                <select required tabindex="1" data-placeholder="Select here.." id = "gender" name = "gender" class="form-control">
                                                      <option> Select Gender </option>
                                                  <?php foreach($gender as $key){?>

                                                    <option value = <?php echo $key->dd_genderID?>> <?php echo $key->name;?></option>
                                                  <?php } ?>  
                                                </select>
    </div>
    <div class="large-12 columns">
       <label >Philhealth Number</label>
       <input type="text" class="form-control" id="philhealth" name="philhealth" placeholder="Philhealth Number ">
    </div>
    <div class="large-12 columns">
        <label >Birth Date</label>
        <input required type="date" class="form-control" id="bdate" name="bdate" placeholder="Birth Date ">
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>Health Facility<span class="required-field"></span></label>                            <select required tabindex="1" data-placeholder="Select here.." id = "facility" name = "facility" class="form-control">                                                        <option> Select Health Facility </option>
                                                  <?php foreach($facilities as $key){?>

                                                    <option value = <?php echo $key->id?>> <?php echo $key->name;?></option>
                                                  <?php } ?>  
                                                </select>
                    
    </div>
  </div>

  <h5> Address </h5>
  <div class="row">
    <div class="large-12 columns">
       <label> Region:  <span class="required-field"></label>
                                            
              <select required tabindex="1" data-placeholder="Select here.." id = "i_region" name = "i_region" class="form-control">
              <option value=''>-- Select a Region --</option>    
                <?php
                    foreach($region as $reg){
                      echo "<option value='".$reg['regionID']."'>".$reg['region']."</option>";
                      }
                ?>
                                                                        
            </select>
    </div>
      <div class="large-12 columns">
       <label> Province  <span class="required-field"></label>
        <select  tabindex="1" data-placeholder="Select here.." id = "i_province" name = "i_province" class="form-control">
          <option value=''>-- Select a Province --</option>
         </select>
    </div>
      <div class="large-12 columns">
     <label> City / Municipality  <span class="required-field"></label>
                                            
      <select  tabindex="1" data-placeholder="Select here.." id = "i_muncity" name = "i_muncity" class="form-control">
        <option value=''>-- Select a City/Municipality --</option>
      </select>
    </div>
      <div class="large-12 columns">
       <label> Barangay  <span class="required-field"></label>
                                          
        <select  tabindex="1" data-placeholder="Select here.." id = "i_bgy" name = "i_bgy" class="form-control">
      <option value=''>-- Select a Barangay --</option>
                                                    
                                                </select>
    </div>
       <div class="large-12 columns">
       <label> Street Name<span class="required-field"></label>
            <input required type="text" class="form-control" id="street" name = "street" >
    </div>


      <div class="large-12 columns">
         <div class="callout success">
            <h5>Consent</h5>

            I am giving consent to the Pangasinan Health Facility...

            <br/>
            <input required id="checkbox12" type="checkbox"><label for="checkbox12">Yes</label>
                      
          </div>
    </div>




    <div class="large-12 columns">
      <button class="primary button" name="patient_register" id="patient_register">Register</button>
    </div>

</form>
 <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>
</div>
