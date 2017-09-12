<div class="row">
    <div class="col-md-8">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('student_bulk_import');?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/student_bulk_import_api' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

                    <div class="col-sm-5">
                        <select name="class_id" class="form-control" data-validate="required" id="class_id"
                                data-message-required="<?php echo get_phrase('value_required');?>"
                                onchange="return get_class_sections(this.value)">
                            <option value=""><?php echo get_phrase('select');?></option>
                            <?php
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row):
                                ?>
                                <option value="<?php echo $row['class_id'];?>">
                                    <?php echo $row['name'];?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
                    <div class="col-sm-5">
                        <select name="section_id" class="form-control" id="section_selector_holder">
                            <option value=""><?php echo get_phrase('select_class_first');?></option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Excel File');?></label>

                    <div class="col-sm-5">
                        <div class="fileinput fileinput-new" data-provides="fileinput" >
                            <div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select File</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept=".xlsx" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
									</span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('import');?></button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <blockquote class="blockquote-blue">
            <p>
                <strong>Notes</strong>
            </p>
            <p>
                1. Download Sample file <a href=<?php echo base_url().'uploads/sample.xlsx'; ?>>here</a><br>
                2. The fields which are marked red are required. <br>
                3. RollNumber field is numaric. <br>
                4. Please check and recheck the informations you have inserted because once you admit new student, you won't be able
                to edit his/her class,roll,section without promoting to the next session.
            </p>
        </blockquote>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('status_of_uploaded_files');?>
                </div>

            </div>

            <div class="panel-body">
                <table class="table table-bordered datatable" id="table_onprocess">
                    <thead>
                    <tr>
                        <th width="80"><div><?php echo get_phrase('filecode');?></div></th>
                        <th><div><?php echo get_phrase('datetime(m/d/y)');?></div></th>
                        <th><div><?php echo get_phrase('status');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $teachers	=	$this->db->get('student_bulk_import' )->result_array();
                    $teachers = array_reverse($teachers);
                    foreach($teachers as $row):?>
                        <tr>
                            <td><?php echo $row['filename'];?></td>
                            <td><?php echo $row['datetime'];?></td>
                            <td><?php echo $row['status'];?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_onprocess").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "xls",
                        "mColumns": [1,2]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"	   : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(0, false);
                            datatable.fnSetColumnVis(3, false);

                            this.fnPrint( true, oConfig );

                            window.print();

                            $(window).keyup(function(e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(0, true);
                                    datatable.fnSetColumnVis(3, true);
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

<script type="text/javascript">
    function get_class_sections(class_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });
    }
</script>

