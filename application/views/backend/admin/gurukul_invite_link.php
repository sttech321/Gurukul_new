<?php

// $select_information = $this->db->get_where('enquiry_category', array ('enquiry_category_id' => $param2))->result_array();
// foreach ($select_information as $key => $category):


?>

<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('invite_link'); ?></div>
<div class="panel-body">

<?php echo form_open(base_url().'admin/sendbioEmail/', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype'=>'multipart/form-data'));?>

					<div class="form-group">
                 	<label class="col-md-12" for="example-text">Enter the email</label>
                    <div class="col-sm-12">
                            <input type="email" name="email_invite" value="" class="form-control" id="email_invite" >
                        </div>
                    </div>

                    <div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Send</button>
					</div>
			<?php echo form_close();?>
            
            </div>
		</div>
    </div>
</div>

<?php //endforeach;?>