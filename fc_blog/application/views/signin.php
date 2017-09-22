<!-- banner -->
<div class="banner1"></div>
<!-- technology -->
<div class="technology-1">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="business">
                <div id="contact" class="contact">
                    <h3>Sign in</h3>
                    <div class="contact-grids">
                        <form action="<?php echo base_url();?>user/user_signin" method="post" >
                            <input type="text" class="longnamebox" placeholder="Email" name="user_email" value="<?php echo set_value('user_email') ;?>" ><br><br><br>
                            <span style="color:#CC0000"> <?php echo form_error('user_email'); ?> </span>

                            <input type="text" class="longnamebox" placeholder="Password" name="user_password" value="<?php echo set_value('user_password') ;?>"><br><br><br>
                            <span style="color:#CC0000"> <?php echo form_error('user_password'); ?> </span>


                            <input type="submit" value="Sign in">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right-1">
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4>Top stories of the week </h4>
                    <div class="blog-grids">

                        <div class="blog-grid-right">
                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-right">
                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-right">
                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-right">
                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-right">
                            <h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>
<!-- technology -->