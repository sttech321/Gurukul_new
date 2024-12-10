<div class="row customInputRow">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo $this->lang->line('new_school');?>
                <div class="pull-right">
                    <a href="#" data-perform="panel-collapse"><i
                            class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('add_new_school_here');?><i
                            class="btn btn-info btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a>
                </div>
            </div>
            <div class="panel-wrapper collapse out" aria-expanded="true">
                <div class="panel-body">
                    <?php echo form_open(base_url('admin/gurukul_registration/create'), ['class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data']); ?>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label
                                    class="form-label required"><?php echo $this->lang->line('gurukul_name');?></label>
                                <input type="text" class="form-control" id="gurukul_name" name="gurukul_name"
                                    placeholder="<?php echo $this->lang->line('gurukul_name');?>" required>
                                <span class="text-danger" id="gurukul_name_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label
                                    class="form-label required"><?php echo $this->lang->line('mobile_number');?></label>
                                <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                                    placeholder="<?php echo $this->lang->line('mobile_number');?>" required>
                                <span class="text-danger" id="mobile_number_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label required"><?php echo $this->lang->line('email');?></label>
                                <input type="email" class="form-control" id="emailid" name="email"
                                    placeholder="<?php echo $this->lang->line('email');?>" required>
                                <span class="text-danger" id="email_error"></span>
                                <span class="" id="emailMessage"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label required"><?php echo $this->lang->line('password');?></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="<?php echo $this->lang->line('password');?>" required>
                                <span class="text-danger" id="password_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mx-0">
                                <label for="country"><?php echo  $this->lang->line('country'); ?></label>
                                <select name="country" id="countrys" class="form-control">
                                    <option value="">Select Country</option>
                                    <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['id']; ?>"
                                        <?php echo ($country[0]['country'] == $country['id']) ? 'selected' : ''; ?>>
                                        <?php echo $country['name']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="state">State</label>
                            <select name="state" id="states" class="form-control" disabled>
                                <option value=""><?php echo  $this->lang->line('state'); ?></option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12"><?php echo  $this->lang->line('browse_image'); ?>*</label>
                                <div class="col-sm-12">
                                    <input type='file' class="form-control" name="userfile" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label required"><?php echo  $this->lang->line('address'); ?></label>
                                <textarea id="address" class="form-control" name="address"
                                    placeholder="<?php echo  $this->lang->line('address'); ?>" rows="3"
                                    required></textarea>
                                <span class="text-danger" id="address_error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="my-3"><?php echo $this->lang->line('trust_information'); ?></label>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <input type="text" id="trust_name" class="form-control" name="trust_name"
                                    placeholder="<?php echo  $this->lang->line('trust_name'); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <input type="date" class="form-control" id="trust_registration_date"
                                    name="trust_registration_date" placeholder="dd/mm/yyyy" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="trust_president_name"
                                    name="trust_president_name"
                                    placeholder="<?php echo  $this->lang->line('trust_president_name'); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="secretary_name" name="secretary_name"
                                    placeholder="<?php echo  $this->lang->line('secretary_name'); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="treasurer_name" name="treasurer_name"
                                    placeholder="<?php echo  $this->lang->line('treasurer_name'); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <input type="text" class="form-control" id="principal_name" name="principal_name"
                                    placeholder="<?php echo  $this->lang->line('principal_name'); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="my-3"><?php echo  $this->lang->line('fund_resource'); ?></label>
                            <div class="mb-3">
                                <select id="fund_resource" class="form-control" name="fund_resource">
                                    <option value="education_board_support">Education Board Support</option>
                                    <option value="government_support">Government Support</option>
                                    <option value="private_donations">Private Donations</option>
                                    <option value="donations_from_temples_and_mathas">Donations from Temples and Mathas
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="my-3"><?php echo  $this->lang->line('type_of_setup'); ?></label>
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
                        <div class="col-12 col-md-6 focusAreaBox">
                            <label class="my-3"><?php echo  $this->lang->line('focus_area'); ?></label>
                            <div class="line"></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Ved" name="focus_area[]"
                                        value="Ved">
                                    <label class="form-check-label"
                                        for="Ved"><?php echo  $this->lang->line('ved'); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Shastra_Gurukul"
                                        name="focus_area[]" value="Shastra Gurukul">
                                    <label class="form-check-label"
                                        for="Shastra_Gurukul"><?php echo  $this->lang->line('shastra_gurukul'); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Kala" name="focus_area[]"
                                        value="Kala">
                                    <label class="form-check-label"
                                        for="Kala"><?php echo  $this->lang->line('kala'); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Krishi" name="focus_area[]"
                                        value="Krishi">
                                    <label class="form-check-label"
                                        for="Krishi"><?php echo  $this->lang->line('krishi'); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Yog_Darshan" name="focus_area[]"
                                        value="Yog-Darshan">
                                    <label class="form-check-label"
                                        for="Yog_Darshan"><?php echo  $this->lang->line('yog_darshan'); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Tantra" name="focus_area[]"
                                        value="Tantra">
                                    <label class="form-check-label"
                                        for="Tantra"><?php echo  $this->lang->line('tantra'); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Yudh_Kala" name="focus_area[]"
                                        value="Yudh Kala">
                                    <label class="form-check-label"
                                        for="Yudh_Kala"><?php echo  $this->lang->line('yudh_kala'); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Bhasha" name="focus_area[]"
                                        value="Bhasha">
                                    <label class="form-check-label"
                                        for="Bhasha"><?php echo  $this->lang->line('bhasha'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="my-3"><?php echo  $this->lang->line('facilities_available'); ?></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="School_Building" name="facilities[]"
                                    value="School Building">
                                <label class="form-check-label"
                                    for="School_Building"><?php echo  $this->lang->line('school_building'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Classrooms" name="facilities[]"
                                    value="Classrooms">
                                <label class="form-check-label"
                                    for="Classrooms"><?php echo  $this->lang->line('classrooms'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Library" name="facilities[]"
                                    value="Library">
                                <label class="form-check-label"
                                    for="Library"><?php echo  $this->lang->line('library'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="ComputerRoom" name="facilities[]"
                                    value="Computer Room">
                                <label class="form-check-label"
                                    for="ComputerRoom"><?php echo  $this->lang->line('computer_room'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Kala_Room" name="facilities[]"
                                    value="Kala Room">
                                <label class="form-check-label"
                                    for="Kala_Room"><?php echo  $this->lang->line('kala_room'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Vyam_Kasha" name="facilities[]"
                                    value="Vyam Kasha">
                                <label class="form-check-label"
                                    for="Vyam_Kasha"><?php echo  $this->lang->line('vyam_kasha'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Farms" name="facilities[]"
                                    value="Farms">
                                <label class="form-check-label"
                                    for="Farms"><?php echo  $this->lang->line('farms'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Kitchen" name="facilities[]"
                                    value="Kitchen">
                                <label class="form-check-label"
                                    for="Kitchen"><?php echo  $this->lang->line('kitchen'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Ashwashala" name="facilities[]"
                                    value="Ashwashala">
                                <label class="form-check-label"
                                    for="Ashwashala"><?php echo  $this->lang->line('ashwashala'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Workshop" name="facilities[]"
                                    value="Workshop">
                                <label class="form-check-label"
                                    for="Workshop"><?php echo  $this->lang->line('workshop'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Yagna_Shala" name="facilities[]"
                                    value="Yagna Shala">
                                <label class="form-check-label"
                                    for="Yagna_Shala"><?php echo  $this->lang->line('yagna_shala'); ?></label><br>
                                <input class="form-check-input" type="checkbox" id="Gaushala" name="facilities[]"
                                    value="Gaushala">
                                <label class="form-check-label"
                                    for="Gaushala"><?php echo  $this->lang->line('gaushala'); ?></label><br>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <label
                                class="my-3"><?php echo  $this->lang->line('registered_with_education_board'); ?></label>
                            <div class="mb-3 radioBtnWrap">
                                <input type="radio" id="registered_yes" name="registered_with_education_board"
                                    value="Yes" required>
                                <label for="registered_yes"><?php echo  $this->lang->line('yes'); ?></label><br>
                                <input type="radio" id="registered_no" name="registered_with_education_board" value="No"
                                    required>
                                <label for="registered_no"><?php echo  $this->lang->line('no'); ?></label>
                                <div class="mb-3 mt-3">
                                    <label for="education_board_name"
                                        class="form-label"><?php echo  $this->lang->line('if_yes_education_board'); ?></label>
                                    <br>
                                    <input type="text" class="form-control" id="education_board_name"
                                        name="education_board_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 text-center">
                            <div class="submitBtnWrap mt-3 mb-2">
                                <button type="submit" id="submit-button"
                                    class="btn btn-primary btn-md px-4"><?php echo  $this->lang->line('submit'); ?></button>
                            </div>
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
            <div class="panel-heading"> <i
                    class="fa fa-list"></i>&nbsp;&nbsp;<?php echo $this->lang->line('list_school'); ?>

                <button onclick="showAjaxModal('<?php echo base_url();?>modal/popup/gurukul_invite_link');"
                    class="btn btn-info btn-transparent btn-xs pull-right">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('gurukul_invite_link'); ?>
                </button>
            </div>

            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body table-responsive">

                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="80">
                                    <div><?php echo $this->lang->line('photo');?></div>
                                </th>
                                <th>
                                    <div><?php echo $this->lang->line('name');?></div>
                                </th>
                                <th>
                                    <div><?php echo $this->lang->line('phone');?></div>
                                </th>
                                <th>
                                    <div><?php echo $this->lang->line('email');?></div>
                                </th>
                                <th>
                                    <div><?php echo $this->lang->line('gurukul_id');?></div>
                                </th>
                                <th>
                                    <div><?php echo $this->lang->line('address');?></div>
                                </th>
                                <th>
                                    <div><?php echo $this->lang->line('action');?></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($principal_student as $key => $principal){ ?>
                            <tr class="clickable-row" data-href="<?php echo base_url('admin/principal_dashboard/' . $principal['principal_id']); ?>">
                                <td><img src="<?php echo $this->crud_model->get_image_url('principal', $principal['principal_id']);?>"
                                        class="img-circle" width="30px"></td>
                                <td><?php echo $principal['name'];?></td>
                                <td><?php echo $principal['phone'];?></td>
                                <td><?php echo $principal['email'];?></td>
                                <td><?php echo $principal['principal_id'];?></td>
                                <td><?php echo $principal['address'];?></td>

                                <td>

                                    <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_approved_gurukul/<?php echo $principal['principal_id'];?>')"
                                        class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>

                                    <a href="#"
                                        onclick="confirm_modal('<?php echo base_url();?>admin/gurukul_registration/delete/<?php echo $principal['principal_id'];?>');"><button
                                            type="button" class="btn btn-danger btn-circle btn-xs"><i
                                                class="fa fa-times"></i></button></a>


                                    <!-- <a
                                        href="<?php //echo base_url().'uploads/student_image/'.  $principal['file_name'];?>"><button
                                            type="button" class="btn btn-warning btn-circle btn-xs"><i
                                                class="fa fa-download"></i></button></a> -->

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

<script>
$(document).ready(function() {
    $('.clickable-row').on('click', function() {
        window.location = $(this).data('href');
    });
});
</script>
<script type="text/javascript">
function get_designation_val(department_id) {
    if (department_id != '')
        $.ajax({
            url: '<?php echo base_url();?>admin/get_designation/' + department_id,
            success: function(response) {
                console.log(response);
                jQuery('#designation_holder').html(response);
            }
        });
    else
        jQuery('#designation_holder').html(
            '<option value=""><?php echo get_phrase("select_a_department_first"); ?></option>');
}
</script>
<script type="text/javascript">
document.getElementById('countrys').addEventListener('change', function() {
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// form validation start for every page
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

    $('#gurukul_name').on('input', function() {
        validateField('#gurukul_name', '#gurukul_name_error', 'Gurukul name is required.', function(
            value) {
            return value.length > 0;
        });
    });

    $('#address').on('input', function() {
        let value = $(this).val();
        if (value.length === 0) {
            $('#address_error').text('Address is required.');
        } else {
            $('#address_error').text('');
        }
    });

    $('#mobile_number').on('input', function() {
        validateField('#mobile_number', '#mobile_number_error', 'Mobile must be 10 digits.', function(
            value) {
            return /^\d{10}$/.test(value);
        });
    });

    $('#password').on('input', function() {
        validateField('#password', '#password_error', 'Password must be at least 8 characters.',
            function(value) {
                return value.length >= 8;
            });
    });

    $('#emailid').on('input', function() {
        validateField('#emailid', '#email_error', 'Email is required and must be valid.', function(
            value) {
            return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value);
        });
    });

});
</script>