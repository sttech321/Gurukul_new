<?php
$gurukul_registration = $this->db->get_where('gurukul_registrations', array ('id' => $param2))->result_array();
foreach ($gurukul_registration as $key => $category):
?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_new_school'); ?></div>
<div class="panel-body">

<?php echo form_open(base_url().'admin/edit_new_school/update/'. $category['id'], array('class' => 'form-horizontal form-groups-bordered validate', 'enctype'=>'multipart/form-data'));?>


<div class="col-12 col-md-6">
        <div class="mb-3">
            <label class="form-label required">Gurukul Name</label>
            <input type="text" class="form-control"  name="gurukul_name" value="<?php echo $category['gurukul_name'];?>" placeholder="Gurukul Name" required>
            <span class="text-danger" id="gurukul_name_error"></span>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="mb-3">
            <label class="form-label required">Mobile Number</label>
            <input type="text" class="form-control"  name="mobile_number" value="<?php echo $category['mobile_number'];?>" placeholder="Mobile Number"  required>
            <span class="text-danger" id="mobile_number_error"></span>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="mb-3">
            <label class="form-label required">Email</label>
            <input type="email" class="form-control"  name="email" value="<?php echo $category['email'];?>" placeholder="Email" required>
            <span class="text-danger" id="email_error"></span>
            <span class="" id="emailMessage"></span>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="mb-3">
            <label class="form-label required">Password</label>
            <input type="password" class="form-control" id="password"  name="password" value="<?php echo $category['password'];?>" placeholder="Password" required>
            <span class="text-danger" id="password_error"></span>
        </div>
    </div>
 					

                    <!-- <div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
					</div> -->
                    
			<?php echo form_close();?>
            
            </div>
		</div>
    </div>
</div>

<?php endforeach;?>