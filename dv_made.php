<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .container{
            border-right: 40px solid white;
            float: left;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
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
        ?><form action="dv_reserve.php" method="post"><?php
        $person = [];
        $people = [];
        $complete_key = [];
        foreach ($data as $key => $value) {
            foreach ($value as $title => $content) {
                //echo $key." / ".$keys."/".$values."<br/>";
                for ($i = 0; $i < $length; $i++) {
                    if ($key == $i) {
                        if ($title == "people") {
                            $people[$i] = $content;

                        }
                        if ($title == "person") {
                            $person[$i] = $content;
                        }

                    }
                }
            }
        }
        /*
        for($i = 0; $i < $length; $i++)
        {
            echo $person[$i];
            echo " ";
        }echo "<br>\n";
        for($i = 0; $i < $length; $i++)
        {
            echo $people[$i];
            echo " ";
        }echo "<br>\n";*/

        $j = 0;
        for($i = 0; $i < $length; $i++)
        {
            if($person[$i] == $people[$i])
            {
                $complete_key[$j] = $i;
                $j++;
            }
        }
        $key_length = sizeof($complete_key);

    foreach ($data as $key => $value) {
        ?><div class = "container"><?php
        foreach ($value as $title => $content) {
            //echo $key." / ".$keys."/".$values."<br/>";
            for($i = 0; $i < $key_length; $i++)
            {
                if ($key == $complete_key[$i]) {
                    if ($title == "starting_point") {
                        ?>
                        ????????? : <?php
                        echo $content;
                        echo "<br>\n";
                    }
                    if ($title == "destination") {
                        ?>
                        ????????? : <?php
                        echo $content;
                        echo "<br>\n";
                    }
                    if ($title == "time") {
                        ?>
                        ?????? : <?php
                        echo $content;
                        echo "<br>\n";
                    }
                    if ($title == "people") {
                        ?>
                        ?????? : <?php
                        echo $content;
                        echo "<br>\n";
                    }
                    if ($title == "person") {
                        ?>
                        ?????? ????????? ?????? : <?php
                        echo $content;
                        echo "<br>\n";
                        ?><input type="radio" name = "key" value="<?php echo $key;?>"><?php
                    }
                }
            }
        }?></div><?php
    }
   ?>
        <input type="submit" value="????????????"
               style="float: left;
               clear: both;
               background-color: #ff7a00;
               color: white;
               border: none;
               margin-top:10%;
               margin-left:43%;
               width:150px;
               height: 30px;"></form><?php
    }
    else{
        echo "fail";
    }
    $pdo = null;
}
catch(Exception $e){
    echo $e->getMessage(); //?????? ??????
}
?>
</body>
</html>
