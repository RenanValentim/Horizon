<?php

namespace App\Models;

use CodeIgniter\Model;

class ChamadoModel extends Model
{
    protected $table = 'chamados';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id','id_usuario','titulo','descricao','data_criacao','status'];
}
