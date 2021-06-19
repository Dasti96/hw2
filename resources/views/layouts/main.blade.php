<!DOCTYPE html>
<html>
<head> 
    <title>SAEP ICT Engineering/@yield('title')</title>   
    <meta name="viewport" content="width=device width, initial scale=1">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">  
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href='{{url("css/hw2_main.css")}}'>
    <script src = '{{url("js/cartHandler.js")}}'  defer></script>   
    <script src = '{{url("js/messages_handler.js")}}'  defer></script>
    <script src = '{{url("js/logUserShow.js")}}'  defer></script>
</head>
<body>
    <div id='modal' class='hidden'>
        <div>
            <div id='modal_head'>
                <h2 id='orders_username'>Ordini di @if($user !== null) '{{$user}}' @endif</h2>
                <h2 id='messages_username' class='hidden'>Messaggi di @if($user !== null) '{{$user}}' @endif</h2>
                <span id='modal_closeButton' class='delete'>X</span>
            </div>
            <div id='modal_content'></div> 
            <div id='messages_content' class='hidden'></div>
            <h3 id='messages_button'>I miei messaggi</h3>  
            <h3 id='back_button' class='hidden'>Indietro</h3>          
        </div>
    </div>
     
    <nav>        
        <div class="navigation">
            <a id="home" href='{{url("home")}}'>home</a>
            <a id="shop" href='{{url("shop")}}'>shop</a>
            <img id="logo" src='{{url("img/saep_ict.png")}}' alt="">     
           
            @if($user == null)
            <a id='login' href='{{url("login")}}'>login</a>
            @else           
            <a id='login' href='{{url("logout")}}'>{{$user}}</a>            
            @endif              
            <img id="cart_button" src='{{url("img/cart.png")}}' alt="">           
        </div>    
    </nav>    
    @yield('content')
    <footer>
            <div>
                <em>Telefono: 0331239822 </em>
                <em>Email: <a href="">saep.eng@gmail.com </a></em> 
                <em id='nome_cognome'>Nome e cognome: Salvatore Alí </em>
                <em id="matricola">Matricola: O46001511 </em>
            </div>
    </footer>
</body>