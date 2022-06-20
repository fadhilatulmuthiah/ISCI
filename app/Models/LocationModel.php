<?php
namespace App\Models;
use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $table = "lokasi";
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_lokasi','alamat','gmaps'];
    
    // public function rules()
    // {
    //     return [
    //         ['field' => 'nama_lokasi',
    //         'label' => 'Location',
    //         'rules' => 'required'],
            
    //         ['field' => 'alamat',
    //         'label' => 'Address',
    //         'rules' => 'required']
    //     ];
    // }
}