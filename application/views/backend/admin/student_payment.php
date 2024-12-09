<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"> <i
                    class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('create_single_invoice'); ?></div>
            <div class="panel-body table-responsive">

                <!----CREATION FORM STARTS---->

                <?php echo form_open(base_url() . 'admin/student_payment/single_invoice' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('invoice_number'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="invoice_number"
                            value="<?php echo rand(10000, 1000000). 'INV'. date('Y');?>" / required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_title'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="title" / required>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('class'); ?></label>
                    <div class="col-sm-12">
                        <select name="class_id" id="class_id" class="form-control select2"
                            onchange="return get_class_student(this.value)">
                            <option value=""><?php echo $this->lang->line('select_class'); ?></option>

                            <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                            <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('student'); ?></label>
                    <div class="col-sm-12">
                        <select name="student_id" class="form-control" id="student_selector_holder">
                            <option value=""><?php echo get_phrase('select_student');?></option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('select_date'); ?></label>
                    <div class="col-sm-12">
                        <input type="date" name="creation_timestamp" value="<?php echo date('Y-m-d');?>"
                            class="form-control datepicker" id="example-date-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_amount'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="amount" / required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('payment_discount'); ?>
                        %</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="discount" value="0">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('acount_paid'); ?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="amount_paid" value="0">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_status'); ?></label>
                    <div class="col-sm-12">
                        <select name="status" class="form-control select2" required>
                            <option value=""><?php echo $this->lang->line('payment_status'); ?></option>
                            <option value="1"><?php echo $this->lang->line('paid'); ?></option>
                            <option value="2"><?php echo $this->lang->line('unpaid'); ?></option>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_method'); ?></label>
                    <div class="col-sm-12">
                        <select name="payment_method" class="form-control select2" required>
                            <option value=""><?php echo $this->lang->line('payment_method'); ?></option>
                            <option value="1"><?php echo $this->lang->line('card'); ?></option>
                            <option value="2"><?php echo $this->lang->line('cash'); ?></option>
                            <option value="3"><?php echo $this->lang->line('cheque'); ?></option>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('description'); ?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i
                            class="fa fa-plus"></i>&nbsp;<?php echo $this->lang->line('create'); ?></button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!----CREATION FORM ENDS-->

    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"> <i
                    class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('create_mass_invoice'); ?></div>
            <div class="panel-body table-responsive">

                <?php echo form_open(base_url() . 'admin/student_payment/mass_invoice' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('invoice_number'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="invoice_number"
                            value="<?php echo rand(10000, 1000000). 'INV'. date('Y');?>" / required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_title'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="title" / required>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('class'); ?></label>
                    <div class="col-sm-12">
                        <select name="class_id" id="class_id" class="form-control select2"
                            onchange="return get_class_mass_student(this.value)">
                            <option value=""><?php echo $this->lang->line('select_class'); ?></option>

                            <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                            <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('student'); ?></label>
                    <div class="col-sm-12">
                        <div id="mass_student_selector_holder"></div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('select_date'); ?></label>
                    <div class="col-sm-12">
                        <input type="date" name="creation_timestamp" value="<?php echo date('Y-m-d');?>"
                            class="form-control datepicker" id="example-date-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_amount'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="amount" / required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('payment_discount'); ?>
                        %</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="discount" value="0">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('amount_paid'); ?></label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="amount_paid" value="0">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_status'); ?></label>
                    <div class="col-sm-12">
                        <select name="status" class="form-control select2" required>
                            <option value=""><?php echo $this->lang->line('payment_status'); ?></option>
                            <option value="1"><?php echo $this->lang->line('paid'); ?></option>
                            <option value="2"><?php echo $this->lang->line('unpaid'); ?></option>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('payment_method'); ?></label>
                    <div class="col-sm-12">
                        <select name="payment_method" class="form-control select2" required>
                            <option value=""><?php echo $this->lang->line('payment_method'); ?></option>
                            <option value="1"><?php echo $this->lang->line('card'); ?></option>
                            <option value="2"><?php echo $this->lang->line('cash'); ?></option>
                            <option value="3"><?php echo $this->lang->line('cheque'); ?></option>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('description'); ?></label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i
                            class="fa fa-plus"></i>&nbsp;<?php echo $this->lang->line('create'); ?></button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!----TABLE LISTING ENDS--->

<script type="text/javascript">
function select() {
    var chk = $('.check');
    for (i = 0; i < chk.length; i++) {
        chk[i].checked = true;
    }
}

function unselect() {
    var chk = $('.check');
    for (i = 0; i < chk.length; i++) {
        chk[i].checked = false;
    }
}


function get_class_student(class_id) {
    $.ajax({
        url: '<?php echo base_url();?>admin/get_class_student/' + class_id,
        success: function(response) {
            jQuery('#student_selector_holder').html(response);
        }

    });
}
</script>

<script type="text/javascript">
function get_class_mass_student(class_id) {
    $.ajax({
        url: '<?php echo base_url();?>admin/get_class_mass_student/' + class_id,
        success: function(response) {
            jQuery('#mass_student_selector_holder').html(response);
        }

    });
}
</script>