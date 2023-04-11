 <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="profile-tab">
 		<br/>
 	          <div style="display: flex; justify-content: flex-end">
                    <button type='button' class="btn btn-primary" href="#fileUpload" data-toggle="modal" data-backdrop="static" data-keyboard="false" > Upload a File</button>     
                </div>
                 <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead  align = "center">
                                            <tr>
                                                <th width="5%" scope='col' ></th>
                                                <th width="35%" scope='col' >Image</th>
                                                <th width="10%" scope='col' >Date Uploaded</th>
                                                <th width="20%" scope='col' >Description</th>
                                                <th width="10%" scope='col' >Tag</th>
                                                <th width="20%" scope='col' >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                if($files){
                                                    foreach ($files as $file){
                                                ?>
                                                        
                                                        <tr>
                                                            
                                                            <td><?php echo $i+1; ?>
                                                                
                                                            </td>
                                                            <td >
                                                                
                                                               <a href = "<?php echo(base_url().'Product/file_download/'.$file->id.'/'.$id); ?>" > <?php echo ($file->name); ?> </a>
                                                            </td>
                                                            <td><?php echo $file->date_uploaded ?></td>
                                                               <td><?php echo $file->description ?></td>
                                                            <td>
                                                                <?php 
                                                                     echo $file->tag ?>
                                                            </td>
                                                            
                                                                <td class = "d-print-none">
                                                                   
                                                                    <a type='submit' class="btn btn-primary" href="#fileUpdate" data-toggle="modal" data-backdrop="static" data-keyboard="false"
                                                                        data-id="<?php echo $file->id; ?>"
                                                                        data-name="<?php echo $file->name; ?>"
                                                                        data-description="<?php echo $file->description; ?>"
                                                                        data-date_uploaded="<?php echo $file->date_uploaded; ?>"
                                                                        data-tagID = "<?php echo $file->tagID; ?>" 
                                                                        > Edit Caption
                                                                    </a>
                                                                    </br>
                                                                    <button name="bot" type="submit" href="#imageUpdate" onClick="myfunction2('<?php echo $file->name; ?>','<?php echo $file->id; ?>')" data-toggle="modal" id="delB" class="btn btn-danger"> Delete</button>
                                                                </td>
                                                          
                                                        </tr>
                                                <?php
                                                    $i++;
                                                    }
                                                }
                                                    ?>
                                        </tbody>
        </table>


 </div>


