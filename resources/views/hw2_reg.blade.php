<!DOCTYPE html>
<html>
@extends('/layouts/main')
<head>
    @section('title')registrazione @endsection    
    <link rel="stylesheet" href='{{url("css/hw2_reg_log.css")}}'>  
    <script src = '{{url("js/hw2_reg_script.js")}}' defer></script> 
</head>
<body>
    @section('content')    
    <header>
    <form method='post'>
    <input name='_token' type="hidden" value="{{$csrf_token}}">
        <h2 id='form_title'>Registrati</h2>
            <div>
                <label><span class="essential">*</span>Nome<input id="nome" name="nome" type="text" value='{{"$old_nome"}}'></label>
                <label><span class="essential">*</span>Cognome<input id="cognome" name="cognome" type="text"  value='{{"$old_cognome"}}'></label>
                <label><span class="essential">*</span>Email<input id="email" name="email" type="text" value='{{"$old_email"}}'></label>
                <label><span class="essential">*</span>Username<input id="user" name="user" type="text" value='{{"$old_username"}}'></label>
                <label><span class="essential">*</span>Password<input id="pass" name="pass" type="password"></label>
                <label>Numero di telefono<input id="tel" name="tel" type="text" value='{{"$old_tel"}}'></label>
                <input id="sub" type="submit" value="Registrati">  
            </div>         
            @if(session('status'))                  
            <p id='error_mess' class='error'>{{session('status')}}</p>               
            @else
            <p id="error_mess" class="hidden"></p>      
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
    @endsection
</body>
</html>