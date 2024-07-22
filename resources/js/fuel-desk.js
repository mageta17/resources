var btn = document.querySelectorAll('#admin-users-table button');

Array.from(btn).forEach(function(btn){ 
    btn.addEventListener('click', function(e){
        if(e.target.id=="edit") {
            btn.parentNode.parentNode.nextElementSibling.style.display = "contents";
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.style.display = "none"; 
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "none";  
            
            btn.parentNode.parentNode.nextElementSibling.querySelector('#cancel').addEventListener('click', function() {
                btn.parentNode.parentNode.nextElementSibling.style.display = "none";
            });
        }                     

        else if (e.target.id=="more_button") {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.style.display = "contents"; 
            btn.parentNode.parentNode.nextElementSibling.style.display = "none";
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "none";
        }                    

        else if (e.target.id=="issue_button") {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "contents"; 
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.style.display = "none";
            btn.parentNode.parentNode.nextElementSibling.style.display = "none";
        }                    

        btn.parentNode.parentNode.nextElementSibling.nextElementSibling.querySelector('#cancel_more_details').addEventListener('click', function() {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.style.display = "none";
        });

        btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.querySelector('#cancel_fuel_issue_tt').addEventListener('click', function() {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "none";
        });
    });
});

Array.from(btn).forEach(function(btn){ 
    btn.addEventListener('click', function(e){
        if(e.target.id=="reject") {
            btn.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "contents";                      
        }  

        btn.nextElementSibling.nextElementSibling.nextElementSibling.querySelector('#cancel_reject').addEventListener('click', function() {
            btn.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "none";                        
        });
    });
});  