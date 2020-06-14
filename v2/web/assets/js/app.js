var api_location = "http://localhost:8080/Omega/api.php";
var components_location = "web/components/";

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "get",
        "basic_template",
        "some_container_id",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "get",
        "basic_template",
        "some_container_id2",
        "demo_text_to_replace"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "basic_template",
        "some_posting_container",
        "demo_text_to_replace",
        "moduleName=access_tokens"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "basic_template",
        "some_posting_container2",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "basic_template",
        "some_posting_container22",
        "demo_text_to_replace",
        "moduleName=ZZZZZZZ"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "post",
        "demo_template",
        "some_posting_container222",
        "demo_text_to_replace"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omega(
        "",
        "demo_template",
        "some_posting_container222",
        "demo_text_to_replace"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omegaGet(
        "aliases_template",
        "some_container_id2Ali",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    omegaPost(
        "aliases_template",
        "some_posting_containerAli",
        "demo_text_to_replace",
        "moduleName=access_tokens"
        );
});