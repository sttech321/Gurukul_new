<?php 
$states = $this->db->get('states')->result_array(); 
$countries = $this->db->get('countries')->result_array(); 
$edit_principal = $this->db->get_where('principal' , array('principal_id' => $param2) )->result_array();
$focus_area = json_decode($edit_principal[0]['focus_area']);
$selected_facilities = json_decode($edit_principal[0]['facilities']) ? json_decode($edit_principal[0]['facilities']) : '';
$facilities = ["School Building", "Classrooms", "Library", "Computer Room", "Kala Room", "Vyam Kasha", "Farms", "Kitchen", "Ashwashala", "Workshop", "Yagna Shala", "Gaushala"];
$focus_options = ['Ved', 'Shastra Gurukul', 'Kala', 'Krishi', 'Yog-Darshan', 'Tantra', 'Yudh Kala', 'Bhasha'];
$selected_fund_resource = $edit_principal[0]['fund_resource'] ?? '';
$setup_types = ["Pathshala", "Gurukul", "Tapovan", "Gruh Gurukul", "Adhunik Gurukul"];
$selected_setup_type = $edit_principal[0]['setup_type'] ?? '';
$page_data['focus_area'] = $focus_area;
foreach ( $edit_principal as $key => $principal):
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo $this->lang->line('list_school'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo form_open(base_url() . 'admin/gurukul_registration/update/'. $principal['principal_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label
                                        class="form-label required"><?php echo $this->lang->line('gurukul_name');?></label>
                                    <input type="text" class="form-control" id="gurukul_name" name="gurukul_name"
                                        placeholder="<?php echo $this->lang->line('gurukul_name');?>"
                                        value="<?php echo $principal['name'];?>" required>
                                    <span class="text-danger" id="gurukul_name_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label
                                        class="form-label required"><?php echo $this->lang->line('mobile_number');?></label>
                                    <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                                        value="<?php echo $principal['phone'];?>"
                                        placeholder="<?php echo $this->lang->line('mobile_number');?>" required>
                                    <span class="text-danger" id="mobile_number_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required"><?php echo $this->lang->line('email');?></label>
                                    <input type="email" class="form-control" id="emailid" name="email"
                                        value="<?php echo $principal['email'];?>"
                                        placeholder="<?php echo $this->lang->line('email');?>" required>
                                    <span class="text-danger" id="email_error"></span>
                                    <span class="" id="emailMessage"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="col-md-6">
                                    <label for="country"
                                        class="col-md-12"><?php echo  $this->lang->line('country'); ?></label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $country): ?>
                                        <option value="<?php echo $country['id']; ?>"
                                            <?php echo ($principal['country'] == $country['id']) ? 'selected' : ''; ?>>
                                            <?php echo $country['name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="col-md-12"><?php echo  $this->lang->line('state'); ?></label>
                                    <select name="state" id="state" class="form-control"
                                        <?php echo ($principal['country']) ? '' : 'disabled'; ?>>
                                        <option value="">Select State</option>
                                        <?php foreach ($states as $state): ?>
                                        <option value="<?php echo $state['id']; ?>"
                                            <?php echo ($principal['state'] == $state['id']) ? 'selected' : ''; ?>>
                                            <?php echo $state['name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="col-sm-12">
                                    <label class="col-sm-12"><?php echo  $this->lang->line('browse_image'); ?>*</label>
                                    <input type='file' class="form-control" name="userfile" />
                                    <img id="blah"
                                        src="<?php echo $this->crud_model->get_image_url('principal',$principal['principal_id']);?>"
                                        alt="" height="200" width="200" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required"><?php echo  $this->lang->line('address'); ?></label>
                                    <input id="address" class="form-control" name="address"
                                        value="<?php echo $principal['address'];?>"
                                        placeholder="<?php echo  $this->lang->line('address'); ?>" rows="3" required>
                                    <span class="text-danger" id="address_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="my-3"><?php echo $this->lang->line('trust_information'); ?></label>
                                <div class="line"></div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" id="trust_name" class="form-control" name="trust_name"
                                        value="<?php echo $principal['trust_name'];?>"
                                        placeholder="<?php echo  $this->lang->line('trust_name'); ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="trust_registration_date"
                                        value="<?php echo $principal['trust_registration_date'];?>"
                                        name="trust_registration_date" placeholder="dd/mm/yyyy" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="trust_president_name"
                                        value="<?php echo $principal['trust_president_name'];?>" name="trust_president_name"
                                        placeholder="<?php echo  $this->lang->line('trust_president_name'); ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="secretary_name" name="secretary_name"
                                        value="<?php echo $principal['secretary_name'];?>"
                                        placeholder="<?php echo  $this->lang->line('secretary_name'); ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="treasurer_name" name="treasurer_name"
                                        value="<?php echo $principal['treasurer_name'];?>"
                                        placeholder="<?php echo  $this->lang->line('treasurer_name'); ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div>
                                    <input type="text" class="form-control" id="principal_name" name="principal_name"
                                        value="<?php echo $principal['principal_name'];?>"
                                        placeholder="<?php echo  $this->lang->line('principal_name'); ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 class="my-3"><?php echo  $this->lang->line('fund_resource'); ?></h5>
                                <div class="mb-3">
                                    <select id="fund_resource" class="form-control" name="fund_resource">
                                        <?php
                                                $fund_resources = [
                                                    "education_board_support" => "Education Board Support",
                                                    "government_support" => "Government Support",
                                                    "private_donations" => "Private Donations",
                                                    "donations_from_temples_and_mathas" => "Donations from Temples and Mathas"
                                                ];
                                                foreach ($fund_resources as $value => $label) {
                                                    $selected = ($value === $selected_fund_resource) ? 'selected' : '';
                                                    echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 class="my-3"><?php echo  $this->lang->line('type_of_setup'); ?></h5>
                                <div class="mb-3">
                                    <select id="type_of_setup" class="form-control" name="setup_type">
                                        <?php
                                                foreach ($setup_types as $setup_type) {
                                                    $selected = ($setup_type === $selected_setup_type) ? 'selected' : '';
                                                    echo '<option value="' . $setup_type . '" ' . $selected . '>' . $setup_type . '</option>';
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 focusAreaBox">
                                <label class="my-3"><?php echo  $this->lang->line('focus_area'); ?></label>
                                <div class="line"></div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <?php 
                                                foreach ($focus_options as $focus) {
                                                    $checked = (is_array($focus_area) && in_array($focus, $focus_area)) ? 'checked' : '';
                                                    echo '
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="' . $focus . '" name="focus_area[]" value="' . $focus . '" ' . $checked . '>
                                                            <label class="form-check-label" for="' . $focus . '">' . $focus . '</label>
                                                        </div>
                                                    ';
                                                }
                                                ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 customInputRow">
                                <label class="my-3"><?php echo  $this->lang->line('facilities_available'); ?></label>
                                <div class="form-check">
                                    <?php
                                                foreach ($facilities as $facility) {
                                                    $checked = (is_array($selected_facilities) && in_array($facility, $selected_facilities)) ? 'checked' : '';
                                                    echo '
                                                        <input class="form-check-input" type="checkbox" id="' . str_replace(' ', '_', $facility) . '" 
                                                            name="facilities[]" value="' . $facility . '" ' . $checked . '>
                                                        <label class="form-check-label" for="' . str_replace(' ', '_', $facility) . '">' . $facility . '</label><br>
                                                    ';
                                                }
                                                ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label
                                    class="my-3"><?php echo  $this->lang->line('registered_with_education_board'); ?></label>
                                <div class="mb-3 radioBtnWrap">
                                    <?php
                                                    // Example data
                                                    $registered_with_education_board = $principal['registered_with_education_board'] ?? 'No'; // Default to 'No'
                                                    $education_board_name = $principal['education_board_name'] ?? '';
                                                ?>

                                    <input type="radio" id="registered_yes" name="registered_with_education_board"
                                        value="Yes"
                                        <?php echo ($registered_with_education_board === 'Yes') ? 'checked' : ''; ?>
                                        required>
                                    <label for="registered_yes">Yes</label><br>

                                    <input type="radio" id="registered_no" name="registered_with_education_board" value="No"
                                        <?php echo ($registered_with_education_board === 'No') ? 'checked' : ''; ?>
                                        required>
                                    <label for="registered_no">No</label>

                                    <!-- Conditionally display the text input -->
                                    <div class="mb-3 mt-3" id="education_board_name_wrap"
                                        style="display: <?php echo ($registered_with_education_board === 'Yes') ? 'block' : 'none'; ?>;">
                                        <label for="education_board_name"
                                            class="form-label"><?php echo  $this->lang->line('if_yes_education_board'); ?></label>
                                        <br>
                                        <input type="text" class="form-control" id="education_board_name"
                                            value="<?php echo htmlspecialchars($education_board_name); ?>"
                                            name="education_board_name">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group w-50 mx-auto">
                            <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i
                                    class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo $this->lang->line('update_school'); ?></button>
                        </div>

                        <?php echo form_close();?>
                    </div>
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