function xzh(){
			
			var allcookie=document.cookie;
			
			var check =allcookie.indexOf('userID');
			
			if (check==-1){
				window.location.href="../index.html";
			}
	    }
	    xzh();
function open1234(name,name2,path){
 var name = escape(name);  
 var name2= escape(name2);
    var expires = new Date(0);  
    path = path == "" ? "" : ";path=" + path;  
    document.cookie = name + "="+ ";expires=" + expires.toUTCString() + path;
    document.cookie = name2 + "="+ ";expires=" + expires.toUTCString() + path;
    document.cookie = "usertype" + "="+ ";expires=" + expires.toUTCString() + path;    
    window.location.href="../index.html";
}	