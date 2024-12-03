<?php 
$states = $this->db->get('states')->result_array(); 
$countries = $this->db->get('countries')->result_array(); 
$edit_teacher=	$this->db->get_where('student' , array('student_id' => $param2) )->result_array();
foreach ( $edit_teacher as $key => $student):
?>

            <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('edit_student');?></div>
						
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                    <?php echo form_open(base_url() . 'admin/new_student/update/'. $student['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                                
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" value="<?php echo $student['name'];?>"/>
                                </div>
                            </div>
										
					  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date of birth');?></label>
                    <div class="col-sm-12">
                                    <input type="date" class="datepicker form-control" name="birthday" value="<?php echo $student['birthday'];?>"/>
                                </div>
                            </div>					
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="email" value="<?php echo $student['email']; ?>" >
						</div> 
					</div>
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('address');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="address" value="<?php echo $student['address'];?>"/>
                                </div>
                            </div>
												
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="phone" value="<?php echo $student['phone']; ?>" >
						</div> 
					</div>
					<!-- Country Selection -->
                    <div class="form-group row">
                        <label for="country" class="col-md-12"><?php echo get_phrase('Country'); ?></label>
                        <div class="col-md-6">
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Country</option>
                                <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['id']; ?>" <?php echo ($student['country'] == $country['id']) ? 'selected' : ''; ?>>
                                        <?php echo $country['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="state" id="state" class="form-control" <?php echo ($student['country']) ? '' : 'disabled'; ?>>
                                <option value="">Select State</option>
                                <?php foreach ($states as $state): ?>
                                    <option value="<?php echo $state['id']; ?>" <?php echo ($student['state'] == $state['id']) ? 'selected' : ''; ?>>
                                        <?php echo $state['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                   <!-- Part B: Father's Info -->
                   <div class="alert alert-success text-center mt-4">
                       <strong><?php echo get_phrase('Admission Form'); ?> - PART B</strong>
                   </div>

                   <!-- Father's Name -->
                   <div class="form-group row">
                       <label class="col-md-12" for="father_name"><?php echo get_phrase("Father's Name"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="father_name" value="<?php echo $student['father_name'];?>" required>
                       </div>
                   </div>

                   <!-- Father's Date of Birth -->
                   <div class="form-group row">
                       <label class="col-md-12" for="father_dob"><?php echo get_phrase("Father's Date of Birth"); ?></label>
                       <div class="col-sm-12">
                           <input type="date" class="form-control" name="father_dob" value="<?php echo $student['father_dob'];?>" required>
                       </div>
                   </div>

                   <!-- Father's Address -->
                   <div class="form-group row">
                       <label class="col-md-12" for="father_address"><?php echo get_phrase("Father's Address"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="father_aaddress" value="<?php echo $student['father_aaddress'];?>" required>
                       </div>
                   </div>
                   
                   <!-- Father's Address -->
                   <div class="form-group row">
                       <label class="col-md-12" for="father_address"><?php echo get_phrase("father aadhaar Card/National ID"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="father_aadhaar" value="<?php echo $student['father_aadhaar'];?>" required>
                       </div>
                   </div>
                   
                   <!-- Father's Address -->
                   <div class="form-group row">
                       <label class="col-md-12" for="father_address"><?php echo get_phrase("father profession"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="father_profession" value="<?php echo $student['father_profession'];?>" required>
                       </div>
                   </div>

                   <!-- Father's Phone -->
                   <div class="form-group row">
                       <label class="col-md-12" for="father_phone"><?php echo get_phrase("Father's Mobile Number"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="father_mobile_number" value="<?php echo $student['father_mobile_number'];?>" required>
                       </div>
                   </div>

                    <!-- mother's Address -->
                    <div class="form-group row">
                       <label class="col-md-12" for="father_gotra"><?php echo get_phrase("father gotra"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="father_gotra" value="<?php echo $student['father_gotra'];?>" required>
                       </div>
                   </div>

                   <!-- Mother's Phone -->
                   <div class="form-group row">
                       <label class="col-md-12" for="father_varna"><?php echo get_phrase("father_varna"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="father_varna" value="<?php echo $student['father_varna'];?>" required>
                       </div>
                   </div>

                   <!-- Mother's Name -->
                   <div class="form-group row">
                       <label class="col-md-12" for="mother_name"><?php echo get_phrase("Mother's Name"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_name" value="<?php echo $student['mother_name'];?>" required>
                       </div>
                   </div>

                   <!-- Mother's Date of Birth -->
                   <div class="form-group row">
                       <label class="col-md-12" for="mother_dob"><?php echo get_phrase("Mother's Date of Birth"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_dob" value="<?php echo $student['mother_dob'];?>" required>
                       </div>
                   </div>

                   <!-- Mother's Address -->
                   <div class="form-group row">
                       <label class="col-md-12" for="mother_address"><?php echo get_phrase("Mother's Address"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_aaddress" value="<?php echo $student['mother_aaddress'];?>" required>
                       </div>
                   </div>

                    <!-- mother's Address -->
                    <div class="form-group row">
                       <label class="col-md-12" for="mother_aadhaar"><?php echo get_phrase("mother aadhaar Card/National ID"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_aadhaar" value="<?php echo $student['mother_aadhaar'];?>" required>
                       </div>
                   </div>
                   
                   <!-- mother's Address -->
                   <div class="form-group row">
                       <label class="col-md-12" for="mother_address"><?php echo get_phrase("mother profession"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_profession" value="<?php echo $student['mother_profession'];?>" required>
                       </div>
                   </div>

                   <!-- Mother's Phone -->
                   <div class="form-group row">
                       <label class="col-md-12" for="mother_phone"><?php echo get_phrase("Mother's Mobile Number"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_mobile_number" value="<?php echo $student['mother_mobile_number'];?>" required>
                       </div>
                   </div>

                    <!-- mother's Address -->
                    <div class="form-group row">
                       <label class="col-md-12" for="mother_gotra"><?php echo get_phrase("mother gotra"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_gotra" value="<?php echo $student['mother_gotra'];?>" required>
                       </div>
                   </div>

                   <!-- Mother's Phone -->
                   <div class="form-group row">
                       <label class="col-md-12" for="mother_varna"><?php echo get_phrase("mother_varna"); ?></label>
                       <div class="col-sm-12">
                           <input type="text" class="form-control" name="mother_varna" value="<?php echo $student['mother_varna'];?>" required>
                       </div>
                   </div>
  
<div class="form-group">
<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo get_phrase('update_teacher');?></button>
</div>
                <?php echo form_close();?>
</div>
</div>
</div>
</div>
</div>

<?php endforeach;?>
<script type="text/javascript">
document.getElementById('country').addEventListener('change', function () {
    const countryId = this.value;
    const stateDropdown = document.getElementById('state');
 
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