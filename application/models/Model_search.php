<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_search extends CI_Model
{
    public function search($search_string, $get_count = false)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT news_id, news_title, news_short_content, photo, news_date
				FROM tbl_news
				WHERE news_title like ? OR news_content like ?
				ORDER BY news_id ASC";
        $query = $this->db->query($sql, array($search_string, $search_string));
        
        if ($get_count) {
            return $query->num_rows();
        }
        return $query->result_array();
    }
    public function search_total($search_string)
    {
        return $this->search($search_string, true);
    }
}