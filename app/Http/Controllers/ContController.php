<?php
    use Illuminate\Routing\Controller;
    use App\Models\User;  


    class ContController extends Controller{
        public function index(){
            $old_mess = Request::old('message');
            $old_object =  Request::old('object');
            $old_category = Request::old('category');
            
            Session::put('current_page', 'contattaci');
            return view('hw2_contattaci')            
            ->with('csrf_token', csrf_token())            
            ->with('old_mess', $old_mess)
            ->with('old_object', $old_object)
            ->with('old_category', $old_category);
        }

        public function sendMessage(){
            if(Session::get('user_id')!==null){                
                
                if(request('message')===null || request('object')===null || request('category')==="vuoto")
                    return redirect('contattaci')
                    ->withInput();
                    

                    Message::create(array('id_user'=>Session::get('user_id'),'messaggio'=>request('message'),'categoria'=>request('category'),'oggetto'=>request('object')));
                    return redirect('contattaci');
            }else
                return redirect('login');
        }

    }

?>