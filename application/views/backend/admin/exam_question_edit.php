<?php $exam_question = $this->db->get_where('exam_question', array('exam_question_id' => $param2))->result_array();
            foreach($exam_question as $key => $exam_question):?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo $this->lang->line('edit_exam_question'); ?></div>
            <div class="panel-body">
                <?php echo form_open(base_url().'admin/examQuestion/update/'. $param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>



                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('name'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" value="<?php echo $exam_question['name'];?>" name="name"
                            / required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('class'); ?></label>
                    <div class="col-sm-12">
                        <select name="class_id" id="class_id" class="form-control select2"
                            onchange="return get_class_subject(this.value)">
                            <option value=""><?php echo $this->lang->line('select_class'); ?></option>

                            <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                            <option value="<?php echo $class['class_id'];?>"
                                <?php if($exam_question['class_id'] == $class['class_id']) echo 'selected';?>>
                                <?php echo $class['name'];?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('subject'); ?></label>
                    <div class="col-sm-12">
                        <select name="subject_id" class="form-control" id="subject" / required>
                            <option value=""><?php echo $this->lang->line('select_subject'); ?></option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('select_date'); ?></label>
                    <div class="col-sm-12">

                        <input type="date" name="timestamp" value="<?php echo $exam_question['timestamp'];?>"
                            class="form-control datepicker" id="example-date-input" required>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo $this->lang->line('select_teacher'); ?></label>
                    <div class="col-sm-12">

                        <select name="teacher_id" class="form-control select2" style="width:100%;" required>
                            <option value=""><?php echo $this->lang->line('select'); ?></option>

                            <?php $teacher =  $this->db->get('teacher')->result_array();
                                    foreach($teacher as $key => $teacher):?>
                            <option value="<?php echo $teacher['teacher_id'];?>"
                                <?php if($exam_question['teacher_id']== $teacher['teacher_id']) echo 'selected';?>>
                                <?php echo $teacher['name'];?></option>
                            <?php endforeach;?>

                        </select>


                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('file_type'); ?></label>
                    <div class="col-sm-12">

                        <select name="file_type" class="form-control select2" style="width:100%;" required>
                            <option value=""><?php echo $this->lang->line('file_type'); ?></option>


                            <option value="pdf" <?php if($exam_question['file_type'] == 'pdf') echo 'selected';?>>
                                <?php echo $this->lang->line('pdf'); ?></option>
                            <option value="xlsx" <?php if($exam_question['file_type'] == 'xlsx') echo 'selected';?>>
                                <?php echo $this->lang->line('excel'); ?></option>
                            <option value="docx" <?php if($exam_question['file_type'] == 'docx') echo 'selected';?>>
                                <?php echo $this->lang->line('word_document'); ?></option>
                            <option value="img" <?php if($exam_question['file_type'] == 'img') echo 'selected';?>>
                                <?php echo $this->lang->line('image'); ?></option>
                            <option value="txt" <?php if($exam_question['file_type'] == 'txt') echo 'selected';?>>
                                <?php echo $this->lang->line('text_file'); ?></option>


                        </select>


                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('status'); ?></label>
                    <div class="col-sm-12">

                        <select name="status" class="form-control select2" style="width:100%;" required>
                            <option value=""><?php echo $this->lang->line('status'); ?></option>


                            <option value="0" <?php if($exam_question['status'] == '0') echo 'selected';?>>
                                <?php echo $this->lang->line('pending'); ?></option>
                            <option value="1" <?php if($exam_question['status'] == '1') echo 'selected';?>>
                                <?php echo $this->lang->line('approve'); ?></option>
                            <option value="2" <?php if($exam_question['status'] == '2') echo 'selected';?>>
                                <?php echo $this->lang->line('disapprove'); ?></option>



                        </select>


                    </div>
                </div>




                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo $this->lang->line('description'); ?></label>
                    <div class="col-sm-12">
                        <textarea name="description"
                            class="form-control"><?php echo $exam_question['description'];?></textarea>
                    </div>
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-sm btn-rounded"> <i
                            class="fa fa-edit"></i>&nbsp;<?php echo $this->lang->line('edit_exam_question'); ?></button>
                </div>

                <?php echo form_close();?>


            </div>
        </div>
    </div>
</div>
<?php endforeach;?>



<script type="text/javascript">
function get_class_subject(class_id) {

    $.ajax({
        url: '<?php echo base_url();?>admin/get_class_subject/' + class_id,
        success: function(response) {
            jQuery('#subject').html(response);
        }
    });

}
</script>