<!-- banner -->
<div class="banner">
    <!--<div class="container">
        <h2>Contrary to popular belief, Lorem Ipsum simply</h2>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
        to make Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        <a href="#">READ ARTICLE</a>
    </div>-->
</div>
<!-- technology -->
<div class="technology">
    <div class="container">
        <div class="col-md-8">
            <div class="tech-no">
                <!-- technology-top -->
                <div class="tc-ch">
                    <div id="contact" class="contact">
                        <h3>Add New Blog</h3>
                        <div class="contact-grids">
                            <form action="<?php echo base_url();?>user/add_post" method="post" >
                                <input type="text" class="longnamebox" placeholder="Blog title" name="post_title" value="<?php echo set_value('post_title') ;?>" ><br><br><br>
                                <span style="color:#CC0000"> <?php echo form_error('post_title'); ?> </span>


                                <textarea placeholder="Content..." name="post_body"><?php echo set_value('post_body') ;?></textarea>
                                <span style="color:#CC0000"> <?php echo form_error('post_body'); ?> </span>

                                <input type="submit" class="pull-left" value="publish">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- technology-top -->
                <!-- technology-top -->
                <!-- technology-top -->
                <!-- technology-top -->
                <!-- technology-top -->
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- technology-right -->
        <div class="col-md-4">

            <div class="blo-top1">
                <div class="tech-btm">
                    <h4>Profile </h4>
                    <div class="blog-grids">
                        <div class="blog-grid-right">

                            <h5><?php echo $user_details[0]->user_name ;?></h5>
                            <h5><?php echo $user_details[0]->user_email ;?></h5>
                            <br>
                            <a class="editlink" href="<?php echo base_url();?>user/edit_profile"> Edit </a>
                            <a class="editlink" href="<?php echo base_url();?>user/changepassword"> Change password </a>

                        </div>
                        <div class="clearfix"> </div>
                    </div>


                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- technology -->