


<!-- banner -->
<div class="banner1">

</div>
<!-- technology -->
<div class="technology-1">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="business">
                <div class=" blog-grid2">

                    <div class="blog-text">
                        <h5><?php echo $blog_details[0]->post_title ;?></h5>
                        <p><?php echo $blog_details[0]->post_body ;?></p>

                        <div class="blog-poast-info">
                            <ul>
                                <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"><?php echo $user_details[0]->user_name ;?></a></li>
                                <li><i class="glyphicon glyphicon-calendar"> </i><?php echo $blog_details[0]->created_at ;?></li>
                                <li><i class="glyphicon glyphicon-calendar"> </i><?php echo $this->common->time_elapsed_string($blog_details[0]->created_at) ;?></li>
                                <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#"><?php echo sizeof($comment_details).' comments'; ?></a></li>
                                <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                                <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="comment-top">

                    <div class="media-body">
                        <?php foreach($comment_details as $row){?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img src="<?php echo base_url();?>assets/images/si.png" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $row->user_name ;?></h4>
                                    <p><?php echo $row->comments ;?></p>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <?php
                $session_value = $this->session->userdata('userid') ;
                if(!empty($session_value)){
                ?>
                    <div class="comment">
                        <h3>Leave a Comment</h3>
                        <div class=" comment-bottom">
                            <form method="post" action="<?php echo base_url() ;?>user/comments">
                                <textarea placeholder="Message" name="comments" maxlength="100" ><?php echo set_value('comments') ;?></textarea>
                                <span style="color:#CC0000"> <?php echo form_error('comments'); ?> </span>

                                <input type="hidden" name="post_slug" value="<?php echo $blog_details[0]->post_slug ;?>"/>
                                <input type="submit" value="Comment">
                            </form>
                        </div>
                    </div>
                <?php }?>
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