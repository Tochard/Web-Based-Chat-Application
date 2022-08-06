const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

sendBtn.onclick = ()=>{
        //Ajax starts
        let Xhr = new XMLHttpRequest(); //creating XML object
        Xhr.open("POST", "php/insert-chat.php", true);
        Xhr.onload = ()=>{
            if(Xhr.readyState === XMLHttpRequest.DONE){
                if(Xhr.status === 200){
                    inputField.value = ""; //to leave leave the input field blank once message is inserted to the database
                    scrollToBottom();
                }
            }
        }
        //to send the form data through ajax to php
        let formData = new FormData(form); //creating new form data object
        Xhr.send(formData);  //sending the form data to php
}


chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active")
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active")
}

setInterval(()=>{
	//Ajax starts
	let Xhr = new XMLHttpRequest(); //creating XML object
	Xhr.open("POST", "php/get-chat.php", true);
	Xhr.onload = ()=>{
		if(Xhr.readyState === XMLHttpRequest.DONE){
			if(Xhr.status === 200){
				let data = Xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }

			}
		}
	}
     //to send the form data through ajax to php
     let formData = new FormData(form); //creating new form data object
     Xhr.send(formData);  //sending the form data to php
}, 500); //this function will frequently run after 500ms


function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}

