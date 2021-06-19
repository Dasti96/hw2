<?php
    use Illuminate\Routing\Controller;
    use App\Models\User;   

    class MessagesController extends Controller{

        public function getMessageByIndex(){
            if(request('index')!==null){
                $row = Message::where('id', request('index'))->first();
                return json_encode($row);
            }
        }

        public function messagesHandler(){
            if(Session::get('user_id')!==null){
                $rows = Message::where('id_user', Session::get('user_id'))->get();
                return json_encode($rows);

            }else
                return redirect('login');
        }
    }
?>