chrome.tabs.executeScript( {
code: "window.getSelection().toString();"
}, function(selection) {
document.getElementById("text").value = selection[0];
});
