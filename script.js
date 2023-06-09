function showImage(image) {
    var modal = document.getElementById("image-modal");
    var modalImage = document.getElementById("modal-image");
  
    modalImage.src = image.src;
    modal.style.display = "block";
  }
  
  function closeImage() {
    var modal = document.getElementById("image-modal");
    modal.style.display = "none";
  }
  