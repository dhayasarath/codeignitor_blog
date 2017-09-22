
        <!-- footer-bottom -->
        <div class="copyright">
            <div class="container">
                <p>© 2016 Business_Blog. All rights reserved | Findcave</p>
            </div>
        </div>
        <!--    <!--toast table-->
        <script src="<?php echo base_url();?>assets/refer/js/jquery-1.10.2.min.js"></script>
        <link href="<?php echo base_url();?>assets/refer/toast/toastr-master/build/toastr.css" rel="stylesheet"/>
        <script src="<?php echo base_url();?>assets/refer/toast/toastr-master/toastr.js"></script>
        <script>
            var fsd = '<?php echo $this->session->flashdata('toast_alert') ;?>';
            if(fsd != "")
            {
                toastr.error(fsd,{timeOut: 700,preventDuplicates: true, positionClass:'toast-top-right'});
            }
        </script>
        <script>
            var fsd = '<?php echo $this->session->flashdata('suces_upd_toast') ;?>';
            if(fsd != "")
            {
                toastr.success(fsd,{timeOut: 700,preventDuplicates: true, positionClass:'toast-top-right'});
            }
        </script>
        <script>
            var fsd = '<?php echo $this->session->flashdata('erro_upd_toast') ;?>';
            if(fsd != "")
            {
                toastr.error(fsd,{timeOut: 700,preventDuplicates: true, positionClass:'toast-top-right'});
            }
        </script>

   </body>
</html>