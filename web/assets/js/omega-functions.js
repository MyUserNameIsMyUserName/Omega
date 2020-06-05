
function loadDocument(template_url, parent_id, var_names="", getting_data="") {
    document.querySelector("#"+parent_id).innerHTML = fetchSyncUrl(template_url).replace("[<"+var_names+">]", fetchSyncUrl(api_location, getting_data));
};

function postToDocument(template_url, parent_id, var_names="", sending_data="") {
    document.querySelector("#"+parent_id).innerHTML = fetchSyncUrl(template_url).replace("[<"+var_names+">]", sendSyncUrl(api_location,sending_data));
};

function fetchSyncUrl(url, data = ""){
    var request = new XMLHttpRequest();
    if (data !== ""){
        url = url+'?'+data;
    };
    request.open('GET', url, false);
    request.send();
    
    if (request.status === 200) {
        return request.responseText;
    }
};

function sendSyncUrl(url,data){
    var request = new XMLHttpRequest();
    request.open('POST', url, false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send( data);
    
    if (request.status === 200) {
        return request.responseText;
    }
}