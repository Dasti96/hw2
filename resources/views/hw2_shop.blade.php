<!DOCTYPE html>
<html>
@extends('/layouts/main')
   <head>
        @section('title')shop @endsection    
        <link rel="stylesheet" href='{{url("css/hw2_shop.css")}}'>    
        <script src = '{{url("js/contents_shop.js")}}' defer></script>
        <script src = '{{url("js/script_shop.js")}}' defer></script>
   </head>
    <body>
        @section('content')       
        <article>
            <section>              
                <div id='container'>
                    <form>
                        <p>cerca <input id = 'search' type="text"></p> 
                        <input type="submit" value="cerca">   
                    </form>   

                </div> 
                    <div>
                        <div id='container_cart'>
                            <h2>Carrello</h2>  
                            <div id = 'cart'></div>                                                     
                            <h2 id='check_out'>check-out</h2>  
                            <span id='show_orders'>mostra i tuoi ordini</span>                          
                        </div> 
                    </div>                                    
            </section>
        </article>   
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