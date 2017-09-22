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

                    <?php foreach($mypost as $row){?>
                        <!-- technology-top -->
                        <div class="tc-ch">
                            <h3><a href="<?php echo base_url();?>blog/<?php echo $row->post_slug ; ?>"><?php echo $row->post_title ;?></a></h3>
                            <p><?php echo $row->post_body ;?></p>

                            <div class="blog-poast-info">
                                <ul>
                                    <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> <?php echo $user_details[0]->user_name ;?> </a></li>
                                    <li><i class="glyphicon glyphicon-calendar"> </i><?php echo $row->created_at ;?></li>
                                    <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
                                    <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                                    <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                                </ul>
                            </div>
                        </div>

                        <!--<div class="clearfix"></div>
                         technology-top -->
                    <?php }?>


<!--                    <div class="social">-->
<!--                        <ul>-->
<!--                            <li><a href="#"> << </a></li>-->
<!--                            <li><a href="#"> 1 </a></li>-->
<!--                            <li><a href="#"> 2 </a></li>-->
<!--                            <li><a href="#"> 3 </a></li>-->
<!--                            <li><a href="#"> 4 </a></li>-->
<!--                            <li><a href="#"> 6 </a></li>-->
<!--                            <li><a href="#"> >> </a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- technology-right -->
            <div class="col-md-4">

                <div class="blo-top1">
                    <div class="tech-btm">
                        <h4>Top stories of the week </h4>
                        <div class="blog-grids">
                            <div class="blog-grid-right">
                                <h5><a href="#">Pellentesque dui, non felis. Maecenas male</a> </h5>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                        <div class="blog-grids">
                            <div class="blog-grid-right">
                                <h5><a href="#">Pellentesque dui, non felis. Maecenas male</a> </h5>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                        <div class="blog-grids">
                            <div class="blog-grid-right">
                                <h5><a href="#">Pellentesque dui, non felis. Maecenas male</a> </h5>
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