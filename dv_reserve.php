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
            border-color: #ff7a00;
            width: 400px;
            height: 320px;
            text-align: center;
            padding-top: 40px;
            padding-bottom: 100px;
        }
        #master2{
            border-style: solid;
            border-width: 1pt;
            border-color: #ff7a00;
            text-align: center;
            margin-left: 14%;
            width: 280px;
            height: 170px;
            padding-top:20px;
            padding-bottom: 20px;
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
                    'person'=>$row['person'],
                    'name'=>$row['name'],
                    'phone'=>$row['phone'],
                    'birth'=>$row['birth']
                ));
        }

        $length = sizeof($data);
        //echo $length;?>

<div class="master">
    <div id = "master">
        <img src="checked.png" style="width: 60px;"><br><br>
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
            ????????? : <?php
            echo $content;
            echo "<br>\n";
            }
            if($title == "destination")
            {?>
            ????????? : <?php
            echo $content;
            echo "<br>\n";
            }
            if($title == "time")
            {?>
            ?????? : <?php
            echo $content;
            echo "<br>\n";
            }
            if($title == "people")
            {?>
            ?????? : <?php
            $people = $content;
            echo $people;
            echo "<br>\n";
            }
            if($title == "person")
            {?>
            ?????? ????????? ?????? : <?php
            echo $content;
            echo "<br>\n";
            }
            if($title == "name")
            {
            ?>
            ????????? ?????? : <?php echo $content;
            echo "<br>\n";
            }
            if($title == "phone"){
            ?>
            ????????? ???????????? : <?php echo $content;
                        echo "<br>\n";
                    }
            if($title == "birth"){
                ?>????????? ???????????? : 990430 <br><?php
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
    echo $e->getMessage(); //?????? ??????
}
?></div><br>
        ????????? ?????????????????????.<br>
        ?????? ????????? ???????????? <br>???????????? ????????? ??????????????? ??????????????????.<br>
        ??????????????? ?????? ???????????? ???????????????.<br>
    </div><br></div>

<button style ="background-color: darkorange; color: white; border: none; width: 150px; height:35px; margin-top: 15px" onclick="window.location.href = '../mr/inputPay.html'">?????? ?????? ??????</button>
   </body>
</html>