<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_career extends CI_Model 
{
    public function get_all_careers()
    {
        $query = $this->db->query("SELECT * FROM tbl_career ORDER BY Date_time DESC");
        return $query->result_array();
    }

    public function get_career_by_id($id)
    {
        $sql = "SELECT * FROM tbl_career WHERE id=?";
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    public function insert($data)
    {
        $this->db->insert('tbl_career', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_career', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_career');
    }
}
