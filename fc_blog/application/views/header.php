<?php
$session_value = $this->session->userdata('userid') ;
$nav = $this->uri->segment(1);
$navi = $this->uri->segment(2);
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <title>FINDCAVE BLOG</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
            <!-- Custom Theme files -->
            <link href="<?php echo base_url();?>assets/css/style.css" rel='stylesheet' type='text/css' />


        </head>

        <body>
            <!--start-main-->
            <div class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="#"><h1>FINDCAVE BLOG</h1></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--head-bottom-->
                <div class="head-bottom">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">


                            <ul class="nav navbar-nav">
                                <li <?php if($nav == ""){?>  class="active" <?php }?> ><a href="<?php echo base_url();?>">Home</a></li>
                                <?php if(!empty($session_value)) { ?>
                                    <li <?php if($navi == "mypost"){?>  class="active" <?php }?>  ><a href="<?php echo base_url();?>user/mypost">My Post</a></li>
                                    <li <?php if($navi == "myaccount"){?>  class="active" <?php }?> ><a href="<?php echo base_url();?>user/myaccount">My Account</a></li>
                                    <li><a href="<?php echo base_url();?>user/logout">Logout</a></li>
                                <?php } else { ?>
                                    <li <?php if($nav == "signin"){?>  class="active" <?php }?> ><a href="<?php echo base_url();?>signin">Sign In</a></li>
                                    <li <?php if($nav == "signup"){?>  class="active" <?php }?> ><a href="<?php echo base_url();?>signup">Sign Up</a></li>
                                <?php } ?>

                                <!-- <li><a href="--><?php //echo base_url();?><!--contact">Contact</a></li>-->
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                    </nav>
                </div>
                <!--head-bottom-->
            </div>