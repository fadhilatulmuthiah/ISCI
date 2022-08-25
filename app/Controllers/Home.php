<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\LocationModel;
use App\Models\BeltModel;
use App\Models\RegisterModel;

class Home extends BaseController {

    protected  $location;
    protected  $belt;
    protected  $register;

	public function __construct()
    {
        $this->location = new LocationModel();
        $this->belt = new BeltModel();
        $this->register = new RegisterModel();
    }

    public function index()
    {
        $data['location'] = $this->location->findAll();
        $data['belt'] = $this->belt->findAll();
        $data['validation'] = \Config\Services::validation();

        // var_dump($data); exit();

        return view('template/header')
            . view('home/index', $data)
            . view('template/footer');
    }

    public function add()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[2]|alpha_space',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'min_length' => 'Kontak harus lebih dari atau sama dengan 2 huruf',
                    'alpha_space' => 'Nama tidak diperkenankan sebagai angka'
                ]
            ],
            'kontak' => [
                'rules' => 'required|min_length[10]|numeric',
                'errors' => [
                    'required' => 'Kontak harus diisi',
                    'min_length' => 'Kontak harus lebih dari atau sama dengan 10 angka',
                    'numeric' => 'Kontak harus berupa angka'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // var_dump($this->request->getPost('name')); exit();
            $this->register->insert([
                "name" => $this->request->getPost('name'),
                "kontak" => $this->request->getPost('kontak'),
                "belt_id" => $this->request->getPost('belt'),
                "loc_id" => $this->request->getPost('location')
            ]);
            session()->setFlashdata('success', 'Berhasil disimpan');
            return redirect()->to('/'); 
        }
    }

    public function coach()
    {
        return view('template/header')
            . view('home/coach')
            . view('template/footer');
    }

    public function login()
    {
        return view('home/login');
    }
    
// nanti disetting ulang untuk login per role
    public function student()
    {
        return view('template/headdash')
            . view('home/student');
    }

}
?>