<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model
{
    private $_table = "lokasi";

    public $nama_lokasi;
    public $alamat;
    public $gmaps;

    public function rules()
    {
        return [
            ['field' => 'nama_lokasi',
            'label' => 'Location',
            'rules' => 'required'],
            
            ['field' => 'alamat',
            'label' => 'Address',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_lokasi = $post["nama_lokasi"];
        $this->alamat = $post["alamat"];
        $this->gmaps = $post["gmaps"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_lokasi = $post["nama_lokasi"];
        $this->alamat = $post["alamat"];
        $this->gmaps = $post["gmaps"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}