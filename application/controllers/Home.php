<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("location_model");
        $this->load->model("belt_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['location'] = $this->location_model->getAll();
        $data['belt'] = $this->belt_model->getAll();

        // var_dump($data['location'][0]->nama_lokasi); exit();

        $this->load->view('template/header');
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }

    public function coach()
    {
        $this->load->view('template/header');
        $this->load->view('home/coach');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $this->load->view('home/login');
    }

    public function student()
    {
        $this->load->view('home/student');
    }

}
?>