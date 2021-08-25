<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
session_start();
$session_id = $_SESSION['userid'];

$starting_point = $_POST['starting_point'];
$destination = $_POST['destination'];
$time = $_POST['time'];
$people = $_POST['people'];

echo $starting_point;
echo $destination;
echo $time;
echo $people;

$user_name = $_POST['username'];
$user_phone = $_POST['userphone'];


echo $user_name;
echo $user_phone;

try {
    $pdo = new PDO("mysql:" . "host=localhost;" . "dbname=bulletaxi", 'bulletaxi', 'bulletaxi123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($pdo)
    {
        $sql = $pdo->prepare("INSERT INTO reservation (starting_point, destination, time, people, name, phone) VALUES (:starting_point, :destination, :time, :people, :name, :phone)");
        $sql->bindParam(':starting_point', $starting_point);
        $sql->bindParam(':destination', $destination);
        $sql->bindParam(':time', $time);
        $sql->bindParam(':people', $people);
        $sql->bindParam(':name', $user_name);
        $sql->bindParam(':phone', $user_phone);
        $result = $sql->execute();
    }
    else{
        echo "fail";
    }
    $pdo = null;
}
catch(Exception $e){
    echo $e->getMessage(); //에러 출력
}
?>
<script>
    alert("추가되었습니다.");
    document.location.href = "../sh/select.php";
</script>
</body>
</html>
