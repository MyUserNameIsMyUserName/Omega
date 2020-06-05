var api_location = "http://localhost:8080/Omega/api.php";

document.addEventListener('DOMContentLoaded', function(event) {
    loadDocument(
        "web/templates/index.html",
        "some_container_id",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    loadDocument(
        "web/templates/index.html",
        "some_container_id2",
        "demo_text_to_replace"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    postToDocument(
        "web/templates/index.html",
        "some_posting_container",
        "demo_text_to_replace",
        "moduleName=users"
        );
});

document.addEventListener('DOMContentLoaded', function(event) {
    postToDocument(
        "web/templates/index.html",
        "some_posting_container2",
        "demo_text_to_replace"
        );
});
