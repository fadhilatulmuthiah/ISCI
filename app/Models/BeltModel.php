<?php 
namespace App\Models;
use CodeIgniter\Model;

class BeltModel extends Model
{
    protected $table = "belt";
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['tingkat','warna'];
}