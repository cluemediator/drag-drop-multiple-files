<!DOCTYPE html>
<html>

<head>
  <title>Drag and drop Multiple file upload using Ajax JQuery PHP - Clue Mediator</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    h3 {
      line-height: 30px;
      text-align: center;
    }

    #drop_file_area {
      height: 200px;
      border: 2px dashed #ccc;
      line-height: 200px;
      text-align: center;
      font-size: 20px;
      background: #f9f9f9;
      margin-bottom: 15px;
    }

    .drag_over {
      color: #000;
      border-color: #000;
    }

    .thumbnail {
      width: 100px;
      height: 100px;
      padding: 2px;
      margin: 2px;
      border: 2px solid lightgray;
      border-radius: 3px;
      float: left;
    }

    #upload_file {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3>Drag and drop multiple file upload using jQuery, Ajax and PHP - <a href="https://www.cluemediator.com" target="_blank">Clue Mediator</a></h3><br />
    <div id="drop_file_area">
      Drag and Drop Files Here
    </div>
    <div id="uploaded_file"></div>
  </div>

<script>
  $(document).ready(function () {
    $("html").on("dragover", function (e) {
      e.preventDefault();
      e.stopPropagation();
    });

    $("html").on("drop", function (e) {
      e.preventDefault();
      e.stopPropagation();
    });

    $('#drop_file_area').on('dragover', function () {
      $(this).addClass('drag_over');
      return false;
    });

    $('#drop_file_area').on('dragleave', function () {
      $(this).removeClass('drag_over');
      return false;
    });

    $('#drop_file_area').on('drop', function (e) {
      e.preventDefault();
      $(this).removeClass('drag_over');
      var formData = new FormData();
      var files = e.originalEvent.dataTransfer.files;
      for (var i = 0; i < files.length; i++) {
        formData.append('file[]', files[i]);
      }
      uploadFormData(formData);
    });

    function uploadFormData(form_data) {
      $.ajax({
        url: "file_upload.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $('#uploaded_file').append(data);
        }
      });
    }
  });  
</script>
</body>

</html>