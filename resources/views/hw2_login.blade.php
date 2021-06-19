<!DOCTYPE html>
<html>
@extends('/layouts/main')
<head>
    @section('title')login @endsection    
    <link rel="stylesheet" href='{{url("css/hw2_reg_log.css")}}'>  
    <script src = '{{url("js/hw2_log_script.js")}}' defer></script>
</head>
<body>
@section('content') 
    <header>  
    <form method='post'>  
        <input name='_token' type="hidden" value="{{$csrf_token}}">         
        <h2 id='form_title'>Login</h2>
            <div>                          
                <label>Username<input id="user" name="user" type="text" value='{{"$old_username"}}'></label>
                <label>Password<input id="pass" name="pass" type="password"></label>
                <input id="sub" type="submit" value="Login">
            </div>        
            
            <a id='reg_link' href='{{url("/reg")}}'>non sei ancora registrato? Clicca qui!</a>     
            <p id='error_mess' class='hidden'></p>  
            
            @if($old_username!==null)
                <p id='error_mess' class='error'>Username o password errati</p>  
            @endif                                 
    </form>   
    </header>
        <div>
            <div id='container_cart', class="hidden">
                <h2>Carrello</h2>  
                <div id = 'cart'></div>                                                     
                <h2 id='check_out' >check-out</h2>  
                <span id='show_orders'>mostra i tuoi ordini</span>                           
            </div>                     
        </div>
    <!--<footer>
            <div>
                <em>Telefono: 0331239822 </em>
                <em>Email: <a href="">saep.eng@gmail.com </a></em> 
                <em id='nome_cognome'>Nome e cognome: Salvatore Alí </em>
                <em id="matricola">Matricola: O46001511 </em>
            </div>
    </footer>!-->
        @endsection
</body>
</html>