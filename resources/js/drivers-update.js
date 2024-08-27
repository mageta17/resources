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
