<div class="row">
    <div class="col-sm-12">
    <div class="panel panel-info">
    <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('invite_link'); ?></div>
<div class="panel-body">

<?php echo form_open(base_url().'admin/sendbioEmail/', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype'=>'multipart/form-data'));?>
                <div class="form-group">
                <label class="col-md-12" for="example-text"><?php echo $this->lang->line('enter_email'); ?></label>
                <div class="col-sm-12">
                        <input type="email" name="email_invite" value="" class="form-control" id="email_invite" >
                    </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('send'); ?></button>
                </div>
        <?php echo form_close();?>
        
        </div>
    </div>
</div>
</div>
