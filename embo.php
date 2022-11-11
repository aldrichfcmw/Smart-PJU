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