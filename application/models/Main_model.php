<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table,$data);
    }

    function insert_a($table, $post = array())
	{
		$table = $this->db->dbprefix($table);
		$insert = $this->db->insert($table, $post);
		if ($return = $this->db->insert_id()) {
			return $return;
		} else {
			return $insert;
		}
	}

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }
    
    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function counts($table, $col, $like)
    {
		$this->db->select('*');
        $this->db->from($table);
        $this->db->like($col, $like);
        return $this->db->count_all_results();
    }

    public function count_where($table, $col, $like)
    {
		$this->db->select('*');
        $this->db->from($table);
        // if ($like != null) {
        //     $this->db->where([$col => $like]);
        // } else {
        //     $this->db->where($col);
        // }
        $this->db->where([$col => $like]);
        return $this->db->count_all_results();
    }

    public function count_shohibul()
    {
        $this->db->select('*');
        $this->db->from('tb_qurban');
        return $this->db->count_all_results();
    }

    public function count_tersembelih()
    {
		$this->db->select('*');
        $this->db->from('tb_qurban');
        $this->db->where('qurban_sembelih IS NOT NULL');
        return $this->db->count_all_results();
    }

    public function count_pengeletan()
    {
		$this->db->select('*');
        $this->db->from('tb_qurban');
        $this->db->where('qurban_pengeletan IS NOT NULL');
        return $this->db->count_all_results();
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function total_daging_shahibul($field)
    {
        $this->db->select('penimbangan_qurban, qurban_status, qurban_nomor, qurban_shohibul');
        $this->db->select_sum($field, 'total');
        $this->db->join('tb_qurban', 'tb_penimbangan.penimbangan_qurban = tb_qurban.qurban_id');
        $this->db->group_by('penimbangan_qurban');
        return $this->db->get('tb_penimbangan')->result_array();
    }
}