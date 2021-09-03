<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Funcionarios extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'funcionarios';



    protected $fillable = [
        'nome', 'sobrenome', 'empresa_id','email','telefone'
    ];

    public function filtro($nome)
    {


        $funcionarios = DB::table($this->table)
            ->select($this->table . '.*')           
        
            ->where(function ($query) use ($nome) {
                if (!is_null($nome)) $query->where($this->table . '.nome', 'ILIKE', '%'.$nome.'%');
            })        
             

            ->whereNull($this->table . '.deleted_at')
            ->orderBy('nome')
            ->paginate(10);


        if (is_null($funcionarios)) {
            return [];
        }
        return $funcionarios;
    }

    
}