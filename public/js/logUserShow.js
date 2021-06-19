const logUserButton = document.querySelector('#login');

//MOUSE OVER LOGIN FUNC
function onUserLoginHover(json){   
    if(json!==null)      
        logUserButton.textContent = 'Logout';    
}

//MOUSE LEAVE LOGIN FUNC
function onUserLoginLeave(json){   
    if(json!==null)
        logUserButton.textContent = json['username'];
    else 
        logUserButton.textContent = 'Login';
}

function onResponse(response){
    if(response.ok){
        console.log('json recuperato');
        return response.json();        
    }
    else
        console.log('errore! impossibile recuperare il json');        
}

//MOUSE OVER LOGIN BUTTON
function mousehoverLoginButton(){    
    fetch('get/user').then(onResponse).then(onUserLoginHover);  
}

//MOUSE LEAVE LOGIN BUTTON
function mouseleftLoginButton(){  
    fetch('get/user').then(onResponse).then(onUserLoginLeave);    
  
}
logUserButton.addEventListener('mouseover', mousehoverLoginButton);
logUserButton.addEventListener('mouseleave', mouseleftLoginButton);