				
  <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><?php echo get_phrase('new_student');?>
                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW STUDENT HERE<i class="btn btn-info btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div>
                            </div>
                            <div class="panel-wrapper collapse out" aria-expanded="true">
                                <div class="panel-body">

								 <?php echo form_open(base_url() . 'admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));
                                 
                                 ?>
                                 
					<div class="row">
                        <div class="col-sm-6">
                            <div class="alert alert-primary"><?php echo get_phrase('Personal information');?></div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('student name');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" required>
                                    <input type="text" class="form-control" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" name="student_number" readonly="true">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('Date Of Birth(DOB)');?></label>
                                <div class="col-sm-12">
                                <input class="form-control m-r-10" name="dob" type="date" value="2018-08-19" id="example-date-input" required>
                                </div> 
                            </div>

                            <div class="form-group row">
                            <label for="country" class="col-md-12"><?php echo get_phrase('Country'); ?></label>
                            <div class="col-md-6">
                                <select name="country" id="countrys" class="form-control">
                                    <option value="">Select Country</option>
                                    <?php foreach ($countries as $country): ?>
                                        <option value="<?php echo $country['id']; ?>" <?php echo ($students[0]['country'] == $country['id']) ? 'selected' : ''; ?>>
                                            <?php echo $country['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                                <div class="col-md-6">
                                    <select name="state" id="states" class="form-control" disabled>
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('home address');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="address" value="" required>
                                </div> 
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('phone');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="phone" value="" required >
                                </div> 
                            </div>

                            <div class="form-group"> 
                                <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
                                <div class="col-sm-12">
                                <input type='file' name="userfile" class="dropify" onChange="readURL(this);" / required>
                                </div>
                            </div>	
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('email');?></label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="email" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('password');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="password" value="" required >
                                </div> 
                            </div>
                            

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('aadhaar Card/National ID');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="aadhaar" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('add class');?></label>
                                <div class="col-sm-12">
                                        <input type="text" class="form-control" name="class" value="" required >
                                    </div> 
                            </div>

                            <hr>
                            <div class="alert alert-primary"><?php echo get_phrase('father information');?></div>
                            <hr>
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('father_name');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="father_name" value="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('Father Date Of Birth(DOB)');?></label>
                                <div class="col-sm-12">
                                <input class="form-control m-r-10" name="father_dob" type="date" value="2018-08-19" id="example-date-input" required>
                                </div> 
                            </div>


                        </div>

                        <div class="col-sm-6">
                                <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('father aadhaar Card/National ID');?></label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" name="father_aadhaar" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('father address');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="father_aaddress" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('father mobile number');?></label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" name="father_mobile_number" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('father profession');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="father_profession" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('father gotra');?></label>
                                <div class="col-sm-12">
                                        <input type="text" class="form-control" name="father_gotra" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('father varna');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="father_varna" value="" required>
                                </div> 
                            </div>

                            <hr>
                            <div class="alert alert-primary"><?php echo get_phrase('mother information');?></div>
                            <hr>
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother_name');?></label>
                                <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mother_name" value="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother Date Of Birth(DOB)');?></label>
                                <div class="col-sm-12">
                                <input class="form-control m-r-10" name="mother_dob" type="date" value="2018-08-19" id="example-date-input" required>
                                </div> 
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother aadhaar Card/National ID');?></label>
                                <div class="col-sm-12">
                                        <input type="number" class="form-control" name="mother_aadhaar" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother address');?></label>
                                <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mother_aaddress" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother mobile number');?></label>
                                <div class="col-sm-12">
                                        <input type="number" class="form-control" name="mother_mobile_number" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother profession');?></label>
                                <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mother_profession" value="" required>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother gotra');?></label>
                                <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mother_gotra" value="" required>
                                    </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother varna');?></label>
                                <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mother_varna" value="" required>
                                </div> 
                            </div>
                        </div>
                    </div>

<div class="form-group">			
<button type="submit" class="btn btn-primary btn-rounded btn-block btn-sm"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_student');?></button>
<img id="install_progress" src="<?php echo base_url() ?>assets/images/loader-2.gif" style="margin-left: 20px; display: none"/>					
</div>			
                    
                <?php echo form_close();?>	
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
					
            <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_students');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('role');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('gurukul id');?></div></th>
                            <th><div><?php echo get_phrase('address');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
        <?php foreach($select_student as $key => $student){ ?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('student', $student['student_id']);?>" class="img-circle" width="30px"></td>
                            <td><?php echo $student['name'];?></td>
                            <td>
                            <?php echo $student['phone'];?>
                            </td>
                            <td><?php echo $student['email'];?></td>
                            <td><?php echo $student['gurukul_id'];?></td>
                            <td><?php echo $student['address'];?></td>

                            <td>
														
                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_student/<?php echo $student['student_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
							
<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/student/delete/<?php echo $student['student_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>


<a href="<?php echo base_url().'uploads/student_image/'.  $student['file_name'];?>"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-download"></i></button></a>

                            </td>
                        </tr>

        <?php } ?>
						
                    </tbody>
                </table>



</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
    
    function get_designation_val(department_id) {
        if(department_id != '')
            $.ajax({
                url: '<?php echo base_url();?>admin/get_designation/' + department_id,
                success: function(response)
                {
                    console.log(response);
                    jQuery('#designation_holder').html(response);
                }
            });
        else
            jQuery('#designation_holder').html('<option value=""><?php echo get_phrase("select_a_department_first"); ?></option>');
    }
    
</script>
<script type="text/javascript">
document.getElementById('countrys').addEventListener('change', function () {
    const countryId = this.value;
    const stateDropdown = document.getElementById('states');
 
    stateDropdown.innerHTML = '<option value="">Select State</option>'; // Clear current options
    stateDropdown.disabled = true;
 
    if (countryId) {
        fetch(`/principal/get-states/${countryId}`)
            .then(response => response.json())
            .then(data => {
                if (data.states && data.states.length > 0) {
                    data.states.forEach(state => {
                        const option = document.createElement('option');
                        option.value = state.id;
                        option.textContent = state.name;
                        stateDropdown.appendChild(option);
                    });
                    stateDropdown.disabled = false;
                } else {
                    stateDropdown.innerHTML = '<option value="">No states available</option>';
                    stateDropdown.disabled = true;
                }
            })
            .catch(error => console.error('Error fetching states:', error));
    }
});
</script>