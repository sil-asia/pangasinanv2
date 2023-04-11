 <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="profile-tab">
 		<div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($password_action); ?>">

                                        <h4> Change Password</h4>

                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Password: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="password" class="form-control" id="password" name = "password" value = "<?php echo $user->password;?>" >
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Confirm Password</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="password" class="form-control" id="c_password" name = "c_password" value = "<?php echo $user->password;?>" >
                                            </div>
                                        </div>
                                    <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9  offset-md-3">
                                                <button type="submit" class="btn btn-success">Change Password</button>
                                            </div>
                                        </div>

                                    </form>

                                 <?php if ($role == "Admin"){?>

                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($status_action); ?>">

                               

                                <h4> Update Status</h4>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Account Status</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select tabindex="1" data-placeholder="Select here.." id = "status" name = "status" class="form-control">
                                                  <option value = 0 <?php if ($user->status == 0) {echo ('selected');}?>>Approved</option>
                                                  <option value = 1 <?php if ($user->status == 1) {echo ('selected');}?>>Pending</option>
                                                  <option value = 2 <?php if ($user->status == 2) {echo ('selected');}?>>Disapproved</option>   
                                                </select>
                                            </div>
                                        </div>



                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9  offset-md-3">
                                                <button type="submit" class="btn btn-success">Update Status</button>
                                            </div>
                                        </div>

                                    </form>
                                <?php }?>
                                </div>
 </div>


