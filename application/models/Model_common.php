<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_common extends CI_Model 
{
    public function get_setting_data()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'settings_data';
        if ($cached = $this->cache->file->get($cache_key)) {
            return $cached;
        }
        $query = $this->db->query("SELECT * from tbl_settings WHERE id=1");
        $result = $query->first_row('array');
        $this->cache->file->save($cache_key, $result, 3600); // 1 hour
        return $result;
    }
    public function get_menu_data()
    {
        $query = $this->db->query("SELECT * from tbl_menu WHERE id=1");
        return $query->first_row('array');
    }
    public function get_page_data()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'page_data';
        if ($cached = $this->cache->file->get($cache_key)) {
            return $cached;
        }
        $query = $this->db->query("SELECT * from tbl_page WHERE id=1");
        $result = $query->first_row('array');
        $this->cache->file->save($cache_key, $result, 3600); // 1 hour
        return $result;
    }   
    public function get_comment_code()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'comment_code';
        if ($cached = $this->cache->file->get($cache_key)) {
            return $cached;
        }
        $query = $this->db->query("SELECT * from tbl_comment WHERE id=1");
        $result = $query->first_row('array');
        $this->cache->file->save($cache_key, $result, 3600); // 1 hour
        return $result;
    }
    public function get_social_data()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'social_data';
        if ($cached = $this->cache->file->get($cache_key)) {
            return $cached;
        }
        $query = $this->db->query("SELECT * from tbl_social");
        $result = $query->result_array();
        $this->cache->file->save($cache_key, $result, 3600); // 1 hour
        return $result;
    }
    public function get_language_data()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'language_data';
        if ($cached = $this->cache->file->get($cache_key)) {
            return $cached;
        }
        $query = $this->db->query("SELECT * from tbl_language");
        $result = $query->result_array();
        $this->cache->file->save($cache_key, $result, 3600); // 1 hour
        return $result;
    }
    public function get_latest_news()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'latest_news';
        if ($cached = $this->cache->file->get($cache_key)) {
            return $cached;
        }
        $query = $this->db->query("SELECT * from tbl_news ORDER BY news_id DESC");
        $result = $query->result_array();
        $this->cache->file->save($cache_key, $result, 1800); // 30 mins
        return $result;
    }
    public function get_popular_news()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_key = 'popular_news';
        if ($cached = $this->cache->file->get($cache_key)) {
            return $cached;
        }
        $query = $this->db->query("SELECT * from tbl_news ORDER BY total_view DESC");
        $result = $query->result_array();
        $this->cache->file->save($cache_key, $result, 1800); // 30 mins
        return $result;
    }

    public function get_single_service_data($id)
    {
        $query = $this->db->query("SELECT * from tbl_service WHERE id=?",array($id));
        return $query->result_array();
    }
    public function get_single_portfolio_data($id)
    {
        $query = $this->db->query("SELECT * from tbl_portfolio WHERE id=?",array($id));
        return $query->result_array();
    }
    public function get_single_news_data($id)
    {
        $query = $this->db->query("SELECT * from tbl_news WHERE news_id=?",array($id));
        return $query->result_array();
    }

    public function get_certificate_data()
    {
        $query = $this->db->query("SELECT * from tbl_certificate WHERE status=1 ORDER BY order_by ASC");
        return $query->result_array();
    }

    public function get_branch_data()
    {
        $query = $this->db->query("SELECT * from tbl_branch WHERE status=1 ORDER BY order_by ASC");
        return $query->result_array();
    }

}