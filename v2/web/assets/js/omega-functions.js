function omega(req_type, template_url, parent_id, var_names="", getting_data="") {
    template_url = components_location + template_url + "/index.html";
    var elementHelper = omegaFetchUrl("GET", template_url ).replace("[<"+var_names+">]", omegaFetchUrl(req_type, api_location, getting_data));
    var unique_element_id = Math.random().toString(36).substr(2, 9);
    elementHelper = elementHelper.split('[<unique_element_id>]').join("omega_id_"+unique_element_id)
    document.querySelector("#"+parent_id).innerHTML = elementHelper;
};

function omegaGet(template_url, parent_id, var_names="", getting_data=""){
    omega("GET", template_url, parent_id, var_names, getting_data);
}

function omegaPost(template_url, parent_id, var_names="", getting_data=""){
    omega("POST", template_url, parent_id, var_names, getting_data);
}

function omegaFetchUrl(req_type, url, data = ""){
    var request = new XMLHttpRequest();
    if (req_type.toUpperCase() == "GET"){
        if (data !== ""){
            request.open('GET', url+'?'+data, false);
        } else {
            request.open('GET', url, false);
        };
        request.send();
    } else if (req_type.toUpperCase() == "POST") {
        request.open('POST', url, false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send( data );
    } else {
        alert("Notification: Error non-existant request type!")
    };
        
    if (request.status === 200) {
        return request.responseText;
    };
};
