
const messagesButton = document.querySelector('#messages_button');
const back_button = document.querySelector('#back_button');
var show_messages = false;

function onResponse(response){
    if(response.ok){
        console.log('json recuperato');
        return response.json();        
    }
    else
        console.log('errore! impossibile recuperare il json');        
}

//MESSAGE BODY SHOW
function onMessageIndex(json){
    const modal_messages = document.querySelector('#messages_content');
    modal_messages.innerHTML='';

    const message_body = document.createElement('span');
    message_body.textContent = json['messaggio'];
    modal_messages.appendChild(message_body);
    
    show_messages = false;
}

//MESSAGE BUTTON
function onClickMessage(event){   
    fetch('get/messages/'+encodeURIComponent(event.currentTarget.dataset.index)).then(onResponse).then(onMessageIndex);    
     
}


//MESSAGES BUTTON FUNC
function onClickmessagesButton(json){    
    //shop orders
    const orders_username = document.querySelector('#orders_username');
    const modal_content = document.querySelector('#modal_content'); 
    //messages
    const messages_username = document.querySelector('#messages_username');
    const modal_messages = document.querySelector('#messages_content');
    modal_messages.innerHTML=''; 
   

    if(!show_messages){             
        for(elem of json){           
            const messaggio = document.createElement('p');
            messaggio.classList.add('message_body');
            messaggio.dataset.index = elem['id'];
            messaggio.textContent = 'id: ' + elem['id'] + ' oggetto: ' +  elem['oggetto'];
            modal_messages.appendChild(messaggio);
            messaggio.addEventListener('click', onClickMessage);    

        }

        orders_username.classList.add('hidden');
        messages_username.classList.remove('hidden');

        modal_content.classList.add('hidden');
        modal_messages.classList.remove('hidden');

        back_button.classList.remove('hidden');
        messagesButton.classList.add('hidden');
        show_messages = true;
        //messagesButton.textContent = 'Indietro';
    }else{
        orders_username.classList.remove('hidden');
        messages_username.classList.add('hidden');

        modal_content.classList.remove('hidden');
        modal_messages.classList.add('hidden');

        back_button.classList.add('hidden');
        messagesButton.classList.remove('hidden');
        show_messages = false;
        //messagesButton.textContent = 'I miei messaggi';
    }    
}

//MESSAGE BUTTON
function getMessages(){
    fetch('get/messages').then(onResponse).then(onClickmessagesButton);
}

messagesButton.addEventListener('click',getMessages);
back_button.addEventListener('click',getMessages);
