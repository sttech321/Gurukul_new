        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading"> <i
                            class="fa fa-list"></i>&nbsp;&nbsp;<?php echo $this->lang->line('list_school'); ?></div>
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
                                    <tr>
                                        <td><img src="<?php echo $this->crud_model->get_image_url('principal', $principal['principal_id']);?>"
                                                class="img-circle" width="30px"></td>
                                        <td><?php echo $principal['name'];?></td>
                                        <td>
                                            <?php echo $principal['phone'];?>
                                        </td>
                                        <td><?php echo $principal['email'];?></td>
                                        <td><?php echo $principal['principal_id'];?></td>
                                        <td><?php echo $principal['address'];?></td>

                                        <td>

                                            <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_unapproved_gurukul/<?php echo $principal['principal_id'];?>')"
                                                class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>

                                            <a href="#"
                                                onclick="confirm_modals('<?php echo base_url();?>admin/unapproved_gurukul/delete/<?php echo $principal['principal_id'];?>');"><button
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