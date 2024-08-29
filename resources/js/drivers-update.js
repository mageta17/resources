document.getElementById("changeButton").addEventListener("click", function () {
  // Show the file input
  document.getElementById("fileInput").click();
});
document
  .getElementById("fileInput")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        // Show the preview
        document.getElementById("imagePreview").src = e.target.result;
        document.getElementById("imagePreview").style.display = "block";
        document.getElementById("previewArea").style.display = "block";
        document.getElementById("fileName").value = file.name;
        document.getElementById("actionButtons").style.display = "block";
      };
      reader.readAsDataURL(file);
    }
  });
document.getElementById("changeButton1").addEventListener("click", function () {
  // Show the file input
  document.getElementById("fileInput1").click();
});
document
  .getElementById("fileInput1")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        // Show the preview
        document.getElementById("imagePreview1").src = e.target.result;
        document.getElementById("imagePreview1").style.display = "block";
        document.getElementById("previewArea1").style.display = "block";
        document.getElementById("fileName1").value = file.name;
        document.getElementById("actionButtons1").style.display = "block";
      };
      reader.readAsDataURL(file);
    }
  });

document.getElementById("changeButton2").addEventListener("click", function () {
  // Show the file input
  document.getElementById("fileInput2").click();
});

document
  .getElementById("fileInput2")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        // Show the preview
        document.getElementById("imagePreview2").src = e.target.result;
        document.getElementById("imagePreview2").style.display = "block";
        document.getElementById("previewArea2").style.display = "block";
        document.getElementById("fileName2").value = file.name;
        document.getElementById("actionButtons2").style.display = "block";
      };
      reader.readAsDataURL(file);
    }
  });

document.getElementById("changeButton3").addEventListener("click", function () {
  // Show the file input
  document.getElementById("fileInput3").click();
});

document
  .getElementById("fileInput3")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        // Show the preview
        document.getElementById("imagePreview3").src = e.target.result;
        document.getElementById("imagePreview3").style.display = "block";
        document.getElementById("previewArea3").style.display = "block";
        document.getElementById("fileName3").value = file.name;
        document.getElementById("actionButtons3").style.display = "block";
      };
      reader.readAsDataURL(file);
    }
  });

//code for displaying the image preview
document.addEventListener("DOMContentLoaded", function () {
   var imageURL = document.getElementById('imageURL').value;
   var fileName = document.getElementById('fileName4').value;
 
  if (showpreview) {
    var fileNameInput = document.getElementById("fileName3");
    var imagePreview = document.getElementById("imagePreview3");
    var previewArea = document.getElementById("previewArea3");
    var previewButton = document.getElementById("previewButton3");
    var quitButton = document.getElementById("quitPreview3");
    var actionButtons = document.getElementById("actionButtons3");

    if (
      fileNameInput &&
      imagePreview &&
      previewArea &&
      previewButton &&
      quitButton &&
      actionButtons
    ) {
      fileNameInput.value = fileName;

      previewButton.addEventListener("click", function () {
        var imageUrl = imageURL;
        console.log("Preview button clicked, image URL:", imageUrl); // for console debbuging  message

        if (imageUrl) {
          imagePreview.src = imageUrl;
          imagePreview.style.display = "block";
          previewArea.style.display = "block";
          actionButtons.style.display = "block";
        } else {
          console.error("Image URL is not defined or incorrect.");
        }
      });

      quitButton.addEventListener("click", function () {
        // Hide preview area and reset image source
        imagePreview.src = "";
        imagePreview.style.display = "none";
        previewArea.style.display = "none";
        actionButtons.style.display = "none";
        console.log("the quit button is clicked ");
      });
    } else {
      console.error(
        "Elements not found: fileNameInput, imagePreview, previewArea, previewButton, or quitButton"
      );
    }
  }
});

