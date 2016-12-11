<?php
class M_website extends CI_Model  {

    public function __contsruct(){
        parent::Model();
    }

	//CONFIGURATION TABLE mahasiswa
	public function insert_mahasiswa($data){
        $this->db->insert("mahasiswa",$data);
    }
    
    public function update_mahasiswa($where,$data){
        $this->db->update("mahasiswa",$data,$where);
    }

    public function delete_mahasiswa($where){
        $this->db->delete("mahasiswa", $where);
    }

	public function get_mahasiswa($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("mahasiswa");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_mahasiswa($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("mahasiswa");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
		$names = array('nava', 'mahasiswa');
        $this->db->where_not_in('mahasiswa_nama', $names);
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_mahasiswa2($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("mahasiswa");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_mahasiswa($where="", $like=""){
        $this->db->select("*");
        $this->db->from("mahasiswa");		
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //KONFIGURASI TABEL pengajuan
    public function insert_pengajuan($data){
        $this->db->insert("pengajuan",$data);
    }
    
    public function update_pengajuan($where,$data){
        $this->db->update("pengajuan",$data,$where);
    }
    
    public function delete_pengajuan($where){
        $this->db->delete("pengajuan", $where);
    }

    public function get_pengajuan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pengajuan p");
        $this->db->join('katpengajuan k', 'p.katpengajuan_id= k.katpengajuan_id', 'left');
        $this->db->join('dosen d', 'p.dosen_nip= d.dosen_nip', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }
     public function grid_all_pengajuan1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
            $data = "";
            $this->db->select($select);
            $this->db->from("pengajuan p");
            $this->db->join('katpengajuan k', 'p.katpengajuan_id= k.katpengajuan_id', 'left');
            if ($where){$this->db->where($where);}
            if ($like){
                foreach($like as $key => $value){ 
                $this->db->like($key, $value); 
                }
            }
            $names = array('anggi', 'admin');
            $this->db->where_not_in('admin_nama', $names);
            $this->db->order_by($sidx,$sord);
            $this->db->limit($limit,$start);
            $Q = $this->db->get();
            if ($Q->num_rows() > 0){
                $data=$Q->result();
            }
            $Q->free_result();
            return $data;
        }
        
    public function grid_all_pengajuan($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pengajuan p");
        $this->db->join('katpengajuan k', 'p.katpengajuan_id= k.katpengajuan_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_pengajuan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pengajuan p");
        $this->db->join('katpengajuan k', 'p.katpengajuan_id= k.katpengajuan_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

     public function count_all_pengajuan2($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pengajuan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    public function grid_all_pengajuan2($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "1";
        $this->db->select($select);
        $this->db->from("pengajuan");
        if ($where){$this->db->where($where);}
        $this->db->order_by($sidx,"ASC");
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }


      // KONFIGURASI TABEL katpengajuan
    public function insert_katpengajuan($data){
        $this->db->insert("katpengajuan",$data);
    }
    
    public function update_katpengajuan($where,$data){
        $this->db->update("katpengajuan",$data,$where);
    }

    public function delete_katpengajuan($where){
        $this->db->delete("katpengajuan", $where);
    }

    public function get_katpengajuan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("katpengajuan");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_katpengajuan($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("katpengajuan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_katpengajuan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("katpengajuan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }


      // KONFIGURASI TABEL dosen
    public function insert_dosen($data){
        $this->db->insert("dosen",$data);
    }
    
    public function update_dosen($where,$data){
        $this->db->update("dosen",$data,$where);
    }

    public function delete_dosen($where){
        $this->db->delete("dosen", $where);
    }

    public function get_dosen($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("dosen");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_dosen($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("dosen");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_dosen($where="", $like=""){
        $this->db->select("*");
        $this->db->from("dosen");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }



    // CONFIGURATION COMBO BOX WITH DATABASE WITH VALIDASI
    public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' required class='form-control' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
    public function combo_box2($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' class='form-control' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->tag_id, $array_tag) === false)? '' : 'checked';
            echo "<div class='radio'><label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label></div>";
        }
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox_status($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->status_perkawinan_kode, $array_tag) === false)? '' : 'checked';
            echo "<input type='checkbox' name='$name' id='".$row->$value."' style='display: inline-block;' value='".$row->$value."' ".$ceked."/><label for='".$row->$value."' style='display: inline-block; margin-right: 10px;'>".$row->$name_value."</label>";
        }
    }
    
    //CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
    public function listarray($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            if (array_search($row->tag_id, $array_tag) === false) {
            } else {
            echo $row->$name_value.", ";
            }
        }
    }
	
}