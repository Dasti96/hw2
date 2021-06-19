<?php
    use Illuminate\Database\Eloquent\Model;


    class Message extends Model{
        protected $fillable = [
            'id_user',
            'messaggio',
            'categoria',
            'oggetto'
        ];

        public function User(){
            return $this->belongsTo('User');
        }
    }
?>