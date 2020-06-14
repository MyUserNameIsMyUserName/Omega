var omegaConfig = {
    "api_location" : "http://localhost:8080/Omega/api.php",
    "components_location" : "web/components/"
}

var omegaRequestInfo = {
    "req_type"          :   "post",
    "template_name"     :   "multiple_variable_test",
    "parent_element_id" :   "performance_meter_container_id",
    "var_names"         :   ["demo_text_to_replace", "second_variable", "yeaaa_variable"],
    "req_data"          :   {
                                "moduleName"    :    "users",
                                "functionName"  :    "getUserInfo",
                                "user_id"       :    "11"   
                            }   
};
myRequest = new omegaRequestClass(omegaRequestInfo);

myRequest.omega();



   /*
omegaRequest(
    "post",
    "basic_template",
    "some_posting_container",
    "demo_text_to_replace",
    "moduleName=access_tokens"
    );
     
omegaReqGet(
    "basic_template",
    "some_posting_container2",
    "demo_text_to_replace",
    "moduleName=access_tokens"
    );

omegaReqGet(
    "basic_template",
    "some_posting_container22",
    "demo_text_to_replace",
    "moduleName=access_tokens"
    );*/