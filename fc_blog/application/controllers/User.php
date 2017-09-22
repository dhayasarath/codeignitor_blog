<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('common');
    }

    /***********************************user sign up***************************************/
    public function user_signup()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_user_password', 'Confirm Password', 'required|matches[user_password]');
        if ($this->form_validation->run() == FALSE) {

            $datas=array(
                'user_name'=>$this->security->xss_clean($this->input->post('user_name')),
                'user_email'=>$this->security->xss_clean($this->input->post('user_email')),
                'user_password'=>$this->security->xss_clean($this->input->post('user_password')),
                'confirm_user_password'=>$this->security->xss_clean($this->input->post('confirm_user_password')),
            );

            $this->load->view('header');
            $this->load->view('signup',$datas);
            $this->load->view('footer');
        }
        else
        {
            date_default_timezone_set('Asia/Kolkata');
            $datas=array(
                'user_name'=>$this->security->xss_clean($this->input->post('user_name')),
                'user_email'=>$this->security->xss_clean($this->input->post('user_email')),
                'user_password'=>md5($this->security->xss_clean($this->input->post('user_password'))),
                'created_at'=>date("Y-m-d H:i:s"),
            );
            $flag = $this->common->item_insert('users',$datas);
            $userid = $this->db->insert_id();

            if($flag)
            {

                $client  = @$_SERVER['HTTP_CLIENT_IP'];
                $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                $remote  = $_SERVER['REMOTE_ADDR'];

                if(filter_var($client, FILTER_VALIDATE_IP)) {  $ip = $client; }
                elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward; }
                else { $ip = $remote; }

                date_default_timezone_set('Asia/Kolkata');
                $datas=array(
                    'user_id'=>$userid,
                    'activity'=>"Sign Up",
                    'activity_time'=>date("Y-m-d H:i:s"),
                    'activity_desc'=>"Sign Up Successfully",
                    'ip_address'=>$ip,
                );
                $this->common->item_insert('activity_log',$datas);

                $data = array(
                    'userid' => $userid
                );
                $this->session->set_userdata($data);

                redirect('user/myaccount');
            }
            else{
                redirect('signup');
            }
        }
    }

    /***********************************user sign in***************************************/
    public function user_signin()
    {
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {

            $datas=array(
                'user_email'=>$this->security->xss_clean($this->input->post('user_email')),
                'user_password'=>$this->security->xss_clean($this->input->post('user_password')),
            );

            $this->load->view('header');
            $this->load->view('signin',$datas);
            $this->load->view('footer');
        }
        else
        {
            $user_email = $this->security->xss_clean($this->input->post('user_email'));
            $user_password = md5($this->security->xss_clean($this->input->post('user_password')));

            $login_flag = $this->common->get_two_item('users','user_email',$user_email,'user_password',$user_password);
            if($login_flag)
            {

                $client  = @$_SERVER['HTTP_CLIENT_IP'];
                $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                $remote  = $_SERVER['REMOTE_ADDR'];

                if(filter_var($client, FILTER_VALIDATE_IP)) {  $ip = $client; }
                elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward; }
                else { $ip = $remote; }

                date_default_timezone_set('Asia/Kolkata');
                $datas=array(
                        'user_id'=>$login_flag[0]->user_id,
                        'activity'=>"Login",
                        'activity_time'=>date("Y-m-d H:i:s"),
                        'activity_desc'=>"login Successfully",
                        'ip_address'=>$ip,
                );
                $this->common->item_insert('activity_log',$datas);


                $data = array(
                    'userid' => $login_flag[0]->user_id
                );
                $this->session->set_userdata($data);
                redirect('user/myaccount');
            }
            else
            {
                $this->session->set_flashdata('toast_alert','Invalid Login. Try Again !!!');
                redirect('signin') ;
            }

        }
    }

    /***********************************load edit profile***************************************/
    public function edit_profile()
    {
        $session_value = $this->session->userdata('userid') ;
        $data['user_details'] = $this->common->get_one_item('users','user_id',$session_value);

        $this->load->view('header');
        $this->load->view('user/edit_profile',$data);
        $this->load->view('footer');

    }

    /***********************************edit user profile***************************************/
    public function edit_user_profile()
    {
        $session_value = $this->session->userdata('userid') ;
        $datas['user_details'] = $this->common->get_one_item('users','user_id',$session_value);

        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {

            $datas=array(
                'user_name'=>$this->security->xss_clean($this->input->post('user_name')),
                'user_email'=>$this->security->xss_clean($this->input->post('user_email')),
            );

            $this->load->view('header');
            $this->load->view('edit_profile',$datas);
            $this->load->view('footer');
        }
        else
        {
            date_default_timezone_set('Asia/Kolkata');
            $datas=array(
                'user_name'=>$this->security->xss_clean($this->input->post('user_name')),
                'user_email'=>$this->security->xss_clean($this->input->post('user_email')),
                'updated_at'=>date("Y-m-d H:i:s"),
            );
            $flag = $this->common->update_one_item($session_value,'user_id','users',$datas);

            if($flag)
            {

                $client  = @$_SERVER['HTTP_CLIENT_IP'];
                $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                $remote  = $_SERVER['REMOTE_ADDR'];

                if(filter_var($client, FILTER_VALIDATE_IP)) {  $ip = $client; }
                elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward; }
                else { $ip = $remote; }

                date_default_timezone_set('Asia/Kolkata');
                $datas=array(
                    'user_id'=>$session_value,
                    'activity'=>"Updation",
                    'activity_time'=>date("Y-m-d H:i:s"),
                    'activity_desc'=>"Updated User profile Successfully",
                    'ip_address'=>$ip,
                );
                $this->common->item_insert('activity_log',$datas);

                $this->session->set_flashdata('suces_upd_toast','Updated Suceesfully !!!');
                redirect('user/myaccount');
            }
            else
            {
                $this->session->set_flashdata('erro_upd_toast','Update failed !!!');
                redirect('user/myaccount');
            }
        }


        redirect('user/myaccount');

    }

    /***********************************Change Password***************************************/
    public function changepassword()
    {
        $this->load->view('header');
        $this->load->view('user/changepassword');
        $this->load->view('footer');

    }

    public function user_change_password()
    {
        $session_value = $this->session->userdata('userid') ;

        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm Password', 'trim|required|matches[new_password]');
        if($this->form_validation->run() == FALSE) {

            $datas=array(
                'old_password'=>$this->security->xss_clean($this->input->post('old_password')),
                'new_password'=>$this->security->xss_clean($this->input->post('new_password')),
                'confirm_new_password'=>$this->security->xss_clean($this->input->post('confirm_new_password')),
            );

            $this->load->view('header');
            $this->load->view('user/changepassword',$datas);
            $this->load->view('footer');
        }
        else
        {

            $datas['user_details'] = $this->common->get_one_item('users','user_id',$session_value);
            if($datas['user_details'][0]->user_password == $this->security->xss_clean($this->input->post('new_password')))
            {
                date_default_timezone_set('Asia/Kolkata');
                $datas=array(
                    'user_password'=>$this->security->xss_clean($this->input->post('new_password')),
                    'updated_at'=>date("Y-m-d H:i:s"),
                );
                $flag = $this->common->update_one_item($session_value,'user_id','users',$datas);

                if($flag)
                {

                    $client  = @$_SERVER['HTTP_CLIENT_IP'];
                    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                    $remote  = $_SERVER['REMOTE_ADDR'];

                    if(filter_var($client, FILTER_VALIDATE_IP)) {  $ip = $client; }
                    elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward; }
                    else { $ip = $remote; }

                    date_default_timezone_set('Asia/Kolkata');
                    $datas=array(
                        'user_id'=>$session_value,
                        'activity'=>"Updation",
                        'activity_time'=>date("Y-m-d H:i:s"),
                        'activity_desc'=>"Updated User Password Successfully",
                        'ip_address'=>$ip,
                    );
                    $this->common->item_insert('activity_log',$datas);

                    $this->session->set_flashdata('suces_upd_toast','Updated Suceesfully !!!');
                    redirect('user/myaccount');
                }
                else{
                    $this->session->set_flashdata('erro_upd_toast','Update failed !!!');
                    redirect('user/myaccount');
                }
            }
            else{
                $this->session->set_flashdata('erro_upd_toast','Password Mismatch !!!');
                redirect('user/myaccount');
            }



        }
    }

    /***********************************load myaccount page***************************************/
    public function myaccount()
    {
        $session_value = $this->session->userdata('userid') ;
        $data['user_details'] = $this->common->get_one_item('users','user_id',$session_value);

        $this->load->view('header');
        $this->load->view('user/myaccount',$data);
        $this->load->view('footer');
    }

    /***********************************Add Post***************************************/
    public function add_post()
    {
        $this->form_validation->set_rules('post_title', 'Blog Title', 'required');
        $this->form_validation->set_rules('post_body', 'Blog Description', 'required');
        if ($this->form_validation->run() == FALSE) {

            $datas=array(
                'post_title'=>$this->security->xss_clean($this->input->post('post_title')),
                'post_body'=>$this->security->xss_clean($this->input->post('post_body')),
            );

            $this->load->view('header');
            $this->load->view('user/myaccount',$datas);
            $this->load->view('footer');
        }
        else
        {
            $slug_val = substr(md5($this->input->post('post_title')),0,4);
            date_default_timezone_set('Asia/Kolkata');
            $datas=array(
                        'post_title'=>$this->security->xss_clean($this->input->post('post_title')),
                        'post_slug'=>$slug_val,
                        'post_body'=>$this->security->xss_clean($this->input->post('post_body')),
                        'user_id'=>$this->security->xss_clean($this->session->userdata('userid')),
                        'created_at'=>date("Y-m-d H:i:s"),
            );
            $flag = $this->common->item_insert('blog_post',$datas);
            $userid = $this->db->insert_id();

            if($flag)
            {

                $client  = @$_SERVER['HTTP_CLIENT_IP'];
                $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                $remote  = $_SERVER['REMOTE_ADDR'];

                if(filter_var($client, FILTER_VALIDATE_IP)) {  $ip = $client; }
                elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward; }
                else { $ip = $remote; }

                date_default_timezone_set('Asia/Kolkata');
                $datas=array(
                    'user_id'=>$userid,
                    'activity'=>"Post Added",
                    'activity_time'=>date("Y-m-d H:i:s"),
                    'activity_desc'=>"Post Added Successfully",
                    'ip_address'=>$ip,
                );
                $this->common->item_insert('activity_log',$datas);

                redirect('user/mypost');
            }
        }
    }

    /***********************************Add Post***************************************/
    public function comments()
    {
        $this->form_validation->set_rules('comments', 'Comments', 'required');
        if ($this->form_validation->run() == FALSE) {

            $data=array(
                'comments'=>$this->input->post('comments'),
            );


            $post_slug = $this->input->post('post_slug');
            $data['blog_details']= $this->common->get_one_item('blog_post','post_slug',$post_slug);
            $data['user_details']= $this->common->get_one_item('users','user_id',$data['blog_details'][0]->user_id);
            $data['comment_details']= $this->common->get_one_item_left_join('post_comments','user_id','users','user_id','post_id',$post_slug);


            $this->load->view('header');
            $this->load->view('blog',$data);
            $this->load->view('footer');
        }
        else
        {
            date_default_timezone_set('Asia/Kolkata');
            $datas=array(
                'comments'=>$this->security->xss_clean($this->input->post('comments')),
                'user_id'=>$this->security->xss_clean($this->session->userdata('userid')),
                'post_id'=>$this->security->xss_clean($this->input->post('post_slug')),
                'created_at'=>date("Y-m-d H:i:s"),
            );
            $flag = $this->common->item_insert('post_comments',$datas);

            if($flag)
            {

                $client  = @$_SERVER['HTTP_CLIENT_IP'];
                $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                $remote  = $_SERVER['REMOTE_ADDR'];

                if(filter_var($client, FILTER_VALIDATE_IP)) {  $ip = $client; }
                elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward; }
                else { $ip = $remote; }

                date_default_timezone_set('Asia/Kolkata');
                $datas=array(
                    'user_id'=>$this->session->userdata('userid'),
                    'activity'=>"Comment Added",
                    'activity_time'=>date("Y-m-d H:i:s"),
                    'activity_desc'=>"Comment Added Successfully",
                    'ip_address'=>$ip,
                );
                $this->common->item_insert('activity_log',$datas);

                redirect('blog/'.$this->input->post('post_slug'));
            }
        }
    }


    /***********************************load mypost page***************************************/
    public function mypost()
    {
        $session_value = $this->session->userdata('userid') ;
        $data['mypost'] = $this->common->get_one_item('blog_post','user_id',$session_value);
        $data['user_details'] = $this->common->get_one_item('users','user_id',$session_value);

        $this->load->view('header');
        $this->load->view('user/mypost',$data);
        $this->load->view('footer');
    }

    /***********************************logout***************************************/
    public function logout()
    {
        $this->session->unset_userdata('userid');
        redirect('signin');
    }

}
