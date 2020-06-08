class omegaRequestClass {

    constructor(req_info) {
      this.req_type = req_info.req_type;
      this.template_name = req_info.template_name;
      this.parent_element_id = req_info.parent_element_id;
      this.var_names = req_info.var_names;
      this.req_data = req_info.req_data;
    }

    omega() {
        this.template_name = omegaConfig.components_location + this.template_name + "/index.html";
        var elementHelperTemplate = this.omegaFetchUrl("GET", this.template_name );
        var elementHelperData = JSON.parse(this.omegaFetchUrl(this.req_type, omegaConfig.api_location));
        this.var_names.forEach(function(entry) {
            elementHelperTemplate = elementHelperTemplate.split('[<'+entry+'>]').join(elementHelperData[entry]);
        });
        var unique_element_id = Math.random().toString(36).substr(2, 9);
        elementHelperTemplate = elementHelperTemplate.split('[<unique_element_id>]').join("omega_id_"+unique_element_id)
        document.querySelector("#"+this.parent_element_id).innerHTML = elementHelperTemplate;
    }

    omegaFetchUrl( req_type, url ){
        var request = new XMLHttpRequest();
        if (req_type.toUpperCase() == "GET"){
            if ((this.req_data !== "") && (this.req_type.toUpperCase() !== "POST")){
                request.open('GET', url+'?'+this.req_data, false);
            } else {
                request.open('GET', url, false);
            };
            request.send();
        } else if (req_type.toUpperCase() == "POST") {
            request.open('POST', url, false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var reqHelperData = "";
            var obj = this.req_data;
            Object.keys(obj).forEach(function(key) {

                console.log(key, obj[key]);
                reqHelperData += key +"="+ obj[key] +"&";
              
              });
            request.send( reqHelperData );
        } else {
            alert("Notification: Error non-existant request type!")
        };
            
        if (request.status === 200) {
            return request.responseText;
        };
    };

};

function omegaRequest(req_type, template_url, parent_id, var_names="", getting_data=""){
    var omegaRequestInfo = {
        "req_type"          :   req_type,
        "template_name"     :   template_url,
        "parent_element_id" :   parent_id,
        "var_names"         :   var_names,
        "req_data"          :   getting_data
    };
    myRequest = new omegaRequestClass(omegaRequestInfo);
    
    myRequest.omega();
}


function omegaReqGet(template_url, parent_id, var_names="", getting_data=""){
    omegaRequest("GET", template_url, parent_id, var_names, getting_data);
}

function omegaReqPost(template_url, parent_id, var_names="", getting_data=""){
    omegaRequest("POST", template_url, parent_id, var_names, getting_data);
}