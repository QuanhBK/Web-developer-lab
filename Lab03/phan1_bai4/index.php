<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phần 1 - Bài 4</title>
  <link rel="stylesheet" href= "style.css">
</head>
<body>
<table>
<?php
     
     for ($i = 1; $i <= 7; $i++) {
         echo "<tr>";

         for ($j = 1; $j <= 7; $j++) {
             $value = $i * $j;
             echo "<td> $value </td>";
         }

         echo "</tr>";
     } 
 
  ?>
</table>
  
</body>
</html>
