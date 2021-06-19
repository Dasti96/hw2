<?php
    use Illuminate\Routing\Controller;  
    use App\Models\User;
   

    class ShopController extends Controller{
        public function cartHandler(){
            if(request('title') !== null && request('quantity') !== null && request('img') !== null){
                $prod = array('title'=>request('title'),'quantity'=>request('quantity'),'img'=>request('img'));
                Session::push('prod', $prod);
            }
            
            if(Session::get('prod') !== null)
                return  Session::get('prod');            
            else 
                return json_encode('');     
           
        }

        public function deleteFromCart(){            
            if(request('index')!==null){
                $prod = Session::get('prod');
                $prod[request('index')]=null;             
                Session::put('prod',$prod);
                return Session::get('prod');//
            }
        }

        public function checkOut(){
            if(Session::get('user_id') !== null && Session::get('prod') !== null){
                $row = User::find(Session::get('user_id'));
                $user = User::where('username', $row['username'])->first();
                $prod = Session::get('prod');                              

                for($i=0; $i < count($prod); $i++){
                    if($prod[$i]===null)
                        continue;
                    Acquisto::create(array('user_id'=>$user['id'], 'nome_prodotto'=>$prod[$i]['title'], 'quantita'=>$prod[$i]['quantity']));                   
                }
                Session::forget('prod');
            }
        }

        public function ordersHandler(){
            if(Session::get('user_id')!==null){          

                $row = Acquisto::with('user')
                ->where('user_id',Session::get('user_id'))               
                ->get();
               
                return json_encode($row);
            }
        }
    }
?>
