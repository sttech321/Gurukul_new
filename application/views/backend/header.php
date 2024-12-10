 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part logoImageWrap"><a class="logo" href="#"><img src="<?php echo base_url();?>uploads/gurukul_logo.svg" width="150" height="45" alt="home" /><span class="hidden-xs"><strong></strong></span></a></div>
                    <ul class="nav navbar-top-links navbar-left hidden-xs">
                        <li><a href="javascript:void(0)" class="open-close hidden-xs "><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                        <li>
                            <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                        <?php $current_lang = $this->session->userdata('site_lang') ?? 'english';?>
                            <li><a href="<?php echo current_url() . '?lang=english'; ?>">English</a></li>
                            <li><a href="<?php echo current_url() . '?lang=hindi'; ?>">हिंदी</a></li>
                        </li>
                    </ul>

                    <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                                <?php
                                    // Set the account type (principal if on the Principal_Dashboard page)
                                    if ($page_title == 'Principal_Dashboard') {
                                        $account_type = 'principal';
                                    }else{                      
                                        // Determine account type and corresponding user ID
                                        $account_type = $this->session->userdata('login_type');
                                    }
                                    $key = $account_type . '_id';
                                    $account_id = $this->session->userdata($key);

                                    // Default profile image path based on the account type and ID
                                    $face_file = 'uploads/' . $account_type . '_image/' . $account_id . '.jpg';
                                    $name = $this->crud_model->get_type_name_by_id($account_type, $account_id, 'name');
                                    if (!file_exists(FCPATH . $face_file)) {
                                        // Fallback to a default image if the file does not exist
                                        $face_file = 'uploads/principal_image/user.jpg';                                 
                                    }
                                    // Fetch the name of the user from the database
                                ?>
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo base_url() . $face_file;?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">
                                <?php echo $name; ?>
                        </b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                            <?php if($account_type == 'parent'):?>
                            <a href="<?php echo base_url();?>parents/manage_profile"><i class="ti-user"></i><?php echo $this->lang->line('edit_profile'); ?></a>
                            <?php endif;?>
                            <?php //if($account_type != 'parent'):?>
                            <!-- <a href="<?php //echo base_url();?><?php //echo $this->session->userdata('login_type'); ?>/manage_profile"><i class="ti-user"></i> <?php //echo $this->lang->line('edit_profile'); ?></a> -->
                            <?php //endif;?>
                            <?php if($account_type == 'principal'):?>
                            <a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type'); ?>/principal_dashboard/manage_profile"><i class="ti-user"></i> <?php echo $this->lang->line('edit_profile'); ?></a>
                            <?php endif;?>
                            <?php if($account_type != 'principal'):?>
                            <a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type'); ?>/principal_dashboard/manage_profile"><i class="ti-user"></i> <?php echo $this->lang->line('edit_profile'); ?></a>
                            <?php endif;?>
                            </li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i>  <?php echo $this->lang->line('inbox'); ?></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i>  <?php echo $this->lang->line('account_setting'); ?></a></li>
                            <!-- Logout Section -->
                            <?php if ($page_title != 'Principal_Dashboard') : ?>
                                <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i>  <?php echo $this->lang->line('logout'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- <li class="right-side-toggle"> <a class="" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
                    <!-- /.dropdown -->
                </ul>
            </div>
        </nav>