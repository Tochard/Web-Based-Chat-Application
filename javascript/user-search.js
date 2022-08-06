const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
onlineList = document.querySelector(".users .online-users"),
userList = document.querySelector(".users .users-list");


searchBtn.onclick = ()=>{
	searchBar.classList.toggle("active");
	searchBar.focus();
	searchBtn.classList.toggle("active");
	searchBar.value = "";
}

searchBar.onkeyup = () =>{
	let searchTerm = searchBar.value;

	if(searchTerm !=""){
		searchBar.classList.add("active");
	}else{
		searchBar.classList.remove("active");
	}
	//Ajax starts
	let Xhr = new XMLHttpRequest(); //creating XML object
	Xhr.open("POST", "php/search.php", true);
	Xhr.onload = ()=>{
		if(Xhr.readyState === XMLHttpRequest.DONE){
			if(Xhr.status === 200){
				let data = Xhr.response; 
				// console.log(data);
				userList.innerHTML = data;
				
			}
		}
	}
	Xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	Xhr.send("searchTerm=" + searchTerm);
	
}

setInterval(()=>{
	//Ajax starts
	let Xhr = new XMLHttpRequest(); //creating XML object
	Xhr.open("GET", "php/show-online-users.php", true);
	Xhr.onload = ()=>{
		if(Xhr.readyState === XMLHttpRequest.DONE){
			if(Xhr.status === 200){
				let data = Xhr.response;
				// console.log(data);
				if(!searchBar.classList.contains("active")){//if  active is not contained in the search bar then add this
					onlineList.innerHTML = data;
				}
				
				
			}
		}
	}
	Xhr.send();
}, 500); //this function will frequently run after 500ms

setInterval(()=>{
	//Ajax starts
	let Xhr = new XMLHttpRequest(); //creating XML object
	Xhr.open("GET", "php/users.php", true);
	Xhr.onload = ()=>{
		if(Xhr.readyState === XMLHttpRequest.DONE){
			if(Xhr.status === 200){
				let data = Xhr.response;
				// console.log(data);
				if(!searchBar.classList.contains("active")){//if  active is not contained in the search bar then add this
					userList.innerHTML = data;
				}
				
				
			}
		}
	}
	Xhr.send();
}, 500); //this function will frequently run after 500ms


