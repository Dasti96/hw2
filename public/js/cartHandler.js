const cart_container = document.querySelector('#container_cart');
cart_container.parentElement.classList.add('hidden');
const orders_button = document.querySelector('#show_orders'); 
const modal = document.querySelector('#modal');

//FETCH FIRST PROMISE
function onResponse(response){
    if(response.ok){
        console.log('json recuperato');
        return response.json();        
    }
    else
        console.log('errore! impossibile recuperare il json');        
}

//DELETE BUTTON
function onClickDelete(event){   
    console.log(event.currentTarget.parentElement.dataset.index);
    cart = cart_container.querySelector('#cart'); 
           
    fetch('get/deleteCartElem/'+encodeURIComponent(event.currentTarget.parentElement.dataset.index)).then(onResponse).then(cartAddElem);    
}


//ADD ELEM TO CART FUNC (show too)
function cartAddElem(json){    
    cart = cart_container.querySelector('#cart');
    cart.innerHTML='';   
    console.log(json.length);
    for(let i = 0; i < json.length; i++){ 
        if(json[i]===null)      //json[i]===''           
            continue;      
        
        const title = document.createElement('h3');
        title.classList.add('title');
        title.textContent = json[i]['title'];       //json[i][0]
        const cart = document.querySelector('#cart');
        const cart_elem = document.createElement('div');
        cart_elem.dataset.index = i;
        cart_elem.classList.add('cart_element');
        const img = document.createElement('img');   
        img.src = json[i]['img'];     //json[i][2] 
        cart_elem.appendChild(title);
        cart_elem.appendChild(img);
        const del = document.createElement('p');
        const quantity = document.createElement('p');
        quantity.classList.add('.quantity');
        quantity.textContent = "Quantita': " + json[i]['quantity'];    //json[i][1]
        del.textContent = 'X';        
        del.classList.add('delete'); 
        
        cart_elem.appendChild(quantity);    
        cart_elem.appendChild(del);    
        cart.appendChild(cart_elem);  
    
        del.addEventListener('click',onClickDelete);    
        console.log(json);          
    }
}

//ADD ELEM TO CART BUTTON
function onClickAddCart(event){   
    const num_count = parseInt(event.currentTarget.parentElement.querySelector('.counter').textContent);
    if(num_count === 0)          
        return;

    const prod_img = event.currentTarget.parentElement.querySelector('img');
    const prod_title = event.currentTarget.parentElement.querySelector('.title');
    const counter = parseInt(event.currentTarget.parentElement.querySelector('.counter').textContent);  

    const formData = new FormData();
    formData.append('title',prod_title.textContent);
    formData.append('quantity',counter);
    formData.append('img',prod_img.src);     
   
    fetch('get/cart',{        
        method: 'POST',
        body: formData      
    }).then(onResponse).then(cartAddElem);
}

//LOGIN VER.
function verifyLogin(json){
    return json;
}


//CHECKOUT FUNC (ver. login)
function onCheckoutLogin(json){   
    if(verifyLogin(json)){                
        fetch('get/checkOut');         
        const cart = document.querySelector('#cart');
        cart.innerHTML='';
    }else        
        location.href = "login";      

}

//CHECKOUT BUTTON
function onCheckOutClick(){    
    fetch('get/login').then(onResponse).then(onCheckoutLogin);  
     
}


var show_cart = false;
//CART BUTTON
function onClickShowCart(){
    cart = cart_container.querySelector('#cart');
    if(!show_cart){        
        cart.innerHTML='';       
        cart_container.parentElement.classList.remove('hidden');                 
        fetch('get/cart').then(onResponse).then(cartAddElem);
        show_cart = true;
    }
    else{
        cart_container.parentElement.classList.add('hidden');
        show_cart = false;
    }
}

//SHOW ORDERS FUNC
function ordersShow(json){
    console.log(json);
    modal_content.innerHTML='';
    for(elem of json){
        const acquisto = document.createElement('p');       
        acquisto.textContent ="id: " + elem['id'] + ","  + " email: " + elem['user']['email'] + "," + " prodotto: "  + elem['nome_prodotto'] + "," + " quantita: " +  elem['quantita'];
        modal_content = modal.querySelector('#modal_content');
        modal_content.appendChild(acquisto);
    }
}

//MODAL BUTTON
function showModal(){  
    modal.classList.remove('hidden');
    document.body.classList.add('noScroll');
    modal.style.top = window.pageYOffset + 'px';        
           
}

//CLOSE MODAL BUTTON
function onClickCloseModal(){
    modal.classList.add('hidden');        
    document.body.classList.remove('noScroll');
          
}

//SHOW ORDERS FUNC
function showOrdersClick(json){
    if(verifyLogin(json)){       
        fetch('get/orders').then(onResponse).then(ordersShow);
    }else 
        location.href = "login";        ///////
    
    showModal();   
}

//SHOW ORDERS BUTTON  (ver. login)
function onShowOrdersClick(){     
    fetch('get/login').then(onResponse).then(showOrdersClick);   
}

orders_button.addEventListener('click',onShowOrdersClick);

const closeModalButton = document.querySelector('#modal_closeButton');
closeModalButton.addEventListener('click',onClickCloseModal);

const check_out = document.querySelector('#check_out');
check_out.addEventListener('click',onCheckOutClick);

const cart_button = document.querySelector('#cart_button');
cart_button.addEventListener('click',onClickShowCart);