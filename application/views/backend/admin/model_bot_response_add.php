<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_response');?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/bot_management/'. $param2 .'/add/'. $param3 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"  autofocus
                               value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"  autofocus
                               value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('subtitle');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="subtitle" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
                               value="" />
                    </div>
                </div>



                <?php if($param3 == 'video') : ?>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('video_url');?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="video" value="" disabled>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('video');?></label>

                        <div class="col-sm-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>Upload less then 2 min length & less then 8MB</div>
                                <div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select Video</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="videofile" accept="video/*" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" >
									</span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('image_url');?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="image" value="" disabled>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('image');?></label>

                        <div class="col-sm-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/200x200" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/*" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" >
									</span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-default"><?php echo get_phrase('add_response');?></button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>