<?php
class Common extends CI_Model
{

    /***********************************insert data***************************************/
    public function item_insert($table,$datas)
    {
        $this->db->insert($table,$datas);
        $id = $this->db->insert_id();
        return $id;
    }

    /***********************************update data***************************************/
    public function update_one_item($id,$field,$table,$dataeditems)
    {
        $this->db->where($field,$id);
        $this->db->update($table,$dataeditems);
        return ($this->db->affected_rows() > 0);
    }


    /***********************************select according to one field data***************************************/
    public function get_one_item($table,$field1,$value1)
    {
        $this->db->where($field1,$value1);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    /***********************************select according to two field data***************************************/
    public function get_two_item($table,$field1,$value1,$field2,$value2)
    {
        $this->db->where($field1,$value1);
        $this->db->where($field2,$value2);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    /***********************************select according to field data descending***************************************/
    public function get_all_desc($table,$field)
    {
        $this->db->order_by($field,'desc');
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    public function get_left_join_descc($perpage='',$offset='')
    {
        $this->db->select('*');
        $this->db->from('blog_post');
        $this->db->join('users', 'users.user_id = blog_post.user_id', 'left');
        $this->db->limit($perpage,$offset);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }

    public function get_left_join_desc($table1,$col1,$table2,$col2,$field,$perpage='',$offset='')
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $col2 = $col1, 'left');
        $this->db->order_by($field,'desc');
        $this->db->limit($perpage,$offset);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }

    public function get_one_item_left_join($table1,$col1,$table2,$col2,$field,$value)
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2,$col1 = $col2,'left');
        $this->db->where($field,$value);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }

    public function time_elapsed_string($datetime, $full = false)
    {
        $today = time();
        $createdday= strtotime($datetime);
        $datediff = abs($today - $createdday);
        $difftext="";
        $years = floor($datediff / (365*60*60*24));
        $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours= floor($datediff/3600);
        $minutes= floor($datediff/60);
        $seconds= floor($datediff);
        //year checker
        if($difftext=="")
        {
            if($years>1)
                $difftext=$years." years ago";
            elseif($years==1)
                $difftext=$years." year ago";
        }
        //month checker
        if($difftext=="")
        {
            if($months>1)
                $difftext=$months." months ago";
            elseif($months==1)
                $difftext=$months." month ago";
        }
        //month checker
        if($difftext=="")
        {
            if($days>1)
                $difftext=$days." days ago";
            elseif($days==1)
                $difftext=$days." day ago";
        }
        //hour checker
        if($difftext=="")
        {
            if($hours>1)
                $difftext=$hours." hours ago";
            elseif($hours==1)
                $difftext=$hours." hour ago";
        }
        //minutes checker
        if($difftext=="")
        {
            if($minutes>1)
                $difftext=$minutes." minutes ago";
            elseif($minutes==1)
                $difftext=$minutes." minute ago";
        }
        //seconds checker
        if($difftext=="")
        {
            if($seconds>1)
                $difftext=$seconds." seconds ago";
            elseif($seconds==1)
                $difftext=$seconds." second ago";
        }
        return $difftext;
    }


}