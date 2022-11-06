<?php
$data='7H5tFdSRamOUp6TF9NGO';
include 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Using jQuery html() Method</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
  <div class="row text-center">
    <div class="col-12">
      <form method="post" id="toggleForm">
        <fieldset>
          <legend>on/off status for machine 1</legend>
          <div class="form-group">
            <div class="custom-control custom-switch">
              <button type="button" class="btn-md rounded btn-primary" id="customSwitch2">aaa</button>
              <label class="" id="sensiText" for="customSwitch2"></label>
              <button type="button" class="btn-md rounded btn-primary" id="customSwitch3">bbb</button>
            </div>
          </div>
        </fieldset>
      </form> 
    </div>
  </div>
</div>
</body>
<script>
    // $("#customSwitch1").on("click", function () {
    //     var status_str = "On (1)";
    //     document.getElementById("statusText").innerText = status_str; 
    // });
    function putSensitivitas() {
        $.ajax({
            type: "GET",
            url: "api.php",
            data: {
                sensi_select: true,
                api:'<?= $data;?>',
            },
            success: function (result) {
                alert(result);
                sensiText(result);
            }
        });
    }

    function sensiText(sensi_val) {
        var sensi_str = sensi_val;
        document.getElementById("sensiText").innerText = sensi_str;
    }

    function onToggle() {
        $("#customSwitch2").click(function(e) {
            var sensi = document.getElementById("sensiText").innerText;
            sensi = sensi-1;
            alert(sensi);
            sensiText(sensi);
            updateSensi(sensi);
        });
        $("#customSwitch3").click(function(e) {
            var sensi = document.getElementById("sensiText").innerText;
            sensi = sensi-1;
            alert(sensi);
            sensiText(sensi);
            updateSensi(sensi);
        });
    }

    function updateSensi(sensi_val) {
        $.ajax({
            type: "POST",
            url: "api.php",
            data: {
                sensi_update: true, 
                sensi: sensi_val,
                api:'<?= $data;?>'
            },
            success: function (result) {
                console.log(result);
            }
        });
    }

    $(document).ready(function () {
        //Called on page load:
        putSensitivitas();
        onToggle();
        sensiText();
    });
</script>
</html>