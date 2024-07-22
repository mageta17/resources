var btn = document.querySelectorAll('#admin-vehicles-table button');

Array.from(btn).forEach(function(btn){ 
    btn.addEventListener('click', function(e){
        if(e.target.id=="edit") {
            btn.parentNode.parentNode.nextElementSibling.style.display = "contents";  
            
            btn.parentNode.parentNode.nextElementSibling.querySelector('#cancel').addEventListener('click', function() {
                btn.parentNode.parentNode.nextElementSibling.style.display = "none";
            });
        } 
    });
});