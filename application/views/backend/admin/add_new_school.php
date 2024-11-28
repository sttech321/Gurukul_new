<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                    <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_new_school'); ?></div>
<div class="panel-body">

<?php echo form_open(base_url('admin/add_new_school/insert'), ['class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data']); ?>

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


    <?php
// Check if countries are passed via GET parameter
if (isset($_GET['countries'])) {
    $countries = json_decode(urldecode($_GET['countries']), true);
    // Now you can use the $countries array in the modal
}
?>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label for="country">Country</label>
        <select name="country" id="countrys" class="form-control">
            <option value="">Select Country</option>
            <?php 
            // Check if $countries is set and is an array with elements
            if (isset($countries) && is_array($countries) && !empty($countries)) {
                // Loop through each country and create an option for the select dropdown
                foreach ($countries as $country) {
                    if (isset($country['id']) && isset($country['name'])) {
                        echo '<option value="' . htmlspecialchars($country['id']) . '">' . htmlspecialchars($country['name']) . '</option>';
                    }
                }
            } else {
                echo '<option value="">No countries available</option>';
            }
            ?>
        </select>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label for="state">State</label>
        <select name="state" id="states" class="form-control" disabled>
            <option value="">Select State</option>
            <!-- States will be dynamically populated -->
        </select>
    </div>
</div>



    <div class="col-12 col-md-6 full-col-upload">
        <div class="mb-3 center imageUploadWrapper">
            <label class="form-label">Upload File</label>
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" name="uploadimage" onchange="readURL(this);" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose File</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-primary m-0 rounded-pill px-3"> 
                        <i class="fa fa-cloud-upload me-2"></i>
                        <small class="text-uppercase font-weight-bold">Choose File</small>
                    </label>
                </div>
            </div>
            <span class="text-danger" id="upload_error"></span>
            <div class="image-area" id="imagePreviews" style="display: none;">
                <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="mb-3">
            <label class="form-label required">Address</label>
            <textarea id="address" class="form-control" name="address" placeholder="Address" rows="3" required></textarea>
            <span class="text-danger" id="address_error"></span>
        </div>
    </div>
    <input type="hidden" class="form-control" id="role" name="role" required>
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


<script>
document.getElementById('countrys').addEventListener('change', function () {
    const countryId = this.value; // Get selected country ID
    const stateDropdown = document.getElementById('states'); // Get the state dropdown

    // Reset states dropdown and disable it
    stateDropdown.innerHTML = '<option value="">Select State</option>';
    stateDropdown.disabled = true;

    // If a valid country is selected
    if (countryId) {
        // Make an AJAX request to get states for the selected country
        fetch('/admin/get-states/' + countryId)
            .then(response => response.json())
            .then(data => {
                if (data.states && data.states.length > 0) {
                    // Populate the states dropdown
                    data.states.forEach(state => {
                        const option = document.createElement('option');
                        option.value = state.id;
                        option.textContent = state.name;
                        stateDropdown.appendChild(option);
                    });
                    stateDropdown.disabled = false; // Enable the state dropdown
                } else {
                    // If no states are returned, disable the dropdown
                    stateDropdown.disabled = true;
                }
            })
            .catch(error => {
                console.error('Error fetching states:', error);
                stateDropdown.disabled = true;
            });
    }
});

</script>