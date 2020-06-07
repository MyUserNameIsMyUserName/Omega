# Omega

Small custom components system with ajax and demo api.

App Params  
  api_location = "http://localhost:8000/Omega/api.php"; <= API calls url  
  components_location = "web/components/"; <= your root components folder  

Functions:   
  omega(req_type, template_url, parent_id, var_names="", getting_data="")  
  #params  
  #req_type     => "get"/"post" will go to upper case so no worry  
  #template_url => "basic_template" will load index.html from basic_template folder from components location   
  #parent_id    => id of dom element into which response will be inserted  
  #var_names    => variables you want it to replace in template  
  #getting_data => get/post data     
  
  omega() aliases:  
    - omegaGet    => will call omega with req_type as "GET" omega("GET", template_url,....  
    - omegaPost   => will also call omega just with "POST" as req_type.  
