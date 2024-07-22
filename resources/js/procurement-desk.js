          
var btn = document.querySelectorAll('#workshop-spare-request-list-table button');

Array.from(btn).forEach(function(btn){ 
    btn.addEventListener('click', function(e){
        if(e.target.id=="approve_btn") {
            btn.parentNode.parentNode.nextElementSibling.style.display = "contents";
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.style.display = "none";
        } else if(e.target.id=="disapprove_btn") {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.style.display = "contents";
            btn.parentNode.parentNode.nextElementSibling.style.display = "none";
        } else if(e.target.id=="purchased_btn") {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "contents";
            btn.parentNode.parentNode.nextElementSibling.style.display = "none";
        };

        btn.parentNode.parentNode.nextElementSibling.querySelector('#cancel').addEventListener('click', function() {
            btn.parentNode.parentNode.nextElementSibling.style.display = "none";
        });

        btn.parentNode.parentNode.nextElementSibling.nextElementSibling.querySelector('#cancel').addEventListener('click', function() {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.style.display = "none";
        });

        btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.querySelector('#cancel').addEventListener('click', function() {
            btn.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.style.display = "none";
        });
    });
}); 