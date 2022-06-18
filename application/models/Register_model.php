<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("location_model");
        $this->load->model("belt_model");
        $this->load->model("register_model");
        $this->load->library('form_validation');
    }

    private $_table = "register";

    public $name;
    public $kontak;
    public $belt_id;
    public $loc_id;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],
            
            ['field' => 'kontak',
            'label' => 'Contact',
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
        $this->name = $post["name"];
        $this->kontak = $post["kontak"];
        $this->belt_id = $post["belt"];
        $this->loc_id = $post["location"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->name = $post["name"];
        $this->kontak = $post["kontak"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}