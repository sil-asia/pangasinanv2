<div class="reveal" id="facility-modal" data-reveal>
  <form action="<?php echo $action_signup_facility; ?>" method="post">
    <h4> Facility Sign Up</h4>
  <div class="row">
    <div class="large-12 columns">
        <label>Name <span class="required-field"></span></label>
        <input required type="text" class="form-control" id="name" name="name" placeholder="Facility Name">
    </div>
  </div>
   <div class="row">
    <div class="large-12 columns">
        <label>Philhealth Number <span class="required-field"></span></label>
        <input required type="text" class="form-control" id="philhealth" name="philhealth" placeholder="Philhealth Number">
    </div>
  </div>
   <div class="row">
    <div class="large-12 columns">
           <label>Level<span class="required-field"></span></label>
                                                <select required tabindex="1" data-placeholder="Select here.." id = "level" name = "level" class="form-control">
                                                      <option> Select Level</option>
                                                  <?php foreach($level as $key){?>

                                                    <option value = <?php echo $key->levelID?>> <?php echo $key->name;?></option>
                                                  <?php } ?>  
                                                </select>
    </div>
  </div>
   <div class="row">
    <div class="large-12 columns">
        <label>Ownership<span class="required-field"></span></label>
                                                <select required tabindex="1" data-placeholder="Select here.." id = "ownership" name = "ownership" class="form-control">
                                                      <option> Select Ownership</option>
                                                  <?php foreach($ownership as $key){?>

                                                    <option value = <?php echo $key->ownershipID?>> <?php echo $key->name;?></option>
                                                  <?php } ?>  
                                                </select>
    </div>
  </div>
 

  <h5> Address </h5>
  <div class="row">
    <div class="large-12 columns">
       <label> Region:  <span class="required-field"></label>
                                            
              <select required tabindex="1" data-placeholder="Select here.." id = "i_region2" name = "i_region2" class="form-control">
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
        <select  tabindex="1" data-placeholder="Select here.." id = "i_province2" name = "i_province2" class="form-control">
          <option value=''>-- Select a Province --</option>
         </select>
    </div>
      <div class="large-12 columns">
     <label> City / Municipality  <span class="required-field"></label>
                                            
      <select  tabindex="1" data-placeholder="Select here.." id = "i_muncity2" name = "i_muncity2" class="form-control">
        <option value=''>-- Select a City/Municipality --</option>
      </select>
    </div>
      <div class="large-12 columns">
       <label> Barangay  <span class="required-field"></label>
                                          
        <select  tabindex="1" data-placeholder="Select here.." id = "i_bgy2" name = "i_bgy2" class="form-control">
      <option value=''>-- Select a Barangay --</option>
                                                    
                                                </select>
    </div>
       <div class="large-12 columns">
       <label> Street Name<span class="required-field"></label>
            <input required type="text" class="form-control" id="street" name = "street" >
    </div>
    <div class="large-12 columns">
       <label> Geolocation<span class="required-field"></label>
            <input required type="text" class="form-control" id="geolocation" name = "geolocation" >
    </div>
    <div class="large-12 columns">
      <button class="primary button">Register</button>
    </div>

</form>
 <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
          </div>