function populateWithBooks(genre) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("content").innerHTML = this.responseText;
		}
	}
	xmlhttp.open("GET", "http://rivaitz.myweb.cs.uwindsor.ca/books.php?genre=" + genre);
	xmlhttp.send();
	
}