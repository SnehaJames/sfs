<div class="row">
    <div class="col-md-12">
        <div class="mail-header" style="padding-bottom: 27px ;">
            <!-- title -->
            <h3 class="mail-title">
                <?php echo get_phrase('write_new_message'); ?>
            </h3>
        </div>

        <div class="mail-compose">

            <?php echo form_open(base_url() . 'index.php?admin/send_message/'.$param2.'/send/'. $param3, array('class' => 'form', 'enctype' => 'multipart/form-data')); ?>

            <div class="form-group">
                <label for="subject"><?php echo get_phrase('recipient'); ?>:</label>
                <br><br>
                <input type="text" value="<?php echo rawurldecode($param4); ?>" disabled>
            </div>

            <div class="compose-message-editor">
        <textarea row="2" class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css"
                  name="message" placeholder="<?php echo get_phrase('write_your_message'); ?>"
                  id="sample_wysiwyg"></textarea>
            </div>

            <hr>

            <button type="submit" class="btn btn-success btn-icon pull-right">
                <?php echo get_phrase('send'); ?>
                <i class="entypo-mail"></i>

            </button>
            <?php echo form_close();?>

        </div>
    </div>
</div>

