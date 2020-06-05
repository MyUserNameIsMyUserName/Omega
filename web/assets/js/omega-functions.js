
function loadDocument(template_url, parent_id, var_names="", getting_data="") {
    var elementHelper = fetchSyncUrl(template_url).replace("[<"+var_names+">]", fetchSyncUrl(api_location, getting_data));
    var unique_element_id = Math.random().toString(36).substr(2, 9);
    elementHelper = elementHelper.split('[<unique_element_id>]').join("omega_id_"+unique_element_id)
    document.querySelector("#"+parent_id).innerHTML = elementHelper;
};

function postToDocument(template_url, parent_id, var_names="", sending_data="") {
    var elementHelper = fetchSyncUrl(template_url).replace("[<"+var_names+">]", sendSyncUrl(api_location,sending_data));
    var unique_element_id = Math.random().toString(36).substr(2, 9);
    elementHelper = elementHelper.split('[<unique_element_id>]').join("omega_id_"+unique_element_id)
    document.querySelector("#"+parent_id).innerHTML = elementHelper;
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