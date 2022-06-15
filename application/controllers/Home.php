<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('home/index');
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