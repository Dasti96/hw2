const article = document.querySelector('article');
const search = document.querySelector('#search');


const prod_cont = document.createElement('div');    
document.querySelector('#container').appendChild((prod_cont));

function onResponse(response){
    if(response.ok){
        console.log('json recuperato');
        return response.json();        
    }
    else
        console.log('errore! impossibile recuperare il json');        
}

function onJson(json){   
    prod_cont.innerHTML = '';
    const results =  json.results;   
   console.log(results);
    for(product of results){        
        const div_prod = document.createElement('div');        
        prod_cont.appendChild(div_prod);
        div_prod.classList.add('product');
        const title = document.createElement('h3');
        title.classList.add('title');
        title.textContent = product.name;
        div_prod.appendChild(title);
        const img = document.createElement('img');  
        img.src = product.background_image; 
        div_prod.appendChild(img);
        const descr = document.createElement('p');
        const descr_button = document.createElement('p');
        descr_button.classList.add('descr_button');
        descr_button.textContent = product_menu.descr;       
        descr_button.addEventListener('click',onClickDescr);
        descr.classList.add('descr');
        descr.classList.add('hidden');        
        const minus = document.createElement('p');
        minus.classList.add('minus_plus');
        minus.addEventListener('click',onClickMinus);
        const plus = document.createElement('p');
        plus.classList.add('minus_plus');
        plus.addEventListener('click',onClickPlus);
        const counter = document.createElement('p'); 
        counter.classList.add('counter');
        const add_cart = document.createElement('p');     

        add_cart.classList.add('add_cart');
        add_cart.addEventListener('click',onClickAddCart);
        descr.addEventListener('click',onClickDescr);

        descr.textContent = product.genres[0].name;
        minus.textContent = product_menu.minus;
        plus.textContent = product_menu.plus;
        counter.textContent = product_menu.counter;
        add_cart.textContent = product_menu.addToCart;  
       
        div_prod.appendChild(descr_button);
        div_prod.appendChild(descr);
        div_prod.appendChild(plus);
        div_prod.appendChild(counter);
        div_prod.appendChild(minus);
        div_prod.appendChild(add_cart);
    }   

}

function API_search(){
    let val = '""';
    if(search.value !== '')
        val = search.value;    
    return val;
}

function gameAPI(){   
    let val = API_search();      
    fetch('get/games/'+encodeURIComponent(val)).then(onResponse).then(onJson);
}

function find(event){
    event.preventDefault();    
    gameAPI();
}

const form = document.querySelector("form");
form.addEventListener('submit',find);
gameAPI();


function onClickPlus(event){
    const plus = event.currentTarget;
    const div  = plus.parentElement;
    const counter = div.querySelector('.counter');
    let numb = parseInt(counter.textContent) + 1;
    counter.textContent = numb;   
}


function onClickMinus(event){
    const minus = event.currentTarget;
    const div  = minus.parentElement;
    const counter = div.querySelector('.counter');
    if(parseInt(counter.textContent) === 0)
        return
    let numb = parseInt(counter.textContent) - 1;
    counter.textContent = numb;
}

function onClickDescr(event){  
    const parent = event.currentTarget.parentElement;
    parent.querySelector('.descr').classList.remove('hidden');
    parent.querySelector('.descr_button').classList.add('hidden');
}