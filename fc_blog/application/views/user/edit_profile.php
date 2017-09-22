<!-- banner -->
<div class="banner1">

</div>
<!-- technology -->
<div class="technology-1">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="business">
                <div id="contact" class="contact">
                    <h3>Edit your profile
                        <a  class="backlink" href="<?php echo base_url(); ?>user/myaccount"> << back</a>
                    </h3>
                    <div class="contact-grids">
                        <form action="<?php echo base_url(); ?>user/edit_user_profile" method="post">
                            <input type="text" class="longnamebox" name="user_name" value="<?php echo $user_details[0]->user_name ;?>"><br><br><br>

                            <input type="text" class="longnamebox" name="user_email" value="<?php echo $user_details[0]->user_email ; ?>"><br><br><br>

                            <input type="submit" value="Sign in">
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