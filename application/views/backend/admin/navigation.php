    <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">

                        <?php
                            $key = $this->session->userdata('login_type') . '_id';
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/default.jpg';                                 
                            }
                            ?>

                    <a href="#" class="waves-effect"><img src="<?php echo base_url() . $face_file;?>" alt="user-img" class="img-circle"> <span class="hide-menu">

                       <?php 
                                $account_type   =   $this->session->userdata('login_type');
                                $account_id     =   $account_type.'_id';
                                $name           =   $this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id), 'name');
                                echo $name;
                        ?>


                        <span class="fa arrow"></span></span>
                    
                    </a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i><?php echo $this->lang->line('my_profile'); ?></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> <?php echo $this->lang->line('inbox'); ?></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> <?php echo $this->lang->line('account_setting'); ?></a></li>
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i> <?php echo $this->lang->line('logout'); ?></a></li>
                        </ul>
                    </li>
                    <?php //$current_lang = $this->session->userdata('site_lang') ?? 'english';?>
                    <!-- <a href="<?php //echo site_url('language/switch_language?lang=english'); ?>">English</a> |  -->
                    <!-- <a href="<?php //echo site_url('language/switch_language?lang=hindi'); ?>">हिंदी</a> -->
     <!---  Permission for Admin Dashboard starts here ------>
        <?php $check_admin_permission = $this->db->get_where('admin_role', array('admin_id' => $this->session->userdata('login_user_id')))->row()->dashboard;?>
        <?php if($check_admin_permission == '1'):?>
            <li> <a href="<?php echo base_url();?>admin/dashboard" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('Dashboard'); ?></span></a> </li>
        <?php endif;?> 
    <!---  Permission for Admin Dashboard ends here ------>
                    
     <!---  Permission for Admin Manage Academics starts here ------>
     <?php //$check_admin_permission = $this->db->get_where('admin_role', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_academics;?>
     <?php //if($check_admin_permission == '1'):?>   
        <!-- <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-mortar-board" data-icon="7"></i> <span class="hide-menu"> <?php //echo $this->lang->line('manage_academics');?> <span class="fa arrow"></span></span></a>
                        <ul class=" nav nav-second-level<?php
            // if (    $page_name == 'enquiry_category'||
            //         $page_name == 'list_enquiry'||
            //         $page_name == 'club'|| $page_name == 'noticeboard' ||
            //         $page_name == 'circular'||
            //         $page_name == 'academic_syllabus') echo 'opened active';
            ?> ">
                            
        <li class="<?php //if ($page_name == 'enquiry_category') echo 'active';?>"> 

            <a href="<?php //echo base_url();?>admin/enquiry_category">
                <i class="fa fa-angle-double-right p-r-10"></i>
                <span class="hide-menu"><?php //echo $this->lang->line('enquiry_category');?></span>

            </a> 
        </li>

       <li class="<?php //if ($page_name == 'enquiry') echo 'active'; ?> ">
                <a href="<?php //echo base_url(); ?>admin/list_enquiry">
                <i class="fa fa-angle-double-right p-r-10"></i>
                      <span class="hide-menu"><?php //echo $this->lang->line('list_enquiries'); ?></span>
                </a>
        </li>

        <li class="<?php //if ($page_name == 'club') echo 'active'; ?>">
                <a href="<?php //echo base_url(); ?>admin/club">
                <i class="fa fa-angle-double-right p-r-10"></i>
                      <span class="hide-menu"><?php //echo $this->lang->line('school_clubs'); ?></span>
                </a>
        </li>

        <li class="<?php //if ($page_name == 'circular') echo 'active'; ?> ">
                <a href="<?php //echo base_url(); ?>admin/circular">
                <i class="fa fa-angle-double-right p-r-10"></i>
                 <span class="hide-menu"> <?php //echo $this->lang->line('manage_circular'); ?></span>
                </a>
        </li>


         <li class="<?php //if ($page_name == 'academic_syllabus') echo 'active'; ?>">
                <a href="<?php //echo base_url(); ?>admin/academic_syllabus">
                <i class="fa fa-angle-double-right p-r-10"></i>
                     <span class="hide-menu"><?php //echo $this->lang->line('syllabus'); ?></span>
                </a>
        </li>
		
		
                <li class="<?php //if ($page_name == 'noticeboard') echo 'active'; ?> ">
                <a href="<?php //echo base_url(); ?>admin/noticeboard">
                <i class="fa fa-angle-double-right p-r-10"></i>
                   <span class="hide-menu"><?php //echo $this->lang->line('manage_events'); ?></span>
                </a>
            </li>
                           
        </ul>
    </li> -->
    <?php //endif;?> <!---  Permission for Admin Manage Academics ends here ------>
                   
