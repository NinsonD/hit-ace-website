<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_branch extends CI_Model 
{

	function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_branch'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
    function show() {
        $sql = "SELECT * FROM tbl_branch ORDER BY order_by ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_branch',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_branch',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_branch');
    }

    function getData($id)
    {
        $sql = 'SELECT * FROM tbl_branch WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function branch_check($id)
    {
        $sql = 'SELECT * FROM tbl_branch WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}