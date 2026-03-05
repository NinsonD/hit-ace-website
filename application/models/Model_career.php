<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_career extends CI_Model 
{
    public function get_all_careers()
    {
        $query = $this->db->query("SELECT * FROM tbl_career WHERE status='Active' ORDER BY Date_time DESC");
        return $query->result_array();
    }

    public function get_career_detail($id)
    {
        $sql = "SELECT * FROM tbl_career WHERE id=?";
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    public function search_careers($search_keyword)
    {
        $sql = "SELECT * FROM tbl_career WHERE status='Active' AND (position_name LIKE ? OR department LIKE ? OR location LIKE ?) ORDER BY Date_time DESC";
        $search_term = '%' . $search_keyword . '%';
        $query = $this->db->query($sql, array($search_term, $search_term, $search_term));
        return $query->result_array();
    }
}
