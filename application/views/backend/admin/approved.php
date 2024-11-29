<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('Approved List');?>
            

            <button onclick="showAjaxModal('<?php echo base_url();?>modal/popup/add_new_school?countries=<?php echo urlencode(json_encode($countries)); ?>');" 
    class="btn btn-info btn-xs pull-right">
    <i class="fa fa-plus"></i>
    <?php echo get_phrase('add_new_school'); ?>
</button>

            
            </div>
                <div class="panel-body table-responsive">

         <table id="example23" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo get_phrase ('Gurukul Name');?></th>
                    <th><?php echo get_phrase ('Address');?></th>
                    <th><?php echo get_phrase ('Mobile Number');?></th>
                    <th><?php echo get_phrase ('Trust Name');?></th>
                    <th><?php echo get_phrase ('Profile Image');?></th>
                    <th><?php echo get_phrase ('Action');?></th>

                </tr>
             </thead>
             <tbody>

               <?php $counter = 1; $gurukul_registration =  $this->db->get_where('gurukul_registrations', array('id' => $counter))->result_array();

    print_r( $gurukul_registration );
    // die;
                  //  foreach($gurukul_registration as $key => $$row):?>       

    <?php foreach ($gurukul_registration as $key => $row):?>

             <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['gurukul_name'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['mobile_number'];?></td>
                    <td><?php echo $row['trust_name'];?></td>
                    <td><?php echo $row['image'];?></td>
                    <td>
                    
                    <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_new_school/<?php echo $row['id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url();?>admin/enquiry_category/delete/<?php echo $row['enquiry_category_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                    
                    </td>
            </tr>
    <?php endforeach;?>

            </tbody>
        </table>
                </div>
        </div>
    </div>
</div>