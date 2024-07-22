const elements = ['fullBodyHarnessCheck', 'shockAbsorberCheck01', 'shockAbsorberCheck02', 'rescueKitCheck', 'riggingRopeCheck', 'pulleyCheck', 'overallCheck01', 'overallCheck02', 'overallCheck03', 'overallCheck04','overallCheck05','safetyBootCheck01','safetyBootCheck02','safetyBootCheck03','safetyBootCheck04','safetyHelmentCheck01','safetyHelmentCheck02','safetyHelmentCheck03','safetyHelmentCheck04', 'reflectiveVestCheck01', 'reflectiveVestCheck02', 'reflectiveVestCheck03', 'reflectiveVestCheck04', 'gloves'];

elements.forEach(element => {
  let okBtn = document.querySelector(`.${element}Ok`);
  let notBtn = document.querySelector(`.${element}Not`);
  let naBtn = document.querySelector(`.${element}Na`);
  let desc = document.querySelector(`.${element}Desc`);

  notBtn.addEventListener('click', function(){
    desc.style.display = 'block';
  });

  okBtn.addEventListener('click', function(){
    desc.style.display = 'none';
    desc.value = '';
  });

  naBtn.addEventListener('click', function(){
    desc.style.display = 'none';
    desc.value = '';
  });
});