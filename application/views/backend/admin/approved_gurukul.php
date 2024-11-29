				
  <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><?php echo get_phrase('new_school');?>
                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW SCHOOL HERE<i class="btn btn-info btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div>
                            </div>
                            <div class="panel-wrapper collapse out" aria-expanded="true">
                                <div class="panel-body">

                                <?php echo form_open(base_url('admin/gurukul_registration/create'), ['class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data']); ?>
<!-- <div class="row">
    <div class="col-sm-6">

    </div>
    <div class="col-sm-6">

    </div>
</div> -->
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label required">Gurukul Name</label>
                        <input type="text" class="form-control" id="gurukul_name" name="gurukul_name" placeholder="Gurukul Name" required>
                        <span class="text-danger" id="gurukul_name_error"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label required">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required>
                        <span class="text-danger" id="mobile_number_error"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label required">Email</label>
                        <input type="email" class="form-control" id="emailid" name="email" placeholder="Email" required>
                        <span class="text-danger" id="email_error"></span>
                        <span class="" id="emailMessage"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label required">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <span class="text-danger" id="password_error"></span>
                    </div>
                </div>

                <div class="form-group row">
                <label for="country" class="col-md-12"><?php echo get_phrase('Country'); ?></label>
                <div class="col-md-6">
                    <select name="country" id="countrys" class="form-control">
                        <option value="">Select Country</option>
                        <?php foreach ($countries as $country): ?>
                            <option value="<?php echo $country['id']; ?>" <?php echo ($country[0]['country'] == $country['id']) ? 'selected' : ''; ?>>
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
					    <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
                        <div class="col-sm-12">
                        <input type='file' class="form-control" name="userfile"/>
                        <img id="blah" src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" alt="" height="200" width="200"/>

                        </div>
					</div>	
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label required">Address</label>
                        <textarea id="address" class="form-control" name="address" placeholder="Address" rows="3" required></textarea>
                        <span class="text-danger" id="address_error"></span>
                    </div>
                </div>

                <div class="text-line-box-content">
                    <h5 class="my-3">Trust Information</h5>
                    <div class="line"></div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <input type="text" id="trust_name" class="form-control" name="trust_name" placeholder="Trust Name" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <input type="date" class="form-control" id="trust_registration_date" name="trust_registration_date" placeholder="dd/mm/yyyy" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="trust_president_name" name="trust_president_name" placeholder="Trust President Name" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="secretary_name" name="secretary_name" placeholder="Secretary Name" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="treasurer_name" name="treasurer_name" placeholder="Treasurer Name" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div>
                        <input type="text" class="form-control" id="principal_name" name="principal_name" placeholder="Principal Name" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h5 class="my-3">Fund Resources</h5>
                    <div class="mb-3">
                        <select id="fund_resource" class="form-control" name="fund_resource">
                            <option value="education_board_support">Education Board Support</option>
                            <option value="government_support">Government Support</option>
                            <option value="private_donations">Private Donations</option>
                            <option value="donations_from_temples_and_mathas">Donations from Temples and Mathas</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h5 class="my-3">Type of Setup</h5>
                    <div class="mb-3">
                        <select id="type_of_setup" class="form-control" name="setup_type">
                            <option value="Pathshala">Pathshala</option>
                            <option value="Gurukul">Gurukul</option>
                            <option value="Tapovan">Tapovan</option>
                            <option value="Gruh Gurukul">Gruh Gurukul</option>
                            <option value="Adhunik Gurukul">Adhunik Gurukul</option>
                        </select>
                    </div>
                </div>
                <!-- Continue for other sections -->

                <div class="text-line-box-content">
                    <h5 class="my-3">Focus Area</h5>
                    <div class="line"></div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Ved" name="focus_area[]" value="Ved">
                            <label class="form-check-label" for="Ved">Ved</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Shastra_Gurukul" name="focus_area[]" value="Shastra Gurukul">
                            <label class="form-check-label" for="Shastra_Gurukul">Shastra Gurukul</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Kala" name="focus_area[]" value="Kala">
                            <label class="form-check-label" for="Kala">Kala</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Krishi" name="focus_area[]" value="Krishi">
                            <label class="form-check-label" for="Krishi">Krishi</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Yog_Darshan" name="focus_area[]" value="Yog-Darshan">
                            <label class="form-check-label" for="Yog_Darshan">Yog-Darshan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Tantra" name="focus_area[]" value="Tantra">
                            <label class="form-check-label" for="Tantra">Tantra</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Yudh_Kala" name="focus_area[]" value="Yudh Kala">
                            <label class="form-check-label" for="Yudh_Kala">Yudh Kala</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Bhasha" name="focus_area[]" value="Bhasha">
                            <label class="form-check-label" for="Bhasha">Bhasha</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h5 class="my-3">Facilities Available</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="School_Building" name="facilities[]" value="School Building">
                        <label class="form-check-label" for="School_Building">School Building</label><br>
                        <input class="form-check-input" type="checkbox" id="Classrooms" name="facilities[]" value="Classrooms">
                        <label class="form-check-label" for="Classrooms">Classrooms</label><br>
                        <input class="form-check-input" type="checkbox" id="Library" name="facilities[]" value="Library">
                        <label class="form-check-label" for="Library">Library</label><br>
                        <input class="form-check-input" type="checkbox" id="ComputerRoom" name="facilities[]" value="Computer Room">
                        <label class="form-check-label" for="ComputerRoom">Computer Room</label><br>
                        <input class="form-check-input" type="checkbox" id="Kala_Room" name="facilities[]" value="Kala Room">
                        <label class="form-check-label" for="Kala_Room">Kala Room</label><br>
                        <input class="form-check-input" type="checkbox" id="Vyam_Kasha" name="facilities[]" value="Vyam Kasha">
                        <label class="form-check-label" for="Vyam_Kasha">Vyam Kasha</label><br>
                        <input class="form-check-input" type="checkbox" id="Farms" name="facilities[]" value="Farms">
                        <label class="form-check-label" for="Farms">Farms</label><br>
                        <input class="form-check-input" type="checkbox" id="Kitchen" name="facilities[]" value="Kitchen">
                        <label class="form-check-label" for="Kitchen">Kitchen</label><br>
                        <input class="form-check-input" type="checkbox" id="Ashwashala" name="facilities[]" value="Ashwashala">
                        <label class="form-check-label" for="Ashwashala">Ashwashala</label><br>
                        <input class="form-check-input" type="checkbox" id="Workshop" name="facilities[]" value="Workshop">
                        <label class="form-check-label" for="Workshop">Workshop</label><br>
                        <input class="form-check-input" type="checkbox" id="Yagna_Shala" name="facilities[]" value="Yagna Shala">
                        <label class="form-check-label" for="Yagna_Shala">Yagna Shala</label><br>
                        <input class="form-check-input" type="checkbox" id="Gaushala" name="facilities[]" value="Gaushala">
                        <label class="form-check-label" for="Gaushala">Gaushala</label><br>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h5 class="my-3">Registered with Education Board</h5>
                    <div class="mb-3 radioBtnWrap">
                        <input type="radio" id="registered_yes" name="registered_with_education_board" value="Yes" required>
                        <label for="registered_yes">Yes</label><br>
                        <input type="radio" id="registered_no" name="registered_with_education_board" value="No" required>
                        <label for="registered_no">No</label>
                        <div class="mb-3 mt-3">
                            <label for="education_board_name" class="form-label">If Yes, Name of Education Board</label>
                            <br>
                            <input type="text" class="form-control" id="education_board_name" name="education_board_name">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 text-center">
                    <div class="submitBtnWrap mt-3 mb-2">
                        <button type="submit" id="submit-button" class="btn btn-primary btn-md px-4">Submit</button>
                    </div>
                </div>

                <?php echo form_close(); ?>
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
        <?php foreach($principal_student as $key => $principal){ ?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('student', $principal['principal_id']);?>" class="img-circle" width="30px"></td>
                            <td><?php echo $principal['name'];?></td>
                            <td>
                            <?php echo $principal['phone'];?>
                            </td>
                            <td><?php echo $principal['email'];?></td>
                            <td><?php echo $principal['principal_id'];?></td>
                            <td><?php echo $principal['address'];?></td>

                            <td>
														
                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_approved_gurukul/<?php echo $principal['principal_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
							
<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/student/delete/<?php echo $principal['principal_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>


<a href="<?php echo base_url().'uploads/student_image/'.  $principal['file_name'];?>"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-download"></i></button></a>

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