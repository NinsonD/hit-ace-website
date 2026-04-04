<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_certificate extends CI_Model 
{

	function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_certificate'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
    function show() {
        $sql = "SELECT * FROM tbl_certificate ORDER BY order_by ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_certificate',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_certificate',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_certificate');
    }

    function getData($id)
    {
        $sql = 'SELECT * FROM tbl_certificate WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function certificate_check($id)
    {
        $sql = 'SELECT * FROM tbl_certificate WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}