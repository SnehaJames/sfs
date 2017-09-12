<hr />

<div class="row">
    <?php echo form_open(base_url() . 'index.php?admin/bot_profile/do_update' ,
        array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
    <div class="col-md-6">

        <div class="panel panel-primary" >

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('bot_profile');?>
                </div>
            </div>

            <div class="panel-body">

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('bot_name');?></label>
                    <div class="col-sm-9">
                        <input type="text"  class="form-control" name="bot_name"
                               value="<?php echo $this->db->get_where('bot_profile' , array('type' =>'bot_name'))->row()->description;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('about_school');?></label>
                    <div class="col-sm-9">
                        <textarea rows="3" wrap="physical" class="form-control" name="about_school"><?php echo $this->db->get_where('bot_profile' , array('type' =>'about_school'))->row()->description;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('management_and_staff');?></label>
                    <div class="col-sm-9">
                        <textarea rows="3"  class="form-control" name="management_staff"><?php echo $this->db->get_where('bot_profile' , array('type' =>'management_staff'))->row()->description;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('admission_procedure');?></label>
                    <div class="col-sm-9">
                         <textarea rows="3"  class="form-control" name="admission_procedure"><?php echo $this->db->get_where('bot_profile' , array('type' =>'admission_procedure'))->row()->description;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
                    </div>
                </div>
                <?php echo form_close();?>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <?php echo form_open(base_url() . 'index.php?admin/bot_profile/upload_logo' , array(
            'class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

        <div class="panel panel-primary" >

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('upload_logo');?>
                </div>
            </div>

            <div class="panel-body">


                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

                    <div class="col-sm-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                <img src="<?php echo base_url();?>uploads/bot_logo.png" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select image</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" accept="image/*">
                                      </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('upload');?></button>
                    </div>
                </div>

            </div>

        </div>

        <?php echo form_close();?>


        <?php echo form_open(base_url() . 'index.php?admin/bot_profile/upload_baner' , array(
            'class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

        <div class="panel panel-primary" >

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('upload_baner');?>
                </div>
            </div>

            <div class="panel-body">


                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

                    <div class="col-sm-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                <img src="<?php echo base_url();?>uploads/bot_baner.png" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select image</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" accept="image/*">
                                      </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('upload');?></button>
                    </div>
                </div>

            </div>

        </div>

        <?php echo form_close();?>

    </div>

</div>

