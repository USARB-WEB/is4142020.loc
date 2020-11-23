<? 
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php

    if($_GET['action'] === "logout") {
        $_SESSION['user_logged'] = false;
    }

    if($_POST['username'] === "admin" && $_POST['password'] === "1234"){
        $_SESSION['user_logged'] = true;
    }

   if(!$_SESSION['user_logged']){?>
    <div style="text-align:center">
    <form action="" method="post">
        Username <input type="text" name="username"> <br>
        Password <input type="password" name="password"> <br>
        <input type="submit" value="Login">
    </form>
    </div>
   <?} else {
   
   $link = mysqli_connect("127.0.0.1", "root", "root", "is41r2020");
   if(!$link){
       die("Eroare de conectare la baza de date");
   }

   
   ?>
   <? include "menu.php"; ?>
   
   Lista de stdenti

   <br>
   <? 
   if($_GET['action'] === "delete" && $_GET['id']){
        if(mysqli_query($link, "DELETE FROM students WHERE id = {$_GET['id']}")) {
            echo "Student was deleted";
        } else {
            echo "Delete error";
        }
    }

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
                <th></th>
            </tr>
        </thead>
        <tbody>
            <? while($student = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><? echo $student['id'];?></td>
                <td><? echo $student['name'];?></td>
                <td><? echo $student['age'];?></td>
                <td>
                    <a href="update.php?id=<? echo $student['id'];?>">M</a>

                    <a 
                        href="index.php?action=delete&id=<? echo $student['id'];?>" 
                        onclick="return confirm('Doriti sa stergeti?')"
                    >X</a>
                </td>
            </tr>
            <? }?>
        </tbody>
    </table>
    <?}?>
</body>
</html>