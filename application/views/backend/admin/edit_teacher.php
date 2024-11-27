<?php 
$edit_teacher		=	$this->db->get_where('teacher' , array('teacher_id' => $param2) )->result_array();
foreach ( $edit_teacher as $key => $row):
?>
	
            
            
            <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('edit_teacher');?></div>
						
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                    <?php echo form_open(base_url() . 'admin/teacher/update/'. $row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                                
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
										
					  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('date of birth');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday'];?>"/>
                                </div>
                            </div>					
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="email" value="<?php echo $row ['email']; ?>" >
						</div> 
					</div>
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('address');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
												
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="phone" value="<?php echo $row ['phone']; ?>" >
						</div> 
					</div>
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('extra_ordinary_skills');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="extra_ordinary_skills" value="<?php echo $row['extra_ordinary_skills'];?>">
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-sm-12"><?php echo get_phrase('father_name');?>*</label>
                        <div class="col-sm-12">
                                            
                        <input type="text" class="form-control" name="father_name" value="<?php echo $row['father_name'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12"><?php echo get_phrase('mother_name');?>*</label>
                        <div class="col-sm-12">
                                            
                        <input type="text" class="form-control" name="mother_name" value="<?php echo $row['mother_name'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('ved_shakha');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="ved_shakha" value="<?php echo $row ['ved_shakha']; ?>" >
						</div> 
					</div>
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('exceptional_abilities');?></label>
                    <div class="col-sm-12">
							<input type="text" class="form-control" name="exceptional_abilities" value="<?php echo $row['exceptional_abilities'];?>">
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-sm-12"><?php echo get_phrase('modern_education_qualifications');?>*</label>
                        <div class="col-sm-12">
                                            
                        <input type="text" class="form-control" name="modern_education_qualifications" value="<?php echo $row['modern_education_qualifications'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12"><?php echo get_phrase('state');?>*</label>
                        <div class="col-sm-12">
                                            
                        <input type="text" class="form-control" name="state" value="<?php echo $row['state'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-12"><?php echo get_phrase('country');?>*</label>
                        <div class="col-sm-12">
                                            
                        <input type="text" class="form-control" name="country" value="<?php echo $row['country'];?>">
                        </div>
                    </div>
					
					<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile"/>
       				 <img id="blah" src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" alt="" height="200" width="200"/>

					</div>
					</div>	
					
					
					<div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo get_phrase('account_information');?></h3>
                          
                                <div class="form-group">
                                    <label class="col-md-12" for="example-gotra"><?php echo get_phrase('gotra');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="gotra" id="example-gotra" name="gotra" class="form-control m-r-10" value="<?php echo $row['gotra']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-varna"><?php echo get_phrase('varna');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                               <input type="text" id="example-varna" name="varna" class="form-control" value="<?php echo $row['varna']; ?>" required>
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12" for="inurl"><?php echo get_phrase('surname');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="inurl" name="surname" class="form-control" value="<?php echo $row['surname']; ?>">
                                    </div>
                                </div>
								
								
                        </div>
                    </div>
				
						 
						<div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo get_phrase('aadhaar');?></h3>
                          
                                <div class="form-group">
                                    <label class="col-md-12" for="furl"><?php echo get_phrase('aadhaar');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="furl" name="aadhaar" value="<?php echo $row['aadhaar']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="turl"><?php echo get_phrase('guru_name');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="turl" name="guru_name" class="form-control" value="<?php echo $row['guru_name']; ?>" >
                                    </div>
                                </div>
  
<div class="form-group">
<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo get_phrase('update_teacher');?></button>
</div>
                <?php echo form_close();?>
</div>
</div>
</div>
</div>
</div>

<?php endforeach;?>
