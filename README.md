# Omega

Small custom components system with ajax and demo api.

App Params  
  api_location = "http://localhost:8000/Omega/api.php"; <= API calls url  
  components_location = "web/components/"; <= your root components folder  

Functions:   
  - omega(req_type, template_url, parent_id, var_names="", getting_data="")  <= basically ajax with little more
    #params  
    #req_type     => "get"/"post" will go to upper case so no worry  
    #template_url => "basic_template" will load index.html from basic_template folder from components location   
    #parent_id    => id of dom element into which response will be inserted  
    #var_names    => variables you want it to replace in template  
    #getting_data => get/post data     

  ** omega() aliases:  
    - omegaGet    => will call omega with req_type as "GET" omega("GET", template_url,....  
    - omegaPost   => will also call omega just with "POST" as req_type.  

  - omegaFetchUrl(req_type, url, data = "")  <= the function that does all the magic
    #req_type   => "get"/"post"  
    #url      => to template or api location
    #data     => if there is something to get or send
