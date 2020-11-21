<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <? 
    $link = mysqli_connect("127.0.0.1", "root", "root", "is41r2020");
    if(!$link){
        die("Eroare de conectare la baza de date");
    }
    if(isset($_POST) && !empty($_POST['name']) && !empty($_POST["age"])){
        $result = mysqli_query($link, 
            "INSERT INTO 
                students 
            SET 
                name = '{$_POST['name']}', 
                age = '{$_POST['age']}'"
        );
        if($result) {
            echo "Studentul a fost creat";
        } else {
            echo "Eroare";
        }
    }
    ?>
    <? include "menu.php"; ?>
    <form action="" method="POST">
        Name <input type="text" name="name"> <br>
        Age <input type="number" name="age"> <br>
        <input type="submit" value="create student">
    </form>
</body>
</html>