<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   
   $link = mysqli_connect("127.0.0.1", "root", "root", "is41r2020");
   if(!$link){
       die("Eroare de conectare la baza de date");
   }

   
   ?>
   <? include "menu.php"; ?>

   
   Lista de stdenti

   <br>
   <? 

    $result = mysqli_query($link, 
    "SELECT 
        id, name, age 
    FROM 
        students"
    );
   ?>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <? while($student = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><? echo $student['id'];?></td>
                <td><? echo $student['name'];?></td>
                <td><? echo $student['age'];?></td>
            </tr>
            <? }?>
        </tbody>
    </table>
</body>
</html>