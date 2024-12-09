<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">

                <?php echo $this->lang->line('exam_question_paper');?>


                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i
                            class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('add_new_question_paper'); ?><i
                            class="btn btn-info btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div>
            </div>
            <div class="panel-wrapper collapse out" aria-expanded="true">
                <div class="panel-body">
                    <?php echo form_open(base_url().'admin/examQuestion/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>



                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('name');?></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" / required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('class');?></label>
                        <div class="col-sm-12">
                            <select name="class_id" id="class_id" class="form-control select2"
                                onchange="return get_class_subject(this.value)">
                                <option value=""><?php echo $this->lang->line('select_class');?></option>

                                <?php $class =  $this->db->get('class')->result_array();
                    foreach($class as $key => $class):?>
                                <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
                                <?php endforeach;?>
                            </select>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('subject');?></label>
                        <div class="col-sm-12">
                            <select name="subject_id" class="form-control" id="subject_selector_holder">
                                <option value=""><?php echo $this->lang->line('select_subject');?></option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('select_date');?></label>
                        <div class="col-sm-12">

                            <input type="date" name="timestamp" value="<?php echo date('Y-m-d');?>"
                                class="form-control datepicker" id="example-date-input" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('select_teacher');?></label>
                        <div class="col-sm-12">

                            <select name="teacher_id" class="form-control select2" style="width:100%;" required>
                                <option value=""><?php echo get_phrase('select');?></option>

                                <?php $teacher =  $this->db->get('teacher')->result_array();
                                    foreach($teacher as $key => $teacher):?>
                                <option value="<?php echo $teacher['teacher_id'];?>"><?php echo $teacher['name'];?>
                                </option>
                                <?php endforeach;?>

                            </select>


                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('file_type');?></label>
                        <div class="col-sm-12">

                            <select name="file_type" class="form-control select2" style="width:100%;" required>
                                <option value=""><?php echo get_phrase('file_type');?></option>


                                <option value="pdf"><?php echo $this->lang->line('pdf');?></option>
                                <option value="xlsx"><?php echo $this->lang->line('excel');?></option>
                                <option value="docx"><?php echo $this->lang->line('word_document');?></option>
                                <option value="img"><?php echo $this->lang->line('image');?></option>
                                <option value="txt"><?php echo $this->lang->line('text_file');?></option>


                            </select>


                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo $this->lang->line('status');?></label>
                        <div class="col-sm-12">

                            <select name="status" class="form-control select2" style="width:100%;" required>
                                <option value=""><?php echo get_phrase('status');?></option>

                                <option value="0"><?php echo $this->lang->line('pending');?></option>
                                <option value="1"><?php echo $this->lang->line('approve');?></option>
                                <option value="2"><?php echo $this->lang->line('disapprove');?></option>



                            </select>


                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('description');?></label>
                        <div class="col-sm-12">
                            <textarea name="description" class="form-control textarea_editor"></textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-12"
                            for="example-text"><?php echo $this->lang->line('select_document');?></label>
                        <div class="col-sm-12">
                            <input type="file" name="file_name" class="dropify" required>
                        </div>
                    </div>




                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block btn-sm btn-rounded"> <i
                                class="fa fa-plus"></i>&nbsp;<?php echo $this->lang->line('add_exam_question');?></button>
                    </div>
                    <br>
                    <?php echo form_close();?>


                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo $this->lang->line('list');?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body table-responsive">

                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo $this->lang->line('file_type');?></th>
                                <th><?php echo $this->lang->line('title');?></th>
                                <th><?php echo $this->lang->line('class');?></th>
                                <th><?php echo $this->lang->line('subject');?></th>
                                <th><?php echo $this->lang->line('teacher');?></th>
                                <th><?php echo $this->lang->line('description');?></th>
                                <th><?php echo $this->lang->line('status');?></th>
                                <th><?php echo $this->lang->line('options');?></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $counter = 1; $exam_questions = $this->db->get('exam_question')->result_array();
                foreach($exam_questions as $key => $exam_question):?>
                            <tr>
                                <td><?php echo $counter++;?></td>
                                <td>
                                    <?php if($exam_question['file_type']=='img' || $exam_question['file_type']== 'jpg' || $exam_question['file_type']== 'png'){?>
                                    <img src="<?php echo base_url();?>optimum/images/image.png"
                                        style="max-height:40px;">
                                    <?php }?>
                                    <?php if($exam_question['file_type']=='docx'){?>
                                    <img src="<?php echo base_url();?>optimum/images/doc.jpg" style="max-height:40px;">
                                    <?php }?>
                                    <?php if($exam_question['file_type']=='pdf'){?>
                                    <img src="<?php echo base_url();?>optimum/images/pdf.jpg" style="max-height:40px;">
                                    <?php }?>
                                    <?php if($exam_question['file_type']=='xlsx'){?>
                                    <img src="<?php echo base_url();?>optimum/images/text.png" style="max-height:40px;">
                                    <?php }?>
                                    <?php if($exam_question['file_type']=='txt'){?>
                                    <img src="<?php echo base_url();?>optimum/images/text.png" style="max-height:40px;">
                                    <?php }?>


                                </td>
                                <td><?php echo $exam_question['name'];?></td>
                                <td><?php echo $this->db->get_where('class', array('class_id' => $exam_question['class_id']))->row()->name;?>
                                </td>
                                <td><?php echo $this->db->get_where('subject', array('subject_id' => $exam_question['subject_id']))->row()->name;?>
                                </td>
                                <td><?php echo $this->db->get_where('teacher', array('teacher_id' => $exam_question['teacher_id']))->row()->name;?>
                                </td>
                                <td><?php echo $exam_question['description'];?></td>
                                <td>
                                    <span
                                        class="label label-<?php if($exam_question['status']== '0') echo 'warning'; elseif($exam_question['status']== '1') echo 'success'; else echo 'danger';?>">

                                        <?php if($exam_question['status']== '0'):?>
                                        Pending...
                                        <?php endif;?>

                                        <?php if($exam_question['status']== '1'):?>
                                        Approved
                                        <?php endif;?>

                                        <?php if($exam_question['status']== '2'):?>
                                        Disapproved
                                        <?php endif;?>


                                    </span>
                                </td>
                                <td>
                                    <a
                                        href="<?php echo base_url().'uploads/exam_question/'. $exam_question['file_name'];?>"><button
                                            type="button" class="btn btn-info btn-circle btn-xs"><i
                                                class="fa fa-download"></i></button></a>
                                    <a
                                        onclick="showAjaxModal('<?php echo base_url();?>modal/popup/exam_question_edit/<?php echo $exam_question['exam_question_id'];?>');"><button
                                            type="button" class="btn btn-success btn-circle btn-xs"><i
                                                class="fa fa-pencil"></i></button></a>
                                    <a
                                        href="<?php echo base_url();?>admin/examQuestion/delete/<?php echo $exam_question['exam_question_id'];?>"><button
                                            type="button" class="btn btn-danger btn-circle btn-xs"
                                            onclick="return confirm('Are you sure to delete?');"><i
                                                class="fa fa-times"></i></button></a>


                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function get_class_subject(class_id) {
    $.ajax({
        url: '<?php echo base_url();?>admin/get_class_subject/' + class_id,
        success: function(response) {
            jQuery('#subject_selector_holder').html(response);
        }

    });
}
</script>