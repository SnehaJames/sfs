
<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/model_bot_response_add/<?php echo $type_id;?>/<?php echo $type_name;?>');"
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo get_phrase('add_new_response');?>
</a>
<br><br>

<table class="table table-bordered datatable" id="table_export_responses">
    <thead>
    <tr>
        <th><div><?php echo get_phrase('bot_response_id');?></div></th>
        <th><div><?php echo get_phrase('name');?></div></th>
        <th><div><?php echo get_phrase('options');?></div></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $responses	=	$this->db->get_where('bot_responses', array('type' => $type_id))->result_array();
    foreach($responses as $row):?>
        <tr>
                    <td><?php echo $row['bot_response_id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                <!-- teacher EDITING LINK -->
                                <li>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/model_bot_response_edit/<?php echo $row['bot_response_id'];?>/<?php echo $type_name;?>');">
                                        <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('edit');?>
                                    </a>
                                </li>
                                <li class="divider"></li>

                                <!-- teacher DELETION LINK -->
                                <li>
                                    <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/bot_management/<?php echo $type_id?>/delete/<?php echo $row['bot_response_id'];?>');">
                                        <i class="entypo-trash"></i>
                                        <?php echo get_phrase('delete');?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </td>
                </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export_responses").dataTable({
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
