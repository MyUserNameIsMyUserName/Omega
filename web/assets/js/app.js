var api_location = "http://localhost:8000/Omega/api.php";

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "get",
        "web/templates/basic_template.html",
        "some_container_id",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "get",
        "web/templates/basic_template.html",
        "some_container_id2",
        "demo_text_to_replace"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "web/templates/basic_template.html",
        "some_posting_container",
        "demo_text_to_replace",
        "moduleName=access_tokens"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "web/templates/basic_template.html",
        "some_posting_container2",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "web/templates/basic_template.html",
        "some_posting_container22",
        "demo_text_to_replace",
        "moduleName=ZZZZZZZ"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "web/templates/demo_template.html",
        "some_posting_container222",
        "demo_text_to_replace"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "",
        "web/templates/demo_template.html",
        "some_posting_container222",
        "demo_text_to_replace"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omegaGet(
        "web/templates/aliases_template.html",
        "some_container_id2Ali",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omegaPost(
        "web/templates/aliases_template.html",
        "some_posting_containerAli",
        "demo_text_to_replace",
        "moduleName=access_tokens"
        );
});