document.addEventListener("DOMContentLoaded", function () {
    var imageURL = document.getElementById('imageURL2').value;
    var fileName = document.getElementById('fileName_2').value;
  
   if (showpreview) {
     var fileNameInput = document.getElementById("fileName2");
     var imagePreview = document.getElementById("imagePreview2");
     var previewArea = document.getElementById("previewArea2");
     var previewButton = document.getElementById("previewButton2");
     var quitButton = document.getElementById("quitPreview2");
     var actionButtons = document.getElementById("actionButtons2");
 
     if (
       fileNameInput &&
       imagePreview &&
       previewArea &&
       previewButton &&
       quitButton &&
       actionButtons
     ) {
       fileNameInput.value = fileName;
 
       previewButton.addEventListener("click", function () {
         var imageUrl = imageURL;
         console.log("Preview button clicked, image URL:", imageUrl); // for console debbuging  message
 
         if (imageUrl) {
           imagePreview.src = imageUrl;
           imagePreview.style.display = "block";
           previewArea.style.display = "block";
           actionButtons.style.display = "block";
         } else {
           console.error("Image URL is not defined or incorrect.");
         }
       });
 
       quitButton.addEventListener("click", function () {
         // Hide preview area and reset image source
         imagePreview.src = "";
         imagePreview.style.display = "none";
         previewArea.style.display = "none";
         actionButtons.style.display = "none";
         console.log("the quit button is clicked ");
       });
     } else {
       console.error(
         "Elements not found: fileNameInput, imagePreview, previewArea, previewButton, or quitButton"
       );
     }
   }
 });
 
 document.addEventListener("DOMContentLoaded", function () {
    var imageURL = document.getElementById('imageURL1').value;
    var fileName = document.getElementById('fileName_1').value;
  
   if (showpreview) {
     var fileNameInput = document.getElementById("fileName1");
     var imagePreview = document.getElementById("imagePreview1");
     var previewArea = document.getElementById("previewArea1");
     var previewButton = document.getElementById("previewButton1");
     var quitButton = document.getElementById("quitPreview1");
     var actionButtons = document.getElementById("actionButtons1");
 
     if (
       fileNameInput &&
       imagePreview &&
       previewArea &&
       previewButton &&
       quitButton &&
       actionButtons
     ) {
       fileNameInput.value = fileName;
 
       previewButton.addEventListener("click", function () {
         var imageUrl = imageURL;
         console.log("Preview button clicked, image URL:", imageUrl); // for console debbuging  message
 
         if (imageUrl) {
           imagePreview.src = imageUrl;
           imagePreview.style.display = "block";
           previewArea.style.display = "block";
           actionButtons.style.display = "block";
         } else {
           console.error("Image URL is not defined or incorrect.");
         }
       });
 
       quitButton.addEventListener("click", function () {
         // Hide preview area and reset image source
         imagePreview.src = "";
         imagePreview.style.display = "none";
         previewArea.style.display = "none";
         actionButtons.style.display = "none";
         console.log("the quit button is clicked ");
       });
     } else {
       console.error(
         "Elements not found: fileNameInput, imagePreview, previewArea, previewButton, or quitButton"
       );
     }
   }
 });

 document.addEventListener("DOMContentLoaded", function () {
    var imageURL = document.getElementById('imageURL_').value;
    var fileName = document.getElementById('fileName_').value;
  
   if (showpreview) {
     var fileNameInput = document.getElementById("fileName");
     var imagePreview = document.getElementById("imagePreview");
     var previewArea = document.getElementById("previewArea");
     var previewButton = document.getElementById("previewButton");
     var quitButton = document.getElementById("quitPreview");
     var actionButtons = document.getElementById("actionButtons");
 
     if (
       fileNameInput &&
       imagePreview &&
       previewArea &&
       previewButton &&
       quitButton &&
       actionButtons
     ) {
       fileNameInput.value = fileName;
 
       previewButton.addEventListener("click", function () {
         var imageUrl = imageURL;
         console.log("Preview button clicked, image URL:", imageUrl); // for console debbuging  message
 
         if (imageUrl) {
           imagePreview.src = imageUrl;
           imagePreview.style.display = "block";
           previewArea.style.display = "block";
           actionButtons.style.display = "block";
         } else {
           console.error("Image URL is not defined or incorrect.");
         }
       });
 
       quitButton.addEventListener("click", function () {
         // Hide preview area and reset image source
         imagePreview.src = "";
         imagePreview.style.display = "none";
         previewArea.style.display = "none";
         actionButtons.style.display = "none";
         console.log("the quit button is clicked ");
       });
     } else {
       console.error(
         "Elements not found: fileNameInput, imagePreview, previewArea, previewButton, or quitButton"
       );
     }
   }
 });
 

 
