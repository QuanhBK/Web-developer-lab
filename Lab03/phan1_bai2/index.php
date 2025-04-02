<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
      function message($x){
          if ($x <= 0 || !is_int($x)) {
              echo "Vui lòng nhập một số nguyên dương.\n";
              return;
          }
          switch($x % 5){
            case 0:
              echo "<div>Hello</div>";
              break;
            case 1:
              echo "<div>How are you?</div>";
              break;
            case 2:
              echo "<div>I'm doing well, thank you</div>";
              break;
            case 3:
              echo "<div>See you later</div>"; 
              break;
            case 4:
              echo "<div>Good-bye</div>"; 
              break;
          }
            
      }
      echo message(1);
      echo message(2);
      echo message(3);
      echo message(4);
      echo message(5);
  ?>
</body>
</html>