<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .container{
            border-left: 20px solid white;
            border-right: 30px solid white;
            float: left;
            text-align: center;


        }
        .button{
            float: left;
            background-color: #ff7a00;
            color: white;
            border: 3px solid white;
            margin-top:10%;
            margin-left:40%;
            width:150px;
            height: 30px;
        }
        body{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
session_start();

$session_id = $_SESSION['userid'];
//echo $session_id;
$starting_point = $_POST['start2'];
$destination = $_POST['destination'];
//echo $starting_point;
//echo $destination;
$user_name="";
$user_phone="";
try {
    $pdo = new PDO("mysql:" . "host=localhost;" . "dbname=bulletaxi", 'bulletaxi', 'bulletaxi123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($pdo) {
        $user = $pdo->prepare("SELECT name, phnum FROM guest WHERE id =:id");
        $user->bindParam(':id', $session_id);
        $user->execute();
        $user->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $user->fetch()){
            $user_name = $row['name'];
            $user_phone = $row['phnum'];
        }
        //echo $user_name;
        //echo $user_phone;

        $test = $pdo->prepare("SELECT * FROM reservation");
        $test->execute();
        $test->setFetchMode(PDO::FETCH_ASSOC);


        $data = array();

        while ($row = $test->fetch(PDO::FETCH_ASSOC)) {
            array_push($data,
                array('starting_point' => $row['starting_point'],
                    'destination' => $row['destination'],
                    'time' => $row['time'],
                    'people' => $row['people'],
                    'person' => $row['person']
                ));
        }

        $length = sizeof($data);
        //echo $length;
        ?>
        <form action="cs_reserve.php" method="post"><?php
        $j = 0;
        $k = 0;
        foreach ($data as $key => $value) {
            foreach ($value as $title => $content) {
                //echo $key." / ".$keys."/".$values."<br/>";
                for ($i = 0; $i < $length; $i++) {
                    if ($key == $i) {
                        if ($title == "starting_point") {
                            $array[$j][0] = $content;
                            $j++;
                        }
                        if ($title == "destination") {
                            $array[$k][1] = $content;
                            $k++;
                        }
                    }
                }
            }
        }
        $L = 0;
        for ($i = 0; $i < sizeof($array); $i++) {
            if ($array[$i][0] == $starting_point) {
                if ($array[$i][1] == $destination) {
                    $complete[$L] = $i;
                    $L++;
                }
            }
        }

    $key_length = sizeof($complete);

        foreach ($data as $key => $value) {
            ?><div class="container"><?php
            foreach ($value as $title => $content) {
                //echo $key." / ".$keys."/".$values."<br/>";
                for ($i = 0; $i < $key_length; $i++) {
                    if ($key == $complete[$i]) {
                        if ($title == "starting_point") {
                            ?>
                            출발지 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if ($title == "destination") {
                            ?>
                            도착지 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if ($title == "time") {
                            ?>
                            시간 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if ($title == "people") {
                            ?>
                            인원 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if ($title == "person") {
                            ?>
                            현재 예약한 인원 : <?php
                            echo $content;
                            echo "<br>\n";
                            ?><input type="radio" name="key" value="<?php echo $key;?>"><?php
                        }
                    }

                }
            }?></div><?php
        }
        ?><input type="submit" value="예약하기" style="clear: both;" class="button"></form>
        <form action="../sh/plusButton.php" method="post">
            <input type = "hidden" value = "<?= $starting_point;?>" name = "starting_point">
            <input type = "hidden" value = "<?= $destination;?>" name = "destination">
            <input type="hidden" value = "<?= $user_name;?>" name = "username">
            <input type = "hidden" value = "<?= $user_phone;?>" name = "userphone">
            <input type = submit value = "추가하기" class="button" style="margin-left: 0;">
        </form><?php
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
