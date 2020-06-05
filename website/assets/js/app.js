var api_location = "http://localhost/Omega/backend/api.php";

document.addEventListener('DOMContentLoaded', function(event) {
    loadDocument("templates/index.html", "some_container_id", "demo_text_to_replace");
});

function loadDocument(template_url, parent_id, var_names) {
    document.querySelector("#"+parent_id).innerHTML = getViewTemplate(template_url).replace("[<"+var_names+">]", getDataForTemplate());
};

function getViewTemplate(template_url){
    return fetchSyncUrl(template_url);
};

function getDataForTemplate(){
    return fetchSyncUrl(api_location);
};

function fetchSyncUrl(url){
    var request = new XMLHttpRequest();
    request.open('GET', url, false);
    request.send(null);
    
    if (request.status === 200) {
        return request.responseText;
    }
};