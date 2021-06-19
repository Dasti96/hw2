<!DOCTYPE html>
<html>
@extends('/layouts/main')
<head>
    @section('title')contattaci @endsection     
    <link rel="stylesheet" href='{{url("css/hw2_contattaci.css")}}'>    
</head>
<body>
@section('content')
    <header>
        <form method = 'post'>
            <div>
                <input name='_token' type="hidden" value="{{$csrf_token}}">            
                <h2 id='form_title'>Contattaci!</h2>               
                <span class='subTitle'><span class='essential'>*</span>Oggetto</span>
                <input type='text' name="object" id="object" value='{{"$old_object"}}'>
                <span class='subTitle'><span class='essential'>*</span>Descrizione</span>                              
                <textarea name="message" id="message" >{{"$old_mess"}}</textarea>                         
                <select name="category" id="category">
                    <option value="vuoto">-</option>
                    <option value="assunzioni">Assunzioni</option>
                    <option value="problemi_prod">Problemi con un prodotto</option>
                </select>
                <input type="submit" value='invia'>           
            </div>
            @if($old_mess!==null || $old_object!==null || $old_category!==null)             
                <p id='error_mess' class='error'>Verifica che tutti i campi siano compilati</p>                        
            @endif
            <!--<p id='error_mess' class='hidden'></p>!-->  
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