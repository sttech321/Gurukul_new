				
  <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><?php echo $this->lang->line('new_teacher'); ?>
                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('add_new_teacher_here'); ?><i class="btn btn-info btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div>
                            </div>
                            <div class="panel-wrapper collapse out" aria-expanded="true">
                                <div class="panel-body">
								 <?php echo form_open(base_url() . 'admin/teacher/insert/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
					<div class="row">
                    <div class="col-sm-6">
                        <div class="alert alert-primary">Personal DETAILS</div>
                        <hr>

                    <div class="form-group row">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('gurukul name');?></label>
                    <div class="col-sm-12">
                    <?php if ($this->session->userdata('login_type') == 'admin'): ?>
                        <select name="principal_id" id="principal_id" class="form-control">
                            <option value="">Select Gurukul</option>
                            <?php foreach ($principal as $principal_item): ?>
                                <option value="<?php echo $principal_item['principal_id']; ?>">
                                    <?php echo $principal_item['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <!-- Show Principal's Gurukul ID -->
                        <input type="hidden" name="principal_id" value="<?php echo $this->session->userdata('principal_id'); ?>">
                    <?php endif; ?>
						</div>
					</div>
	
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('teacher name');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" id="name" name="name" required>
							<input type="text" class="form-control" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" name="teacher_number" readonly="true">
                            <span class="text-danger" id="name_error"></span>
						</div>
					</div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('date_of_birth'); ?></label>
                    <div class="col-sm-12">
		            <input class="form-control m-r-10" name="birthday" type="date" value="2018-08-19" id="date_of_birth" required>
                    <span class="text-danger" id="date_of_birth_error"></span>
						</div> 
					</div>
                    <div class="form-group row">
                    <label for="country" class="col-md-12"><?php echo $this->lang->line('country'); ?></label>
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
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
                        <div class="col-sm-12">
                        <input type='file' name="userfile" class="dropify" onChange="readURL(this);" / required>
                        </div>
					</div>	
                    
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('email'); ?></label>
                    <div class="col-sm-12">
							<input type="email" class="form-control" id="email" name="email" value="">
                            <span class="text-danger" id="email_error"></span>
						</div>
					</div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('password'); ?></label>
                        <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" name="password" value="" onkeyup="CheckPasswordStrength(this.value)" required>
                        <span class="text-danger" id="password_error"></span>
                        <strong id="password_strength"></strong>
                        </div> 
                    </div>
					
                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('father_name'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="father_name" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('mother_name'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="mother_name" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('surname'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="surname" value="" required>
                        </div> 
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('gotra'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="gotra" value="" >
                        </div> 
                    </div>
					</div>	
					 <div class="col-sm-6">

                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('varna'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="varna" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('aadhaar_card'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="aadhaar" name="aadhaar" value="" required>
                            <span class="text-danger" id="aadhaar_error"></span>
                        </div> 
                    </div>

					 <div class="alert alert-primary">CONTACT INFORMATION</div>
                        <hr>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('address'); ?></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address" value="" required>
                            <span class="text-danger" id="address_error"></span>
                        </div> 
					</div>

				    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('phone'); ?></label>
                        <div class="col-sm-12">
							<input type="text" class="form-control" id="mobile_number" name="phone" value="" required >
                            <span class="text-danger" id="mobile_number_error"></span>
						</div> 
					</div>

                    <div class="alert alert-primary"><?php echo $this->lang->line('spiritual_details'); ?></div>
                    <hr>
                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('ved_shakha'); ?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="ved_shakha" value="">
						</div>
					</div>
					
                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('guru_name'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="guru_name" value="" >
                        </div> 
                    </div>
                    
                    <div class="alert alert-primary"><?php echo $this->lang->line('skills_education'); ?></div>
                    <hr>
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('extra_ordinary_skills'); ?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="extra_ordinary_skills" value="">
						</div>
					</div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('exceptional_abilities'); ?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="exceptional_abilities" value="">
						</div>
					</div>
					
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo $this->lang->line('modern_education_qualifications'); ?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="modern_education_qualifications" value="">
						</div>
					</div>

</div>
</div>
					
					

<div class="form-group">			
<button type="submit" class="btn btn-primary btn-rounded btn-block btn-sm"> <i class="fa fa-plus"></i>&nbsp;<?php echo $this->lang->line('add_teacher'); ?></button>
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
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo $this->lang->line('list_teacher'); ?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo $this->lang->line('photo'); ?></div></th>
                            <th><div><?php echo $this->lang->line('name'); ?></div></th>
                            <th><div><?php echo $this->lang->line('role'); ?></div></th>
                            <th><div><?php echo $this->lang->line('email'); ?></div></th>
                            <th><div><?php echo $this->lang->line('teacher_id'); ?></div></th>
                            <th><div><?php echo $this->lang->line('address'); ?></div></th>
                            <th><div><?php echo $this->lang->line('option'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
        <?php foreach($select_teacher as $key => $teacher){ ?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('teacher', $teacher['teacher_id']);?>" class="img-circle" width="30px"></td>
                            <td><?php echo $teacher['name'];?></td>
                            <td>
                                
                           <?php if($teacher['role']== 1) echo 'Class Teacher';?>
                           <?php if($teacher['role']== 2) echo 'Subject Teacher';?>
                        
                            </td>
                            <td><?php echo $teacher['email'];?></td>
                            <td><?php echo $teacher['gurukul_id'];?></td>
                            <td><?php echo $teacher['address'];?></td>

                            <td>
														
                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_teacher/<?php echo $teacher['teacher_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
							
<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/teacher/delete/<?php echo $teacher['teacher_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>


<a href="<?php echo base_url().'uploads/teacher_image/'.  $teacher['file_name'];?>"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-download"></i></button></a>

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


// / form validation start for every page
jQuery(document).ready(function($) {
    // Real-time validation for each field
    function validateField(fieldId, errorId, errorMessage, validatorFunction) {
        let value = $(fieldId).val().trim();
        if (!validatorFunction(value)) {
            $(errorId).text(errorMessage);
        } else {
            $(errorId).text('');
        }
    }

    function validateRequiredField(fieldId, errorId, errorMessage) {
        let value = $(fieldId).val().trim();
        if (value === '') {
            $(errorId).text(errorMessage);
        } else {
            $(errorId).text('');
        }
    }

    $('#date_of_birth').on('input', function() {
        validateRequiredField('#date_of_birth', '#date_of_birth_error', 'Date of Birth is required.', function(value) {
            return value !== '';
        });
    });

    $('#name').on('input', function() {
        validateField('#name', '#name_error', 'Teacher name is required.', function(value) {
            return value.length > 0;
        });
    });

    $('#address').on('input', function() {
        validateField('#address', '#address_error', 'Address is required.', function(value) {
            return value.length > 0;
        });
    });

    $('#aadhaar').on('input', function() {
        validateField('#aadhaar', '#aadhaar_error', 'Aadhaar must be 12 digits.', function(value) {
            return /^\d{12}$/.test(value);
        });
    });

    $('#mobile_number').on('input', function() {
        validateField('#mobile_number', '#mobile_number_error', 'Mobile must be 10 digits.', function(value) {
            return /^\d{10}$/.test(value);
        });
    });

    $('#password').on('input', function() {
        validateField('#password', '#password_error', 'Password must be at least 8 characters.', function(value) {
            return value.length >= 8;
        });
    });

    $('#email').on('input', function() {
        validateField('#email', '#email_error', 'Email is required and must be valid.', function(value) {
            return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value);
        });
    });


});
</script>