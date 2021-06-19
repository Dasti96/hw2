<?php
    use Illuminate\Routing\Controller;
    use App\Models\User;   


    class LogController extends Controller{      
        public function index(){
            $old_username = Request::old('user');

            return view('hw2_login')
            ->with('csrf_token', csrf_token())
            ->with('old_username', $old_username);         
        }

        public function checkLogin(){
            if(Session::get('user_id') !== null)
                return json_encode(true);
            else 
                return  json_encode(false);                
        }

        public function getUser(){
            return json_encode(User::where('id', Session::get('user_id'))
            ->first());            
        }


        public function login(){
            $row = User::where('username', request('user'))
            ->where('password', request('pass'))
            ->first();            

            if(isset($row)){          
                Session::put('user_id', $row->id);
                $user = User::find(Session::get('user_id'));
                if(Session::get('current_page')!== null)
                    return redirect(Session::get('current_page'));                   
                else 
                    return redirect('home');
                              
              
                }else
                    return redirect('login')
                    ->withInput();                    
        }

        public function logout(){
            if(Session::get('user_id') === null)
                exit;
            $current_page = Session::get('current_page');
            Session::flush();
            if($current_page !== null)
                return redirect($current_page);
            else 
                return redirect('home');
        }

    }
?>