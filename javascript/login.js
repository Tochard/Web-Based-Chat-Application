const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

continueBtn.onclick = ()=>{
    //Ajax starts
    let Xhr = new XMLHttpRequest(); //creating XML object
    Xhr.open("POST", "php/login.php", true);
    Xhr.onload = ()=>{
        if(Xhr.readyState === XMLHttpRequest.DONE){
            if(Xhr.status === 200){
                let data = Xhr.response;
                // console.log(data);
                if(data == "success"){
                    location.href = "users.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    
                }
            }
        }
    }
    //to send the form data through ajax to php
    let formData = new FormData(form); //creating new form data object
    Xhr.send(formData);  //sending the form data to php
}