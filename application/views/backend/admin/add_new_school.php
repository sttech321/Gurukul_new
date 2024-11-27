<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                    <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_new_school'); ?></div>
<div class="panel-body">


<?php echo form_open(base_url().'admin/enquiry_category/insert', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype'=>'multipart/form-data')); ?>

<input type="hidden" id="formid" value="">
<input type="hidden" class="form-control" id="gurukul_id" name="gurukul_id" value="">

<div class="text-line-box-content mt-0">
    <h5 class="my-3">Personal Information</h5>
    <div class="line"></div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label required">Gurukul Name</label>
        <input type="text" class="form-control" id="gurukul_name" name="gurukul_name" placeholder="Gurukul Name" required>
        <span class="text-danger" id="gurukul-name-error" style="display: none;">Gurukul Name is Required.</span>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label required">Mobile Number</label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required>
        <span class="text-danger" id="mobile-number-error" style="color:red; display:none;">Mobile Number is Required.</span>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label required">Address</label>
        <textarea id="address" class="form-control" name="address" placeholder="Address" rows="3" required></textarea>
        <span id="address-error" style="color:red; display:none;">Address is required.</span>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label">Focus Area of Gurukul</label>
        <textarea id="focus_area" class="form-control" name="focus_area" placeholder="Describe the Focus Area" rows="3"></textarea>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label">Facilities Available</label>
        <textarea id="facilities" class="form-control" name="facilities" placeholder="List of Facilities Available" rows="3"></textarea>
    </div>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label class="form-label">Registered with Education Board</label>
        <select id="education_board" class="form-control" name="education_board">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
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
        <input type="date" class="form-control" id="trust_registration_date" name="trust_registration_date" required>
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

<div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<?php echo form_close(); ?>

            
            </div>
		</div>
    </div>
</div>