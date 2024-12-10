    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                    <!-- input-group -->
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>

                <li class="user-pro">
                    <?php
                            // Set the account type (principal if on the Principal_Dashboard page)
                            if ($page_title == 'Principal_Dashboard') {
                                $key = 'principal' . '_id';
                            }else{                      
                                // Determine account type and corresponding user ID
                                $key = $this->session->userdata('login_type') . '_id';
                            }
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/principal_image/user.jpg';                                 
                            }
                            ?>

                    <a href="#" class="waves-effect"><img src="<?php echo base_url() . $face_file;?>" alt="user-img"
                            class="img-circle"> <span class="hide-menu">

                            <?php 
                                // Set the account type (principal if on the Principal_Dashboard page)
                                if ($page_title == 'Principal_Dashboard') {
                                    $account_type = 'principal';
                                }else{                      
                                    // Determine account type and corresponding user ID
                                    $account_type = $this->session->userdata('login_type');
                                }
                                $account_id     =   $account_type.'_id';
                                $name           =   $this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id), 'name');
                                echo $name;
                        ?>
                            <span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="javascript:void(0)"><i
                                    class="ti-user"></i><?php echo $this->lang->line('my_profile'); ?></a></li>
                        <li><a href="javascript:void(0)"><i
                                    class="ti-email"></i><?php echo $this->lang->line('inbox'); ?></a></li>
                        <li><a href="javascript:void(0)"><i
                                    class="ti-settings"></i><?php echo $this->lang->line('account_setting'); ?></a></li>
                         <?php if ($page_title != 'Principal_Dashboard') : ?>
                        <li><a href="<?php echo base_url();?>login/logout"><i
                                    class="fa fa-power-off"></i><?php echo $this->lang->line('logout'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <?php if ($page_title == 'Principal_Dashboard') { ?>
                    <?php $principal_id = $this->session->userdata('principal_id_data');?>
                    <li> <a href="<?php echo base_url();?>admin/principal_dashboard/<?php echo $principal_id; ?>" class="waves-effect"><i
                            class="ti-dashboard p-r-10"></i> <span
                            class="hide-menu"><?php echo $this->lang->line('Dashboard'); ?></span></a> </li>
                        <?php }else{ ?>
                            <li> <a href="<?php echo base_url();?>principal/dashboard" class="waves-effect"><i
                            class="ti-dashboard p-r-10"></i> <span
                            class="hide-menu"><?php echo $this->lang->line('Dashboard'); ?></span></a> </li>
                        <?php } ?>
                    <?php if ($page_title == 'Principal_Dashboard') { ?>
                    <li class="<?php if ($page_name == 'student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/principal_dashboard/student">
                            <i class="fa fa-paypal p-r-10"></i>
                            <span class="hide-menu"><?php echo $this->lang->line('student'); ?></span>
                        </a>
                    </li>
                    <?php }else{ ?>
                        <li class="<?php if ($page_name == 'student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>principal/student">
                            <i class="fa fa-paypal p-r-10"></i>
                            <span class="hide-menu"><?php echo $this->lang->line('student'); ?></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if ($page_title == 'Principal_Dashboard') { ?>
                <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/principal_dashboard/teacher">
                        <i class="fa fa-credit-card p-r-10"></i>
                        <span class="hide-menu"><?php echo $this->lang->line('teacher'); ?></span>
                    </a>
                </li>
                <?php }else{ ?>
                    <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>principal/teacher">
                        <i class="fa fa-credit-card p-r-10"></i>
                        <span class="hide-menu"><?php echo $this->lang->line('teacher'); ?></span>
                    </a>
                    </li>
                    <?php } ?>
                    <?php if ($page_title == 'Principal_Dashboard') { ?>
                    <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/principal_dashboard/manage_profile">
                            <i class="fa fa-gears p-r-10"></i>
                            <span class="hide-menu"><?php echo $this->lang->line('manage_profile'); ?></span>
                        </a>
                    </li>
                    <?php }else{ ?>
                    <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>principal/manage_profile">
                            <i class="fa fa-gears p-r-10"></i>
                            <span class="hide-menu"><?php echo $this->lang->line('manage_profile'); ?></span>
                        </a>
                    </li>
                    <?php } ?>
                <?php if ($page_title != 'Principal_Dashboard') : ?>
                <li class="">
                    <a href="<?php echo base_url(); ?>login/logout">
                        <i class="fa fa-sign-out p-r-10"></i>
                        <span class="hide-menu"><?php echo $this->lang->line('logout'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->