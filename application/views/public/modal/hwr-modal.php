<div class="reveal" id="hwr-modal" data-reveal>
  <form action="<?php echo $action_signup_worker; ?>" method="post">
    <h4> Health Worker Signup</h4>
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
           <label>Health Worker Type<span class="required-field"></span></label>            <select required tabindex="1" data-placeholder="Select here.." id = "type" name = "type" class="form-control">                                                        <option> Select Health Worker Type</option>
                                                  <?php foreach($dd_hwr_type as $key){?>

                                                    <option value = <?php echo $key->id?>> <?php echo $key->name;?></option>
                                                  <?php } ?>  
                                                </select>
                    
    </div>
    <div class="large-12 columns">
       <label >Professional Health Care Provider (accreditation number)</label>
       <input required type="text" class="form-control" id="philhealth" name="philhealth" placeholder="Philhealth Number ">
    </div>
     <div class="large-12 columns">
       <label >PRC Number</label>
       <input required type="text" class="form-control" id="prc" name="prc" placeholder="PRC ">
    </div>
     <div class="large-12 columns">
       <label >PRC Validity Date</label>
       <input required type="date" class="form-control" id="prc_date" name="prc_date" placeholder="PRC ">
    </div>
    <div class="large-12 columns">
        <label >Birth Date</label>
        <input required type="date" class="form-control" id="bdate" name="bdate" placeholder="Birth Date ">
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>Health Facility<span class="required-field"></span></label>                            <select required tabindex="1" data-placeholder="Select here.." id = "facility" name = "facility" class="form-control">                             <option> Select Health Facility </option>
                                                  <?php foreach($facilities as $key){?>

                                                    <option value = <?php echo $key->id?>> <?php echo $key->name;?></option>
                                                  <?php } ?>  
                                                </select>
                    
    </div>
  </div>

 
    <div class="large-12 columns">
      <button class="primary button" >Register</button>
    </div>

</form>
 <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
          </div>