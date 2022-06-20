<?php
namespace App\Models;
use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = "register";
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name','kontak','belt_id','loc_id'];
}