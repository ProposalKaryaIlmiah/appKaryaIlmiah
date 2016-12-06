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
		$names = array('anggi', 'mahasiswa');
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
}
	