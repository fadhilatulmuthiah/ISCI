<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Belt_model extends CI_Model
{
    private $_table = "belt";

    public $tingkat;
    public $warna;

    public function rules()
    {
        return [
            ['field' => 'tingkat',
            'label' => 'Grade',
            'rules' => 'required'],
            
            ['field' => 'warna',
            'label' => 'Color',
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
        $this->tingkat = $post["tingkat"];
        $this->warna = $post["warna"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->tingkat = $post["tingkat"];
        $this->warna = $post["warna"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}