<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phần 1 - Bài 3 - Dùng for</title>
</head>
<body>
  <?php
    for ($x = 0; $x < 101; $x++){
      if ($x % 2 != 0){
        echo "<div>$x</div>";
      }
    }
  ?>
</body>
</html>