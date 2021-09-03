<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Empresas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empresas';



    protected $fillable = [
        'nome', 'email', 'logotipo','site'
    ];

    public function filtro($nome)
    {


        $empresas = DB::table($this->table)
            ->select($this->table . '.*')           
        
            ->where(function ($query) use ($nome) {
                if (!is_null($nome)) $query->where($this->table . '.nome', 'ILIKE', '%'.$nome.'%');
            })         

            ->whereNull($this->table . '.deleted_at')
            ->orderBy('nome')
            ->paginate(10);


        if (is_null($empresas)) {
            return [];
        }
        return $empresas;
    }

    
}
