<?php 
$states = $this->db->get('states')->result_array(); 
$countries = $this->db->get('countries')->result_array(); 
$edit_teacher=	$this->db->get_where('teacher' , array('teacher_id' => $param2) )->result_array();
foreach ( $edit_teacher as $key => $row):
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <?php echo $this->lang->line('edit_teacher'); ?></div>

            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                <?php if($this->session->userdata('admin_login') == 1){
                            echo form_open(base_url() . 'admin/principal_dashboard/teacher/update/'. $row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));
                        }else{
                            echo form_open(base_url() . 'principal/teacher/update/'. $row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));
                        }?>
                    <?php ?>


                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('name'); ?></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('date_of_birth'); ?></label>
                        <div class="col-sm-12">
                            <input type="date" class="datepicker form-control" name="birthday"
                                value="<?php echo $row['birthday'];?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-md-12"><?php echo $this->lang->line('country'); ?></label>
                        <div class="col-md-6">
                            <select name="country" id="country" class="form-control">
                                <option value="">Select Country</option>
                                <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['id']; ?>"
                                    <?php echo ($row['country'] == $country['id']) ? 'selected' : ''; ?>>
                                    <?php echo $country['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="state" id="state" class="form-control"
                                <?php echo ($row['country']) ? '' : 'disabled'; ?>>
                                <option value="">Select State</option>
                                <?php foreach ($states as $state): ?>
                                <option value="<?php echo $state['id']; ?>"
                                    <?php echo ($row['state'] == $state['id']) ? 'selected' : ''; ?>>
                                    <?php echo $state['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('email'); ?></label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="email" value="<?php echo $row ['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('address'); ?></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="address"
                                value="<?php echo $row['address'];?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('phone'); ?></label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" name="phone" value="<?php echo $row ['phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('extra_ordinary_skills'); ?></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="extra_ordinary_skills"
                                value="<?php echo $row['extra_ordinary_skills'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('father_name'); ?>*</label>
                        <div class="col-sm-12">

                            <input type="text" class="form-control" name="father_name"
                                value="<?php echo $row['father_name'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('mother_name'); ?>*</label>
                        <div class="col-sm-12">

                            <input type="text" class="form-control" name="mother_name"
                                value="<?php echo $row['mother_name'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('ved_shakha'); ?></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="ved_shakha"
                                value="<?php echo $row ['ved_shakha']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('exceptional_abilities'); ?></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="exceptional_abilities"
                                value="<?php echo $row['exceptional_abilities'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label
                            class="col-sm-12"><?php echo $this->lang->line('modern_education_qualifications'); ?>*</label>
                        <div class="col-sm-12">

                            <input type="text" class="form-control" name="modern_education_qualifications"
                                value="<?php echo $row['modern_education_qualifications'];?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country" class="col-md-12"><?php echo $this->lang->line('Country'); ?></label>
                        <div class="col-md-6">
                            <select name="country" id="country" class="form-control">
                                <option value=""><?php echo $this->lang->line('select_country');?></option>
                                <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['id']; ?>"
                                    <?php echo ($row['country'] == $country['id']) ? 'selected' : ''; ?>>
                                    <?php echo $country['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="state" id="state" class="form-control"
                                <?php echo ($row['country']) ? '' : 'disabled'; ?>>
                                <option value=""><?php echo $this->lang->line('select_state');?></option>
                                <?php foreach ($states as $state): ?>
                                <option value="<?php echo $state['id']; ?>"
                                    <?php echo ($row['state'] == $state['id']) ? 'selected' : ''; ?>>
                                    <?php echo $state['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12"><?php echo $this->lang->line('browse_image'); ?>*</label>
                        <div class="col-sm-12">
                            <input type='file' class="form-control" name="userfile" />
                            <img id="blah"
                                src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>"
                                alt="" height="200" width="200" />

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="white-box">
                                <!-- <h3 class="box-title"><?php //echo get_phrase('account_information');?></h3> -->

                                <div class="form-group">
                                    <label class="col-md-12"
                                        for="example-gotra"><?php echo $this->lang->line('gotra'); ?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="gotra" id="example-gotra" name="gotra" class="form-control m-r-10"
                                            value="<?php echo $row['gotra']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12"
                                        for="example-varna"><?php echo $this->lang->line('varna'); ?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-varna" name="varna" class="form-control"
                                            value="<?php echo $row['varna']; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"
                                        for="inurl"><?php echo $this->lang->line('varna'); ?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="inurl" name="surname" class="form-control"
                                            value="<?php echo $row['surname']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="white-box">

                                <div class="form-group">
                                    <label class="col-md-12"
                                        for="furl"><?php echo $this->lang->line('aadhaar'); ?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="furl" name="aadhaar"
                                            value="<?php echo $row['aadhaar']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12"
                                        for="turl"><?php echo $this->lang->line('guru_name'); ?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="turl" name="guru_name" class="form-control"
                                            value="<?php echo $row['guru_name']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i
                                            class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo $this->lang->line('update_teacher'); ?></button>
                                </div>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach;?>
            <script type="text/javascript">
            document.getElementById('country').addEventListener('change', function() {
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