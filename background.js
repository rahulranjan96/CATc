/*chrome.contextMenus.create({
chrome.contextMenus.create({
title:"Male",
contexts:["selection"],
onclick:myFunction,
id:"male"
});
chrome.contextMenus.create({
title:"Female",
contexts:["selection"],
onclick:myFunction,
id:"female"
});
chrome.contextMenus.create({
title:"Country",
contexts:["selection"],
onclick:myFunction,
id:"country"
});
chrome.contextMenus.create({
title:"State",
contexts:["selection"],
onclick:myFunction,
id:"state"
});
function myFunction(data){
	var id = data.menuItemId;
	//chrome.windows.create({url:"http://localhost/db1/backend.php?text="+encodeURIComponent(data.selectionText),type:"panel"});
	window.location.href = "http://localhost/db1/backend.php?w1=" + data.selectionText + "&w2=" + id;
	//var xhttp = new XMLHttpRequest();
	//xhttp.open("GET", "http://localhost/db1/backend.php?t=" + data.selectionText, true);
	//xhttp.send();

}*/

