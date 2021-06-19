<?php
    use Illuminate\Routing\Controller;  
    use Illuminate\Contracts\View\View;
    use App\Models\User;

    class ViewLayoutsController extends Controller{

        public function compose(View $view)
        {           
            $user = User::find(Session::get('user_id'));
            if($user !== null)       
                $view
                //->with('csrf_token', csrf_token())
                ->with('user', $user->username);
            else 
                $view
                //->with('csrf_token', csrf_token())
                ->with('user', null);
        }

    }

?>