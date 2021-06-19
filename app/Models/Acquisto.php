<?php
    use Illuminate\Database\Eloquent\Model;
    use App\Models\User;

    class Acquisto extends Model{
        protected $table = 'Acquisto';        
        protected $fillable = [
            'user_id',
            'nome_prodotto',
            'quantita'
        ];
       
        
        public function user(){
            return $this->belongsTo(User::class);
        }
    }
?>