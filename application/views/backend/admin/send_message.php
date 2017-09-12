<hr/>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered datatable" id="table_export">
            <thead>
            <tr>
                <th width="80">
                    <div><?php echo get_phrase('student_photo'); ?></div>
                </th>
                <th>
                    <div><?php echo get_phrase('student_name'); ?></div>
                </th>
                <th>
                    <div><?php echo get_phrase('section'); ?></div>
                </th>
                <th class="span3">
                    <div><?php echo get_phrase('parent_name'); ?></div>
                </th>
                <th>
                    <div><?php echo get_phrase('options'); ?></div>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php

            $query =  'SELECT s.name as student_name ,e.section_id, s.student_id , p.name as parent_name, p.parent_id, p.fb_id ';
            $query .= "FROM student s inner join parent p on s.parent_id = p.parent_id  ";
            $query .= "inner join enroll e on s.student_id = e.student_id ";
            $query .= "WHERE e.class_id = $class_id && e.year = '$running_year' && p.fb_id <> '' && p.fb_id IS NOT NULL";

            $data = $this->db->query($query)->result_array();

            foreach ($data as $row):?>
                <tr>

                    <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>

                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $this->crud_model->get_section_name($row['section_id']);?></td>
                    <td><?php echo $row['parent_name']; ?></td>

                    <td>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                <!-- SEND MESSAGE  -->
                                <li>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/model_send_message/<?php echo $class_id; ?>/<?php echo $row['fb_id']; ?>/<?php echo $row['parent_name']; ?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('send_message');?>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function ($) {


        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "xls",
                        "mColumns": [0, 2, 3, 4]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [0, 2, 3, 4]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText": "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(1, false);
                            datatable.fnSetColumnVis(5, false);

                            this.fnPrint(true, oConfig);

                            window.print();

                            $(window).keyup(function (e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(1, true);
                                    datatable.fnSetColumnVis(5, true);
                                }
                            });
                        },

                    },
                ]
            },

        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>