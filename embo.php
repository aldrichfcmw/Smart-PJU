<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  
</body>
<table class="display" style="width:100%;" border="1">
                      <tr>
                        <th><i class="icofont icofont-light-bulb" style="font-size: 2.5em;"></i></th>
                        <th><h5 class="mt-2">Lampu</h5></th>
                        <th colspan="3">
                          <form method="post" id="toggleForm">
                            <label class="switch mt-2">
                              <input id="customSwitch1" type="checkbox" data-bs-original-title="" title=""><span  class="switch-state"></span>
                            </label>
                          </form>
                        </th>
                      </tr>
                      <tr>
                        <th><i class="icofont icofont-sun" style="font-size: 2.5em;"></i></th>
                        <th><h5 class="mt-2">Sensitivitas</h5></th>
                        <th>
                          <button class="btn-md rounded btn-primary" id="customSwitch2"><i class="icofont icofont-minus-circle" style="font-size: 1.2em;"></i></button>  
                        </th>
                        <th>
                          <label class="ml-3" id="sensiText" for="customSwitch2"></label>
                        </th>
                        <th>
                          <button class="btn-md rounded btn-primary" id="customSwitch3"><i class="icofont icofont-plus-circle" style="font-size: 1.2em;"></i></button>
                        </th>
                      </tr>
                    </table>
<script>
  $(document).ready(function () {
    $.ajax({
          type: "POST",
          url: "api.php",
          data: {
            permarker:true,
            api: "7H5tFdSRamOUp6TF9NGO",
          },
          success: function (result) {
            json = JSON.parse(result);
            console.log(result);
            console.log(json.id);
          },
      });
      $.ajax({
          type: "POST",
          url: "api.php",
          data: {
            marker:true,
            api: "7H5tFdSRamOUp6TF9NGO",
          },
          success: function (result) {
            json = JSON.parse(result);
            console.log(result);
            console.log(json[0].id);
            ShareInfoLength = json.length;
            alert(ShareInfoLength);
          },
      });
  });
</script>
</html>