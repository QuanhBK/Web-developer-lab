<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phần 1 - Bài 3 - Dùng while</title>
</head>
<body>
<?php
    $x = 0;
    while($x < 101){
      if ($x % 2 != 0){
        echo "<div>$x</div>";
      }
      $x += 1;
    }
  ?>
</body>
</html>