<!-- approved gurukul and unapproved_gurukul -->
    <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-download p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('gurukul_registration');?><span class="fa arrow"></span></span></a>
        
        <ul class="nav nav-second-level<?php
         if ($page_name == 'approved_gurukul' ||
             $page_name == 'edit_unapproved_gurukul_data')
         echo 'opened active';
         ?> ">
             <li class="<?php if ($page_name == 'approved_gurukul') echo 'active'; ?>">
                 <a href="<?php echo base_url(); ?>admin/gurukul_registration/approved_gurukul">
                     <i class="fa fa-angle-double-right p-r-10"></i>
                     <span class="hide-menu"><?php echo $this->lang->line('approved_page'); ?></span>
                 </a>
             </li>
 
             <li class="<?php if ($page_name == 'edit_unapproved_gurukul_data') echo 'active'; ?>">
                 <a href="<?php echo base_url(); ?>admin/unapproved_gurukul/unapproved">
                     <i class="fa fa-angle-double-right p-r-10"></i>
                     <span class="hide-menu"><?php echo $this->lang->line('unapproved_page'); ?></span>
                 </a>
             </li>
 
 
         </ul>
     </li>


    <!---  Permission for Admin Manage Employee starts here ------>
    <?php $check_admin_permission = $this->db->get_where('admin_role', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_employee;?>
    <?php if($check_admin_permission == '1'):?> 

        <li class="staff"> <a href="javascript:void(0);" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-angle-double-right p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('manage_employees');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level<?php if ($page_name == 'teacher')echo 'opened active';?> ">

							<li class="<?php if ($page_name == 'department') echo 'active'; ?> ">
								<a href="<?php echo base_url(); ?>department/department">
								<i class="fa fa-angle-double-right p-r-10"></i>
									 <span class="hide-menu"><?php echo $this->lang->line('department'); ?></span>
								</a>
							</li>
							<li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
								<a href="<?php echo base_url(); ?>admin/teacher">
								<i class="fa fa-angle-double-right p-r-10"></i>
									 <span class="hide-menu"><?php echo $this->lang->line('teachers'); ?></span>
								</a>
							</li>

                 		</ul>
   	 </li>
    <?php endif;?> <!---  Permission for Admin Manage Employee ends here ------>

    <!---  Permission for Admin Manage Student starts here ------>
    <?php $check_admin_permission = $this->db->get_where('admin_role', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_student;?>
    <?php if($check_admin_permission == '1'):?>          
                
        <li class="student"> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('manage_students');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level
                        <?php
            if ($page_name == 'new_student' ||
                    $page_name == 'student_class' ||
                    $page_name == 'student_information' ||
                    $page_name == 'view_student' ||
                    $page_name == 'searchStudent')
                echo 'opened active has-sub';
            ?> ">


                        
                    <li class="<?php if ($page_name == 'new_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/new_student">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                              <span class="hide-menu"><?php echo $this->lang->line('admission_form'); ?></span>
                        </a>
                    </li>


                    
                     <!-- <li class="<?php //if ($page_name == 'student_information' || $page_name == 'student_information' || $page_name == 'view_student') echo 'active'; ?> ">
                        <a href="<?php //echo base_url(); ?>admin/student_information">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                              <span class="hide-menu"><?php //echo $this->lang->line('list_students'); ?></span>
                        </a>
                    </li> -->


    <!-- <li class="<?php //if ($page_name == 'studentCategory') echo 'active'; ?> ">
                        <a href="<?php //echo base_url(); ?>studentcategory/studentCategory">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php // echo $this->lang->line('student_categories'); ?></span>
                        </a>
     </li> -->
     
     <!-- <li class="<?php //if ($page_name == 'studentHouse') echo 'active'; ?> ">
                        <a href="<?php //echo base_url(); ?>studenthouse/studentHouse">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php //echo $this->lang->line('student_house'); ?></span>
                        </a>
     </li> -->
     
     <!-- <li class="<?php //if ($page_name == 'clubActivity') echo 'active'; ?> ">
                        <a href="<?php //echo base_url(); ?>activity/clubActivity">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php //echo $this->lang->line('student_activity'); ?></span>
                        </a>
     </li> -->
     
     <!-- <li class="<?php //if ($page_name == 'socialCategory') echo 'active'; ?> ">
                        <a href="<?php //echo base_url(); ?>socialcategory/socialCategory">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php //echo $this->lang->line('social_category'); ?></span>
                        </a>
     </li> -->
        
     
                 </ul>
    </li>
    <?php endif;?> <!---  Permission for Admin Manage Student ends here ------>





    <!---  Permission for Admin Manage Attendance starts here ------>
    <?php $check_admin_permission = $this->db->get_where('admin_role', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_attendance;?>
    <?php if($check_admin_permission == '1'):?> 

        <li class="attendance"> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-hospital-o p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('manage_attendance');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'manage_attendance' || $page_name == 'attendance_report') echo 'opened active'; ?>">
                        

                    <li class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/manage_attendance/<?php echo date("d/m/Y"); ?>">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                              <span class="hide-menu"><?php echo $this->lang->line('mark_attendance'); ?></span>
                        </a>
                    </li>


                    <li class="<?php if ($page_name == 'attendance_report') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/attendance_report">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                              <span class="hide-menu"><?php echo $this->lang->line('view_attendance'); ?></span>
                        </a>
                    </li>

                
                 </ul>
                </li>
            <?php endif;?> <!---  Permission for Admin Manage Attendance ends here ------>
                
                



    <!---  Permission for Admin Manage Download Page starts here ------>
    <?php //$check_admin_permission = $this->db->get_where('admin_role', array('admin_id' => $this->session->userdata('login_user_id')))->row()->download_page;?>
    <?php //if($check_admin_permission == '1'):?> 

        <!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-download p-r-10"></i> <span class="hide-menu"><?php //echo $this->lang->line('download_page');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level -->
                        <?php
            // if ($page_name == 'assignment' ||
            //         $page_name == 'study_material')
            //     echo 'opened active';
            ?> 
            <!-- "> -->
                                     

            <!-- <li class="<?php //if ($page_name == 'assignment') echo 'active'; ?>">
                <a href="<?php //echo base_url(); ?>assignment/assignment">
                <i class="fa fa-angle-double-right p-r-10"></i>
                    <span class="hide-menu"><?php //echo $this->lang->line('assignments'); ?></span>
                </a>
            </li>

   

                <li class="<?php //if ($page_name == 'study_material') echo 'active'; ?> ">
                <a href="<?php //echo base_url(); ?>studymaterial/study_material">
                <i class="fa fa-angle-double-right p-r-10"></i>
                      <span class="hide-menu"><?php //echo $this->lang->line('study_materials'); ?></span>
                </a>
            </li> -->

     
                 <!-- </ul>
        </li> -->

        <?php //endif;?> <!---  Permission for Admin Download Page  ends here ------>
                                   


    <!---  Permission for Admin Download Parent Page starts here ------>
    <?php //$check_admin_permission = $this->db->get_where('admin_role', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_parent;?>
    <?php //if($check_admin_permission == '1'):?> 

        <!--<li class=" -->
        <?php //if($page_name == 'parent')echo 'active';?>
        <!--">-->
                    <!--<a href="-->
                    <?php //echo base_url();?>
                    <!--admin/parent" >-->
        <!--            <i class="fa fa-users p-r-10"></i>-->
                    <!--<span class="hide-menu">-->
                        <?php //echo $this->lang->line('manage_parents');?>
                        <!--</span>-->
        <!--            </a>    -->
        <!--</li>-->
    <?php //endif;?> <!---  Permission for Admin Download Page  ends here ------>



   

                
        <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-university p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('class_information');?><span class="fa arrow"></span></span></a>
        
            <ul class=" nav nav-second-level<?php
            if ($page_name == 'class' ||
                    $page_name == 'section' ||
                    $page_name == 'class_routine')
                echo 'opened active';
            ?>">


                        
                         <li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/classes">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                           <span class="hide-menu"><?php echo $this->lang->line('manage_classes'); ?></span>
                        </a>
                    </li>


                    <li class="<?php if ($page_name == 'section') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/section">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php echo $this->lang->line('manage_sections'); ?></span>
                        </a>
                    </li>   
                    
          
             
           
                 </ul>
                </li>

                



                         <li class="<?php if ($page_name == 'subject') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>subject/subject/">
                            <i class="fa fa-book p-r-10"></i>
                                 <span class="hide-menu"><?php echo $this->lang->line('manage_subjects'); ?></span>
                            </a>
                        </li>

         
         <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-medkit p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('manage_exams');?><span class="fa arrow"></span></span></a>
        
        <ul class=" nav nav-second-level<?php
        if ($page_name == 'submit_exam' || $page_name == 'grade' ||  $page_name == 'createExamination' || 
            $page_name == 'examQuestion') echo 'opened active';
        ?>">
                    
    
                    <li class="<?php if ($page_name == 'examQuestion') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/examQuestion">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                           <span class="hide-menu"><?php echo $this->lang->line('question_paper'); ?></span>
                        </a>
                    </li>

                    <!--<li class="<?php if ($page_name == 'grade') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/grade">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                           <span class="hide-menu"><?php echo $this->lang->line('exam_grades'); ?></span>
                        </a>
                    </li>-->

                    <li class="<?php if ($page_name == 'createExamination') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/createExamination">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                           <span class="hide-menu"><?php echo $this->lang->line('add_examination'); ?></span>
                        </a>
                    </li>

     
                 </ul>
                </li>


           <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('student_scores');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'marks' ||
                    $page_name == 'exam_marks_sms'||
                    $page_name == 'tabulation_sheet')
                echo 'opened active';
            ?>">
    
                    <li class="<?php if ($page_name == 'marks') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/marks">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                           <span class="hide-menu"><?php echo $this->lang->line('class_teacher'); ?></span>
                        </a>
                    </li>
            
                    <li class="<?php if ($page_name == 'student_marksheet_subject') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_marksheet_subject">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                           <span class="hide-menu"><?php echo $this->lang->line('subject_teacher'); ?></span>
                        </a>
                    </li>


  
                 </ul>
                </li>
                    
                    
        <li class="collect_fee"> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-paypal p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('fee_collection');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'income' ||
                        $page_name == 'student_payment'||
                        $page_name == 'view_invoice_details'||
                        $page_name == 'invoice_add'||
                        $page_name == 'list_invoice'||
                        $page_name == 'studentSpecificPaymentQuery'||
                        $page_name == 'student_invoice')
                echo 'opened active';
            ?>">

                 <li class="<?php if ($page_name == 'student_payment') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_payment">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('collect_fees'); ?></span>
                        </a>
                    </li>
                    
                     <li class="<?php if ($page_name == 'student_invoice') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_invoice">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('manage_invoice'); ?></span>
                        </a>
                    </li>
     
                 </ul>
                </li>
                
                
                   
                
                                    
                    <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-fax p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('expenses');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'expense' ||
                    $page_name == 'expense_category' )
                echo 'opened active';
            ?> ">
                     
                 <li class="<?php if ($page_name == 'expense') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>expense/expense">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('expense'); ?></span>
                        </a>
                    </li>



                    <li class="<?php if ($page_name == 'expense_category') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>expense/expense_category">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('expense_category'); ?></span>
                        </a>
                    </li>
     
                 </ul>
                </li>
                


                
        <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-university p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('hostel_information');?><span class="fa arrow"></span></span></a>
            <ul class=" nav nav-second-level<?php
            if ($page_name == 'dormitory' ||
                    $page_name == 'hostel_category' ||
                    $page_name == 'room_type' ||
                    $page_name == 'hostel_room' )
                echo 'opened active';
            ?>">

                <li class="<?php if ($page_name == 'dormitory') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/dormitory">
                <i class="fa fa-angle-double-right p-r-10"></i>
                   <span class="hide-menu"><?php echo $this->lang->line('manage_hostel'); ?></span>
                </a>
            </li>


                    <li class="<?php if ($page_name == 'hostel_category') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/hostel_category">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php echo $this->lang->line('hostel_category'); ?></span>
                        </a>
                    </li>

                    
                    <li class="<?php if ($page_name == 'hostel_room') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/hostel_room">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php echo $this->lang->line('hostel_room'); ?></span>
                        </a>
                    </li>
     
                 </ul>
                </li>
                
                
                
            <!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-car p-r-10"></i> <span class="hide-menu"><?php //echo $this->lang->line('transportation');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level -->
                        <?php
            // if ($page_name == 'transport' ||
            //         $page_name == 'transport_route' ||
            //         $page_name == 'vehicle' )
            //     echo 'opened active';
            ?>
            <!-- "> -->
                

        
                <!-- <li class="<?php //if ($page_name == 'transport') echo 'active'; ?> ">
                <a href="<?php //echo base_url(); ?>transportation/transport">
                <i class="fa fa-angle-double-right p-r-10"></i>
                   <span class="hide-menu"><?php //echo $this->lang->line('transports'); ?></span>
                </a>
            </li>


                    <li class="<?php //if ($page_name == 'transport_route') echo 'active'; ?> ">
                        <a href="<?php //echo base_url(); ?>transportation/transport_route">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php //echo $this->lang->line('transport_route'); ?></span>
                        </a>
                    </li>


                    
                     <li class="<?php //if ($page_name == 'vehicle') echo 'active'; ?> ">
                        <a href="<?php //echo base_url(); ?>transportation/vehicle">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php //echo $this->lang->line('manage_vehicle'); ?></span>
                        </a>
                    </li>

     
                 </ul>
                </li> -->

        
        <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-gears p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('system_settings');?><span class="fa arrow"></span></span></a>
        
        <ul class=" nav nav-second-level<?php
                if ($page_name == 'system_settings' ||
                    $page_name == 'manage_language' ||
                    $page_name == 'paymentSetting' ||
                    $page_name == 'sms_settings')
                    echo 'opened active';
                ?>">  
 
                 <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>systemsetting/system_settings">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('general_settings'); ?></span>
                        </a>
                    </li>  

                    <li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>smssetting/sms_settings">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('manage_sms_api'); ?></span>
                        </a>
                    </li>

                    <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/manage_language">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('manage_language'); ?></span>
                        </a>
                    </li>

                    <li class="<?php if ($page_name == 'paymentSetting') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>payment/paymentSetting">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('payment_settings'); ?></span>
                        </a>
                    </li>
     
                 </ul>
                </li>
                
                
        <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('generate_reports');?><span class="fa arrow"></span></span></a>
        
                        <ul class=" nav nav-second-level">  
   
                <li class="<?php if ($page_name == 'studentPaymentReport') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>report/studentPaymentReport">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                           <span class="hide-menu"><?php echo $this->lang->line('student_payments'); ?></span>
                        </a>
                </li>

                
                <li class="<?php if ($page_name == 'classAttendanceReport') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>report/classAttendanceReport">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('attendance_report'); ?></span>
                        </a>
                </li>
                
                <li class="<?php if ($page_name == 'examMarkReport') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>report/examMarkReport">
                        <i class="fa fa-angle-double-right p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('exam_mark_report'); ?></span>
                        </a>
                </li>

     
                 </ul>
                </li>


        <?php $checking_level = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->level;?>
        <?php if($checking_level == '1'):?>
        <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-cubes p-r-10"></i> <span class="hide-menu"><?php echo $this->lang->line('role_managements');?><span class="fa arrow"></span></span></a>
        
            <ul class=" nav nav-second-level<?php
                        if ($page_name == 'newAdministrator') echo 'opened active'; ?>">

                        <li class="<?php if ($page_name == 'admin_add') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/newAdministrator">
                            <i class="fa fa-angle-double-right p-r-10"></i>
                                 <span class="hide-menu"><?php echo $this->lang->line('new_admin'); ?></span>
                            </a>
                        </li>

     
                 </ul>
            </li>
        <?php endif;?>

        <?php $checking_level = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->level;?>
        <?php if($checking_level == '2'):?>
       

                        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/manage_profile">
                            <i class="fa fa-gears p-r-10"></i>
                                 <span class="hide-menu"><?php echo $this->lang->line('manage_profile'); ?></span>
                            </a>
                        </li>
        <?php endif;?>


                <li class="">
                        <a href="<?php echo base_url(); ?>login/logout">
                        <i class="fa fa-sign-out p-r-10"></i>
                             <span class="hide-menu"><?php echo $this->lang->line('logout'); ?></span>
                        </a>
                </li>
                  
                  
                </ul>
            </div>
        </div>
