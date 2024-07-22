const elements = ['seat', 'fire', 'tri', 'first', 'wheel', 'jack', 'ins', 'tyre', 'nuts', 'press','spare','damage','brakeLights','park','headLight','indicatorLights','hazardLights','horn','engineCondition','gearBox','windScreen','wipers','sideMirrors','rearMirror','terminals','loadBin','bodyCondition','exhaustSystem','vBelts','radiatorCondition','differentials','airLeaks','hydraulicCylinder','oilLeaks'];

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

var checklistForm = document.getElementById("checklistForm");
const progressBarFill = document.querySelector("#progressBar > .progress-bar-fill");
const progressBarText = progressBarFill.querySelector('.progress-bar-text');

checklistForm.addEventListener("submit", uploadFile);

function uploadFile(e) {
  e.preventDefault();

  const xhr = new XMLHttpRequest();

  xhr.onload = function() {
      console.log('Response from server:', xhr.responseText);
      
      try {
          var responseObject = JSON.parse(xhr.responseText);

          if (responseObject.success) {
            alert(responseObject.messages.join('\n'));
          } else {
              console.error('Error:', responseObject.error);
              alert('An error occurred: ' + responseObject.error);
          }
      } catch (e) {
          console.error('Could not parse JSON! Error:', e);
      }      
  }

  xhr.open("POST", "server/checklist.inc.php");

  xhr.upload.addEventListener("progress", e => {
  const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;

  progressBarFill.style.width = percent.toFixed(2) + "%";
  progressBarText.textContent = percent.toFixed(2) + "%";
  });

  xhr.setRequestHeader("undefined", "multipart/form-data");
  xhr.send(new FormData(checklistForm));
}