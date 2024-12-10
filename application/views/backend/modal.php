<script type="text/javascript">
    function showAjaxModal(url) {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/images/preloader.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response) {
                jQuery('#modal_ajax .modal-body').html(response);

                // Initialize validation for the name field
                initializeValidation();
            }
        });
    }

    function initializeValidation() {
        // Find the input fields inside the modal
        var nameInput = $('#modal_ajax .modal-body input[name="gurukul_name"]').length ? $('#modal_ajax .modal-body input[name="gurukul_name"]') : $('#modal_ajax .modal-body input[name="name"]');
        var emailInput = $('#modal_ajax .modal-body input[name="email"]');
        var phoneInput = $('#modal_ajax .modal-body input[name="mobile_number"]').length ? $('#modal_ajax .modal-body input[name="mobile_number"]') : $('#modal_ajax .modal-body input[name="phone"]');
        var addressInput = $('#modal_ajax .modal-body input[name="address"]');
        var dateInput = $('#modal_ajax .modal-body input[name="trust_registration_date"]').length ? $('#modal_ajax .modal-body input[name="trust_registration_date"]') : $('#modal_ajax .modal-body input[name="birthday"]');
        // Validate name input
        nameInput.on('input', function() {
            var nameValue = $(this).val();
            // Check if the name field is empty
            if (nameValue.trim() === "") {
                $('#nameError').remove(); // Remove any previous error message
                $(this).after('<span id="nameError" style="color: red;">Name is required</span>');
            } else {
                $('#nameError').remove(); // Remove validation message if any
            }
        });

        // Validate email input
        emailInput.on('input', function() {
            var emailValue = $(this).val();
            // Check if the email field is empty
            if (emailValue.trim() === "" || !validateEmail(emailValue)) {
                $('#emailError').remove(); // Remove any previous error message
                $(this).after('<span id="emailError" style="color: red;">Enter valid email address</span>');
            } else {
                $('#emailError').remove(); // Remove validation message if any
            }
        });

        // Validate phone input
        phoneInput.on('input', function() {
            var phoneValue = $(this).val();
            // Check if the phone field is empty
            if (phoneValue.trim() === "" || !validatePhone(phoneValue)) {
                $('#phoneError').remove(); // Remove any previous error message
                $(this).after('<span id="phoneError" style="color: red;">Enter valid phone number is required minimum 10 digits</span>');
            } else {
                $('#phoneError').remove(); // Remove validation message if any
            }
        });
    
        // Validate address input
        addressInput.on('input', function() {
            var addressValue = $(this).val();
            // Check if the address field is empty
            if (addressValue.trim() === "") {
                $('#addressError').remove(); // Remove any previous error message
                $(this).after('<span id="addressError" style="color: red;">Address field is required</span>');
            } else {
                $('#addressError').remove(); // Remove validation message if any
            }
        });

        // Validate date input
        dateInput.on('input', function() {
            var dateValue = $(this).val();
            // Check if the date field is empty
            if (dateValue.trim() === "") {
                $('#dateError').remove(); // Remove any previous error message
                $(this).after('<span id="dateError" style="color: red;">Date field is required</span>');
            } else {
                $('#dateError').remove(); // Remove validation message if any
            }
        });
    }

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePhone(phone) {
        const phonepattern = /^\d{10}$/;
        return phonepattern.test(phone);
    }
</script>
<!-- (Ajax Modal)-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="modal_ajax">
    <div class="modal-dialog modal-lg">
        <div class="modal-content slimscrollsidebar">
            <div class="modal-body " style="height:400px"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<!-- (Normal Modal)-->
<div class="modal fade" id="modal-4">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:left;"><strong style="color:#FFFFFF"><?php echo $this->lang->line('confirmation'); ?>&nbsp;!!!</strong></h4>
            </div>
            

            <div class="modal-footer" align="center">
            <div class="row">
                <div class="col-sm-7">
                <?php echo $this->lang->line('confirm_delete'); ?>
            </div>
                <div class="col-sm-5">
                <a href="#" class="btn btn-success btn-rounded btn-sm" id="delete_link"><i class="fa fa-check">&nbsp;</i><?php echo $this->lang->line('delete'); ?></a>
                <button type="button" class="btn btn-info btn-rounded btn-sm" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i><?php echo $this->lang->line('cancel'); ?></button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirm_modals(delete_url)
    {
        jQuery('#modal-5').modal('show', {backdrop: 'static'});
        document.getElementById('delete_links').setAttribute('href' , delete_url);
    }
</script>
<!-- (Normal Modal)-->
<div class="modal fade" id="modal-5">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:left;"><strong style="color:#FFFFFF"><?php echo $this->lang->line('confirmation'); ?>&nbsp;!!!</strong></h4>
            </div>
            <div class="modal-footer" align="center">
            <div class="row">
                <div class="col-sm-7">	
                <?php echo $this->lang->line('confirm_approval'); ?>
            </div>
                <div class="col-sm-5">	
                <a href="#" class="btn btn-success btn-rounded btn-sm" id="delete_links"><i class="fa fa-check">&nbsp;</i><?php echo $this->lang->line('approve'); ?></a>
                <button type="button" class="btn btn-info btn-rounded btn-sm" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i><?php echo $this->lang->line('cancel'); ?></button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>