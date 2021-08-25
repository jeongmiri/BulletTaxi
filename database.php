<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
$test1 = "한국말";
$test2 = "test2";
try {
    $pdo = new PDO("mysql:" . "host=localhost;" . "dbname=bulletaxi", 'bulletaxi', 'bulletaxi123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($pdo)
    {
        $sql = $pdo->prepare("INSERT INTO test (test1, test2) VALUES (:test1, :test2)");
        $sql->bindParam(':test1', $test1);
        $sql->bindParam(':test2', $test2);
        $result = $sql->execute();

        $test = $pdo->prepare("SELECT * FROM test");
        $test->execute();
        $test->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $test->fetch()){
            echo $row['test1'].'&nbsp';
            echo $row['test2'].'<br/>';
        }
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
</body>
</html>
