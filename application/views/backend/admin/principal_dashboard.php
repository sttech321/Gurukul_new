<!--row -->
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-user bg-megna"></i>
                <div class="bodystate">
                    <h4>
                        <?php 
                            $principal_id = $principal_data['principal_id'];
                            $this->db->select('student.gurukul_id');  // Only select teacher_id to improve performance
                            $this->db->from('student');
                            $this->db->join('principal', 'student.gurukul_id = principal.principal_id');
                            $this->db->where('principal.principal_id', $principal_id); // Match the principal ID
                            $query = $this->db->get();  // Execute the query
                            echo $query->num_rows();  // Count the number of matching rows
                            ?>
                    </h4>
                    <span class="text-muted"><?php echo $this->lang->line('student');?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-user bg-info"></i>
                <div class="bodystate">
                    <h4>
                        <?php
                            $principal_id = $principal_data['principal_id'];
                            $this->db->select('teacher.gurukul_id');  // Only select teacher_id to improve performance
                            $this->db->from('teacher');
                            $this->db->join('principal', 'teacher.gurukul_id = principal.principal_id');
                            $this->db->where('principal.principal_id', $principal_id); // Match the principal ID
                            $query = $this->db->get();  // Execute the query
                            echo $query->num_rows();  // Count the number of matching rows
                            ?>
                    </h4>
                    <span class="text-muted"><?php echo $this->lang->line('teacher');?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-user bg-success"></i>
                <div class="bodystate">
                    <h4>
                        <?php //echo $this->db->count_all_results('principal');?>
                    </h4>
                    <span class="text-muted"><?php //echo $this->lang->line('principal');?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
                <i class="ti-wallet bg-inverse"></i>
                <div class="bodystate">
                         <?php 
                            $check_daily_attendance = array('date' => date('Y-m-d'), 'status' => '1');
                            $get_attendance_information = $this->db->get_where('attendance', $check_daily_attendance);
                            $display_attendance_here = $get_attendance_information->num_rows();
                            echo $display_attendance_here;
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="white-box">
             <div class="stats-row">


                 <!-- Styles -->
                 <style>
                 #chartdiv1 {
                     width: 100%;
                     height: 500px;
                 }

                 .amcharts-chart-div a {
                     display: none !important;
                 }
                 </style>

                 <!-- Chart code -->
                 <script>
                 am4core.ready(function() {

                     // Themes begin
                     am4core.useTheme(am4themes_animated);
                     // Themes end

                     // Create chart instance
                     var chart = am4core.create("chartdiv1", am4charts.PieChart);

                     // Add data
                     chart.data = [

                         <?php $selects = $this->db->get('attendance')->result_array(); //$this->crud_model->get_invoice_info();
                            foreach ($selects as $key => $select):?>

                         {
                             "country": "<?php echo $this->crud_model->get_type_name_by_id('student', $select['student_id']);?>",
                             "litres": <?= $this->db->get_where('student', array('student_id' => $select['student_id']))->num_rows();?>
                         },
                         <?php endforeach;?>

                     ];

                     // Add and configure Series
                     var pieSeries = chart.series.push(new am4charts.PieSeries());
                     pieSeries.dataFields.value = "litres";
                     pieSeries.dataFields.category = "country";
                     pieSeries.innerRadius = am4core.percent(50);
                     pieSeries.ticks.template.disabled = true;
                     pieSeries.labels.template.disabled = true;

                     var rgm = new am4core.RadialGradientModifier();
                     rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, -0.5);
                     pieSeries.slices.template.fillModifier = rgm;
                     pieSeries.slices.template.strokeModifier = rgm;
                     pieSeries.slices.template.strokeOpacity = 0.4;
                     pieSeries.slices.template.strokeWidth = 0;

                     chart.legend = new am4charts.Legend();
                     chart.legend.position = "right";

                 }); // end am4core.ready()
                 </script>

                 <!-- HTML -->
                 <div id="chartdiv1"></div>


             </div>
         </div>
     </div>

 </div>
