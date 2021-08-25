<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body{
            text-align: center;
            margin-top: 60px;
        }
        div{
            text-align: center;
            margin : auto;
        }
        .master{
            width: 100%;
            overflow:hidden;
        }
        #master{
            border-style: double;
            border-width: 5px;
            border-color: orange;
            width: 400px;
            height: 280px;
            text-align: center;
            padding-top: 40px;
            padding-bottom: 100px;
        }
        #master2{
            border-style: solid;
            border-width: 1pt;
            border-color: orange;
            text-align: center;
            margin-left: 14%;
            width: 280px;
            height: 170px;
            padding-top:20px;
        }
        #tomain{
            padding-left: 10px;
            padding-right:10px;
            border-style: none;
            height: 27px;
            width: 60px;
            background-color: orange;
            color: black;
        }
    </style>
</head>
<body>
<?php
$receive_key = $_POST['key'];
$people = 0;
try {
$pdo = new PDO("mysql:" . "host=localhost;" . "dbname=bulletaxi", 'bulletaxi', 'bulletaxi123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($pdo)
{
$test = $pdo->prepare("SELECT * FROM reservation");
$test->execute();
$test->setFetchMode(PDO::FETCH_ASSOC);

$data = array();

while($row = $test->fetch(PDO::FETCH_ASSOC)){
    array_push($data,
        array('starting_point'=>$row['starting_point'],
            'destination'=>$row['destination'],
            'time'=>$row['time'],
            'people'=>$row['people'],
            'person'=>$row['person']
        ));
}

$length = sizeof($data);
//echo $length;
?>

<div class="master">
    <div id = "master">
        <img src="check.png" style="width: 60px;"><br><br>
        <div name="show_reservation" id = "master2">
            <?php
            foreach ($data as $key => $value)
            {
                foreach ($value as $title => $content){
                    //echo $key." / ".$keys."/".$values."<br/>";

                    if($key == $receive_key)
                    {
                        if($title == "starting_point")
                        {?>
                            출발지 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if($title == "destination")
                        {?>
                            도착지 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if($title == "time")
                        {?>
                            시간 : <?php
                            echo $content;
                            echo "<br>\n";
                        }
                        if($title == "people")
                        {?>
                            인원 : <?php
                            $people = $content;
                            echo $people;
                            echo "<br>\n";
                        }
                        if($title == "person")
                        {?>
                            현재 예약한 인원 : <?php
                            if($content < $people)
                            {
                                $person = $pdo->prepare("UPDATE reservation SET person = person + 1 WHERE index_number = $receive_key");
                                $person->execute();
                                $out = $pdo->prepare("SELECT person, people FROM reservation WHERE index_number = $receive_key");
                                $out->execute();
                                $result = $out->fetch(PDO::FETCH_ASSOC);
                                echo $result['person'];
                                echo "<br>\n";

                            }
                            else{
                                echo "<script>alert(\"예약할 수 없습니다.\"); his</script>";
                            }

                        }
                    }
                }
            }}
            else{
                echo "fail";
            }
            $pdo = null;
            }
            catch(Exception $e){
                echo $e->getMessage(); //에러 출력
            }
            ?></div><br>
        예약이 완료되었습니다.
    </div><br></div>
</body>
</html>