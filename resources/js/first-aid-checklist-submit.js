const elements = ['woundcleaner', 'swabs', 'wool', 'sterile', 'forceps', 'scissors', 'pins', 'triangular', 'roller1', 'roller2','elastic','allergenic','strips','dressings'];

elements.forEach(element => {
  let okBtn = document.querySelector(`.${element}Ok`);
  let notBtn = document.querySelector(`.${element}Not`);
  let desc = document.querySelector(`.${element}Desc`);

  notBtn.addEventListener('click', function(){
    desc.style.display = 'block';
  });

  okBtn.addEventListener('click', function(){
    desc.style.display = 'none';
    desc.value = '';
  });
});