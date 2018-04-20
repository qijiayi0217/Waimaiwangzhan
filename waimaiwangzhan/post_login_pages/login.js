function xzh116(){
			
			var allcookie=document.cookie;
			
			var check =allcookie.indexOf('userID');
			
			if (check!=-1){
				window.location.href="welcome.php";
			}
	    }
	    xzh116();