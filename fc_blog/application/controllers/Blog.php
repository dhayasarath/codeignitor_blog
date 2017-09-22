<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->library("pagination");

    }

    /***********************************load home page***************************************/
	public function index($offset='')
	{

        if($offset == '')
        {
            $offset=1;
        }
        $data['allpost'] = $this->common->get_left_join_desc('blog_post','user_id','users','user_id','post_id');
        $this->load->library('pagination');
        $config['base_url']       = base_url() . 'index';
        $config['total_rows']     = count($data['allpost']);
        $config['per_page']       = 2;
        //Customizing the links
        $config['full_tag_open']  = "<ul>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $config['cur_tag_open']   = '<li><a class="active">';
        $config['first_link']     = false;
        $config['last_link']      = false;
        $config['prev_link']      = false;
        $config['next_link']      = false;
        $this->pagination->initialize($config);
        if ($this->uri->segment(2)) {
            $offset = $this->uri->segment(2);
        } else {
            $offset = 0;
        }
        $data["allpost"] = $this->common->get_left_join_desc('blog_post','user_id','users','user_id','post_id',$config['per_page'], $offset);

        $this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

    /***********************************load contact page***************************************/
	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

    /***********************************load signin page***************************************/
	public function signin()
	{
		$this->load->view('header');
		$this->load->view('signin');
		$this->load->view('footer');
	}

    /***********************************load signup page***************************************/
	public function signup()
	{
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('footer');
	}

    /***********************************load blog page***************************************/
    public function blog()
    {
        $post_slug = $this->uri->segment(2);
        $data['blog_details']= $this->common->get_one_item('blog_post','post_slug',$post_slug);
        $data['user_details']= $this->common->get_one_item('users','user_id',$data['blog_details'][0]->user_id);
        $data['comment_details']= $this->common->get_one_item_left_join('post_comments','user_id','users','user_id','post_id',$post_slug);


        $this->load->view('header');
        $this->load->view('blog',$data);
        $this->load->view('footer');
    }




}
