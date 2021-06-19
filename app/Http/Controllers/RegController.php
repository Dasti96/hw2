<?php
    use Illuminate\Routing\Controller;
    use App\Models\User;   
   
    class RegController extends Controller{
        
        private function checkError(){
            $data = array('nome' => request('nome'),'cognome' => request('cognome'),'password' => request('pass'),'username' => request('user'), 'email' => request('email'),'telefono' => request('tel'));           
           
            $val = Validator::make($data, [               
                'nome' => 'required|max:255|string',
                'cognome' => 'required|max:255|string',
                'password' => 'required|max:255|min:4',               
                'username' => 'required|unique:users|string|max:255|min:4',
                'email' => 'required|unique:users|max:255|email',
                //'email' => 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
                'telefono' => 'numeric|nullable|min:10'  
            ]);      
            
            return $val->errors()->first();
        }
 

        public function index(){
            $old_nome = Request::old('nome');
            $old_cognome = Request::old('cognome');
            $old_email = Request::old('email');
            $old_username = Request::old('user');
            $old_tel = Request::old('tel');           
           
            return view('hw2_reg')
            ->with('csrf_token', csrf_token())
            ->with('old_nome',$old_nome)
            ->with('old_cognome',$old_cognome)
            ->with('old_email',$old_email)
            ->with('old_username',$old_username)
            ->with('old_tel',$old_tel);           
        }    

         
        public function reg(){
            if($this->checkError()!==''){              
                return redirect('reg')
                ->with('status', $this->checkError())                              
                ->withInput();               
            }              
        
            User::create(['nome' => request('nome'),'cognome' => request('cognome'),'password' => request('pass'),'username' => request('user'), 'email' => request('email'),'telefono' => request('tel')]);          
            return redirect('login');
                 
        }
        
    }


?>