<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Private_md extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        } 
    }


    public function getUser()
    {
        $query = "SELECT `data_pengguna`.*, `data_level`.`level_nama`, `data_jurusan`.*
                    FROM `data_pengguna` 
					JOIN `data_level`
                      ON `data_pengguna`.`pengguna_level` = `data_level`.`level_id`
					JOIN `data_jurusan`
					ON `data_pengguna`.`pengguna_jurusan` = `data_jurusan`.`jurusan_id` 
                    WHERE `data_pengguna`.`pengguna_level` = 5
                ";
        return $this->db->query($query)->result_array();
        // $this->db->where('id !=');
        // return $this->db->get('user')->result_array();
    }

    public function getUser2()
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $query = "SELECT `data_pengguna`.*, `data_level`.`level_nama`, `data_jurusan`.*
					FROM `data_pengguna` 
					JOIN `data_level`
		  			  ON `data_pengguna`.`pengguna_level` = `data_level`.`level_id`
					JOIN `data_jurusan`
					  ON `data_pengguna`.`pengguna_jurusan` = `data_jurusan`.`jurusan_id` 
                    WHERE `data_pengguna`.`pengguna_level` = 3
                ";
        return $this->db->query($query)->result_array();
        // $this->db->where('id !=');
        // return $this->db->get('user')->result_array();
    }

    public function getData()
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $id = $this->session->userdata('pengguna_id');
        $query = "SELECT `data_artikel`.*, `data_pengguna`.*
                    FROM `data_artikel` JOIN `data_pengguna`
                      ON `data_artikel`.`artikel_penulis` = `data_pengguna`.`pengguna_id`
                    WHERE `data_artikel`.`artikel_penulis` = $id
                ";
        return $this->db->query($query)->result_array();
        // $this->db->where('id !=');
        // return $this->db->get('user')->result_array();
    }

    public function getData_a()
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $query = "SELECT `data_artikel`.*, `data_pengguna`.*
                    FROM `data_artikel` JOIN `data_pengguna`
                      ON `data_artikel`.`artikel_penulis` = `data_pengguna`.`pengguna_id`
                ";
        return $this->db->query($query)->result_array();
        // $this->db->where('id !=');
		// return $this->db->get('user')->result_array();
		
	}
	
	public function artikel_a($limit, $start)
	{
		$this->db->join('data_pengguna', 'data_artikel.artikel_penulis = data_pengguna.pengguna_id');
		return $this->db->get('data_artikel', $limit, $start)->result_array();
	}

	public function countArtikel()
	{
		return $this->db->get('data_artikel')->num_rows();
	}
    

    public function insert($data,$table)
    {
        $this->db->insert($table,$data);
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
    
    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    function save($table, $post, $data = array())
	{
		if (!empty($data)) {
			if (!empty($data['where'])) {
				if (!empty($data['where'][0]) and is_array($data['where'])) {
					foreach ($data['where'] as $wwhere) {
						$this->db->where($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where'])) {
					foreach ($data['where'] as $kwhere => $vwhere) {
						$this->db->where($kwhere, $vwhere);
					}
				} else {
					$this->db->where($data['where']);
				}
			}
			if (!empty($data['or_where'])) {
				if (isset($data['or_where'][0]) and is_array($data['or_where'])) {
					foreach ($data['or_where'] as $wwhere) {
						$this->db->or_where($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['or_where'])) {
					foreach ($data['or_where'] as $kwhere => $vwhere) {
						$this->db->or_where($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['where_in'])) {
				if (isset($data['where_in'][0]) and is_array($data['where_in'])) {
					foreach ($data['where_in'] as $wwhere) {
						$this->db->where_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where_in'])) {
					foreach ($data['where_in'] as $kwhere => $vwhere) {
						$this->db->where_in($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['or_where_in'])) {
				if (isset($data['where_in'][0]) and is_array($data['where_in'])) {
					foreach ($data['where_in'] as $wwhere) {
						$this->db->where_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where_in'])) {
					foreach ($data['where_in'] as $kwhere => $vwhere) {
						$this->db->where_in($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['where_not_in'])) {
				if (isset($data['where_not_in'][0]) and is_array($data['where_not_in'])) {
					foreach ($data['where_not_in'] as $wwhere) {
						$this->db->where_not_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where_not_in'])) {
					foreach ($data['where_not_in'] as $kwhere => $vwhere) {
						$this->db->where_not_in($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['or_where_not_in'])) {
				if (isset($data['or_where_not_in'][0]) and is_array($data['or_where_not_in'])) {
					foreach ($data['or_where_not_in'] as $wwhere) {
						$this->db->or_where_not_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['or_where_not_in'])) {
					foreach ($data['or_where_not_in'] as $kwhere => $vwhere) {
						$this->db->or_where_not_in($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['like']) and is_array($data['like'])) {
				foreach ($data['like'] as $llike) {
					//$llike[0] = isset($llike[0]) ? $llike[0] : '';
					$llike[1] = isset($llike[1]) ? $llike[1] : '';
					$llike[2] = isset($llike[2]) ? $llike[2] : '';
					$this->db->like($llike[0], $llike[1], $llike[2]);
				}
			}
			if (!empty($data['or_like']) and is_array($data['or_like'])) {
				foreach ($data['or_like'] as $llike) {
					//$llike[0] = isset($llike[0]) ? $llike[0] : '';
					$llike[1] = isset($llike[1]) ? $llike[1] : '';
					$llike[2] = isset($llike[2]) ? $llike[2] : '';
					$this->db->or_like($llike[0], $llike[1], $llike[2]);
				}
			}
			$table = $this->db->dbprefix($table);
			return $this->db->update($table, $post, $data);
		} else {
			$table = $this->db->dbprefix($table);
			$insert = $this->db->insert($table, $post);
			if ($return = $this->db->insert_id()) {
				return $return;
			} else {
				return $insert;
			}
		}
    }
    
    function delete_a($table, $data = null)
	{
		if (is_array($table)) {
			$ntable = array();
			foreach ($table as $vtable) {
				$ntable[] = $this->db->dbprefix($vtable);
			}
			$table = $ntable;
		} else {
			$table = $this->db->dbprefix($table);
		}
		if (!empty($data)) {
			if (!empty($data['where'])) {
				if (!empty($data['where'][0]) and is_array($data['where'])) {
					foreach ($data['where'] as $wwhere) {
						$this->db->where($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where'])) {
					foreach ($data['where'] as $kwhere => $vwhere) {
						$this->db->where($kwhere, $vwhere);
					}
				} else {
					$this->db->where($data['where']);
				}
			}
			if (!empty($data['or_where'])) {
				if (isset($data['or_where'][0]) and is_array($data['or_where'])) {
					foreach ($data['or_where'] as $wwhere) {
						$this->db->or_where($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['or_where'])) {
					foreach ($data['or_where'] as $kwhere => $vwhere) {
						$this->db->or_where($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['where_in'])) {
				if (isset($data['where_in'][0]) and is_array($data['where_in'])) {
					foreach ($data['where_in'] as $wwhere) {
						$this->db->where_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where_in'])) {
					foreach ($data['where_in'] as $kwhere => $vwhere) {
						$this->db->where_in($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['or_where_in'])) {
				if (isset($data['where_in'][0]) and is_array($data['where_in'])) {
					foreach ($data['where_in'] as $wwhere) {
						$this->db->where_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where_in'])) {
					foreach ($data['where_in'] as $kwhere => $vwhere) {
						$this->db->where_in($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['where_not_in'])) {
				if (isset($data['where_not_in'][0]) and is_array($data['where_not_in'])) {
					foreach ($data['where_not_in'] as $wwhere) {
						$this->db->where_not_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['where_not_in'])) {
					foreach ($data['where_not_in'] as $kwhere => $vwhere) {
						$this->db->where_not_in($kwhere, $vwhere);
					}
				}
			}
			if (!empty($data['or_where_not_in'])) {
				if (isset($data['or_where_not_in'][0]) and is_array($data['or_where_not_in'])) {
					foreach ($data['or_where_not_in'] as $wwhere) {
						$this->db->or_where_not_in($wwhere[0], $wwhere[1]);
					}
				} else if (is_array($data['or_where_not_in'])) {
					foreach ($data['or_where_not_in'] as $kwhere => $vwhere) {
						$this->db->or_where_not_in($kwhere, $vwhere);
					}
				}
			}
		}
		return $this->db->delete($table);
	}

    public function cek_login()
    {
        $pengguna_username      = set_value('pengguna_username');
        $pengguna_password      = set_value('pengguna_password');

        $result     = $this->db->where('pengguna_username', $pengguna_username)
                               ->where('pengguna_password', $pengguna_password)
                               ->limit(1)
                               ->get('data_pengguna');
        
        if ( $result->num_rows() > 0 )
        {
            return $result->row();
        } else
        {
            return array();
        }
    }

    public function getArtikel($range)
    {
		$this->db->select('*');
        $this->db->join('data_pengguna', 'data_artikel.artikel_penulis = data_pengguna.pengguna_id');

        if ($range != null) {
            $this->db->where('artikel_tahun' . ' >=', $range['mulai']);
            $this->db->where('artikel_tahun' . ' <=', $range['akhir']);
        }
        $this->db->order_by('artikel_id', 'DESC');
        return $this->db->get('data_artikel')->result_array();
    }
	
    public function getArtikelAll()
    {
		$this->db->select('*');
        $this->db->join('data_pengguna', 'data_artikel.artikel_penulis = data_pengguna.pengguna_id');
        $this->db->order_by('artikel_id', 'DESC');
        return $this->db->get('data_artikel')->result_array();
	}
	
    function count1($table, $data = array()){
        $table = $this->db->dbprefix($table);
		$this->db->from($table);
		/*if (!empty($data['group_by']))
            $this->db->group_by($data['group_by']);*/
		return $this->db->count_all_results();
    }
    
    // public function count1($table)
    // {
    //     return $this->db->count_all($table);
    // }

    public function count2($table, $field, $kode)
    {
        return $this->db->count_all($table);
    }

    public function count3($table)
    {
        return $this->db->count_all($table);
    }

    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'data_artikel' ? 'artikel_tahun' : 'artikel_tahun';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
	}

	public function get_index(){
		$hasil = $this->db->query("SELECT * FROM data_index ");
		return $hasil;
	}

	public function get_subIndex($id){
		$hasil = $this->db->query("SELECT * FROM data_sub_index WHERE subIndex_indexId ");
		return $hasil->result();
	}

}