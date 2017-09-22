<!-- banner -->
<div class="banner1">

</div>
<!-- technology -->
<div class="technology-1">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="business">
                <div id="contact" class="contact">
                    <h3>Change Password
                        <a  class="backlink" href="<?php echo base_url(); ?>user/myaccount"> << back</a>
                    </h3>
                    <div class="contact-grids">
                        <form method="post" action="<?php echo base_url();?>user/user_change_password">
                            <input type="text" class="longnamebox" placeholder="old password" name="old_password" value="<?php echo set_value('old_password') ;?>"><br><br><br>
                            <span style="color:#CC0000"> <?php echo form_error('old_password'); ?> </span>

                            <input type="text" class="longnamebox" placeholder="new Password" name="new_password" value="<?php echo set_value('new_password') ;?>"><br><br><br>
                            <span style="color:#CC0000"> <?php echo form_error('new_password'); ?> </span>

                            <input type="text" class="longnamebox" placeholder="confirm Password" name="confirm_new_password" value="<?php echo set_value('confirm_new_password') ;?>"><br><br><br>
                            <span style="color:#CC0000"> <?php echo form_error('confirm_new_password'); ?> </span>

                            <input type="submit" value="update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right-1">




        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>
<!-- technology -->