<?php session_start();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .divListGroup{
            width: 100%;
            text-align: center;
            overflow:hidden;
        }
        .start1 {
            width: 100px;
            text-align: center;

            border-right-style: solid;
            border-right-color: orange;
            border-right-width: 1px;
            border-left-style: solid;
            border-left-color: orange;
            border-left-width: 1px;
            height: 400px;

            display: inline-block;
            vertical-align: middle;
        }
        .start2{
            width: 151px;
            text-align: center;

            border-right-style: double;
            border-right-color: orange;
            border-right-width: 1px;
            height: 400px;
            margin-left: -5.5px;
            display: inline-block;
            vertical-align: middle;
        }
        .destination{
            width: 100px;
            text-align: center;

            border-right-style: solid;
            border-right-color: orange;
            border-right-width: 1px;
            height: 400px;
            margin-left: -5.5px;
            display: inline-block;
            vertical-align: middle;
        }
        .button1{
            width: 100px;
            text-align: center;
            border-width:0px;
            background-color: white;
            color:orange;
            border-bottom-color: orange;
            border-bottom-style: solid;
            border-bottom-width: 0.5px;
        }
        .button1:hover, .button2:hover, .button3:hover{
            border-style:none;
            background-color: orange;
            color: white;
            border-bottom-color: orange;
            border-bottom-style: solid;
            border-bottom-width: 0.5px;
        }
        .button2{
            width: 150px;
            text-align: center;
            border-width:0px;
            background-color: white;
            color:orange;
            display:none;
            border-bottom-color: orange;
            border-bottom-style: solid;
            border-bottom-width: 0.5px;
        }
        .button3{
            width: 100px;
            text-align: center;
            border-style:none;
            background-color: white;
            color:orange;
            display:none;
            border-bottom-color: orange;
            border-bottom-style: solid;
            border-bottom-width: 0.5px;
        }
        input[type=submit] {
            background: white;
            width: 100px;
            border-style: solid;
            border-color: orange;
            border-radius: 10px;
            height: 40px;
            width: 50px;
            margin-left: 20px;
        }
        input[type=submit]:hover {
            background-color: orange;
            color: white;
        }
    </style>
</head>
<body style="margin-top: 60px">
<form action="../jh/cs_made.php" method="post">
    <div class="divListGroup">
        <!--======= 전주/익산/군산 선택 =======-->
        <div class="start1">
            <p style="background-color: orange; color:white; margin:0px;">출발지</p>
            <input type="button"
                   class="button1"
                   name="Jeonju"
                   id="Jeonju1"
                   onclick="jj()"
                   value="전주"/>
            <input type="button"
                   class="button1"
                   name="Iksan"
                   id="Iksan1"
                   onclick="is()"
                   value="익산"/>
            <input type="button"
                   class="button1"
                   name="Gunsan"
                   id="Gunsan1"
                   onclick="gs()"
                   value="군산"/>
            <input type="hidden"
                   name="start1"
                   id="bt1"
                   value=""/>
        </div>
        <!--======= 전주/익산/군산 선택 후 =======-->
        <div class="start2">
            <p style="background-color: orange; color:white; margin:0px;">선택</p>
            <!--=======전주=======-->
            <input type="button"
                   class="button2"
                   name="Jgo"
                   id="Jgo"
                   onclick="Jchoose(this)"
                   value="전주 고속버스터미널"/>
            <input type="button"
                   class="button2"
                   name="Jsi"
                   id="Jsi"
                   onclick="Jchoose(this)"
                   value="전주 시외버스터미널"/>
            <input type="button"
                   class="button2"
                   name="Jgj"
                   id="Jgj"
                   onclick="Jchoose(this)"
                   value="덕진광장"/>
            <input type="button"
                   class="button2"
                   name="Jhn"
                   id="Jhn"
                   onclick="Jchoose(this)"
                   value="호남제일문"/>
            <input type="button"
                   class="button2"
                   name="Jtr"
                   id="Jtr"
                   onclick="Jchoose(this)"
                   value="전주역"/>
            <!--=======익산=======-->
            <input type="button"
                   class="button2"
                   name="Ibus"
                   id="Ibus"
                   onclick="Ichoose(this)"
                   value="익산 공용 터미널"/>
            <input type="button"
                   class="button2"
                   name="Il"
                   id="Il"
                   onclick="Ichoose(this)"
                   value="롯데마트 익산점"/>
            <input type="button"
                   class="button2"
                   name="Iwon"
                   id="Iwon"
                   onclick="Ichoose(this)"
                   value="원광대학교 병원"/>
            <input type="button"
                   class="button2"
                   name="Itr"
                   id="Itr"
                   onclick="Ichoose(this)"
                   value="익산역"/>
            <!--=======군산=======-->
            <input type="button"
                   class="button2"
                   name="Gtr"
                   id="Gtr"
                   onclick="Gchoose(this)"
                   value="군산역"/>
            <input type="button"
                   class="button2"
                   name="Gbus"
                   id="Gbus"
                   onclick="Gchoose(this)"
                   value="군산 공용 터미널"/>
            <input type="button"
                   class="button2"
                   name="Gl"
                   id="Gl"
                   onclick="Gchoose(this)"
                   value="롯데마트 군산점"/>
            <input type="button"
                   class="button2"
                   name="Gch"
                   id="Gch"
                   onclick="Gchoose(this)"
                   value="군산시청"/>
            <input type="hidden"
                   name="start2"
                   id="bt2"
                   value=""/>
        </div>
        <div class="destination">
            <p style="background-color: orange; color:white; margin:0px;">도착지 선택</p>
            <input type="button"
                   class="button3"
                   name="Jeonju"
                   id="jeonju"
                   onclick="destin(this)"
                   value="전주"/>
            <input type="button"
                   class="button3"
                   name="Iksan"
                   id="iksan"
                   onclick="destin(this)"
                   value="익산"/>
            <input type="button"
                   class="button3"
                   name="Gunsan"
                   id="gunsan"
                   onclick="destin(this)"
                   value="군산"/>
            <input type="hidden"
                   name="destination"
                   id="bt3"
                   value=""/>
        </div>
        <input type="submit" value="Send"/>
    </div>
</form>
<script>
    function jj(){
        document.getElementById("Jeonju1").style.backgroundColor="#FFA500";
        document.getElementById("Jeonju1").style.color="#ffffff";
        document.getElementById("Iksan1").style.backgroundColor="#ffffff";
        document.getElementById("Iksan1").style.color="#FFA500";
        document.getElementById("Gunsan1").style.backgroundColor="#ffffff";
        document.getElementById("Gunsan1").style.color="#FFA500";

        document.getElementById("Jgo").style.display='block';
        document.getElementById("Jsi").style.display='block';
        document.getElementById("Jgj").style.display='block';
        document.getElementById("Jhn").style.display='block';
        document.getElementById("Jtr").style.display='block';

        document.getElementById("Ibus").style.display='none';
        document.getElementById("Il").style.display='none';
        document.getElementById("Iwon").style.display='none';
        document.getElementById("Itr").style.display='none';

        document.getElementById("Gtr").style.display='none';
        document.getElementById("Gbus").style.display='none';
        document.getElementById("Gl").style.display='none';
        document.getElementById("Gch").style.display='none';

        document.getElementById("jeonju").style.display='none';
        document.getElementById("iksan").style.display='block';
        document.getElementById("gunsan").style.display='block';

        bt1.value = document.getElementById("Jeonju1").value;
    }
    function is(){
        document.getElementById("Iksan1").style.backgroundColor="#FFA500";
        document.getElementById("Iksan1").style.color="#ffffff";
        document.getElementById("Jeonju1").style.backgroundColor="#ffffff";
        document.getElementById("Jeonju1").style.color="#FFA500";
        document.getElementById("Gunsan1").style.backgroundColor="#ffffff";
        document.getElementById("Gunsan1").style.color="#FFA500";

        document.getElementById("Jgo").style.display='none';
        document.getElementById("Jsi").style.display='none';
        document.getElementById("Jgj").style.display='none';
        document.getElementById("Jhn").style.display='none';
        document.getElementById("Jtr").style.display='none';

        document.getElementById("Ibus").style.display='block';
        document.getElementById("Il").style.display='block';
        document.getElementById("Iwon").style.display='block';
        document.getElementById("Itr").style.display='block';

        document.getElementById("Gtr").style.display='none';
        document.getElementById("Gbus").style.display='none';
        document.getElementById("Gl").style.display='none';
        document.getElementById("Gch").style.display='none';

        document.getElementById("jeonju").style.display='block';
        document.getElementById("iksan").style.display='none';
        document.getElementById("gunsan").style.display='block';

        bt1.value = document.getElementById("Iksan1").value;
    }
    function gs(){
        document.getElementById("Gunsan1").style.backgroundColor="#FFA500"
        document.getElementById("Gunsan1").style.color="#ffffff";
        document.getElementById("Jeonju1").style.backgroundColor="#ffffff";
        document.getElementById("Jeonju1").style.color="#FFA500";
        document.getElementById("Iksan1").style.backgroundColor="#ffffff";
        document.getElementById("Iksan1").style.color="#FFA500"


        document.getElementById("Jgo").style.display='none';
        document.getElementById("Jsi").style.display='none';
        document.getElementById("Jgj").style.display='none';
        document.getElementById("Jhn").style.display='none';
        document.getElementById("Jtr").style.display='none';

        document.getElementById("Ibus").style.display='none';
        document.getElementById("Il").style.display='none';
        document.getElementById("Iwon").style.display='none';
        document.getElementById("Itr").style.display='none';

        document.getElementById("Gtr").style.display='block';
        document.getElementById("Gbus").style.display='block';
        document.getElementById("Gl").style.display='block';
        document.getElementById("Gch").style.display='block';

        document.getElementById("jeonju").style.display='block';
        document.getElementById("iksan").style.display='block';
        document.getElementById("gunsan").style.display='none';

        bt1.value = document.getElementById("Gunsan1").value;
    }
    function Jchoose(obj){
        switch(obj.id){
            case "Jgo":
                document.getElementById("Jgo").style.backgroundColor = "#FFA500";
                document.getElementById("Jgo").style.color="#ffffff"
                document.getElementById("Jsi").style.backgroundColor = "#ffffff";
                document.getElementById("Jsi").style.color = "#FFA500";
                document.getElementById("Jgj").style.backgroundColor = "#ffffff";
                document.getElementById("Jgj").style.color = "#FFA500";
                document.getElementById("Jhn").style.backgroundColor = "#ffffff";
                document.getElementById("Jhn").style.color = "#FFA500";
                document.getElementById("Jtr").style.backgroundColor = "#ffffff";
                document.getElementById("Jtr").style.color = "#FFA500";
                bt2.value=document.getElementById("Jgo").value;
                break;
            case "Jsi":
                document.getElementById("Jsi").style.backgroundColor = "#FFA500";
                document.getElementById("Jsi").style.color="#ffffff"
                document.getElementById("Jgo").style.backgroundColor = "#ffffff";
                document.getElementById("Jgo").style.color = "#FFA500";
                document.getElementById("Jgj").style.backgroundColor = "#ffffff";
                document.getElementById("Jgj").style.color = "#FFA500";
                document.getElementById("Jhn").style.backgroundColor = "#ffffff";
                document.getElementById("Jhn").style.color = "#FFA500";
                document.getElementById("Jtr").style.backgroundColor = "#ffffff";
                document.getElementById("Jtr").style.color = "#FFA500";
                bt2.value=document.getElementById("Jsi").value;
                break;
            case "Jgj":
                document.getElementById("Jgj").style.backgroundColor = "#FFA500";
                document.getElementById("Jgj").style.color="#ffffff"
                document.getElementById("Jgo").style.backgroundColor = "#ffffff";
                document.getElementById("Jgo").style.color = "#FFA500";
                document.getElementById("Jsi").style.backgroundColor = "#ffffff";
                document.getElementById("Jsi").style.color = "#FFA500";
                document.getElementById("Jhn").style.backgroundColor = "#ffffff";
                document.getElementById("Jhn").style.color = "#FFA500";
                document.getElementById("Jtr").style.backgroundColor = "#ffffff";
                document.getElementById("Jtr").style.color = "#FFA500";
                bt2.value=document.getElementById("Jgj").value;
                break;
            case "Jhn":
                document.getElementById("Jhn").style.backgroundColor = "#FFA500";
                document.getElementById("Jhn").style.color="#ffffff"
                document.getElementById("Jgo").style.backgroundColor = "#ffffff";
                document.getElementById("Jgo").style.color = "#FFA500";
                document.getElementById("Jgj").style.backgroundColor = "#ffffff";
                document.getElementById("Jgj").style.color = "#FFA500";
                document.getElementById("Jsi").style.backgroundColor = "#ffffff";
                document.getElementById("Jsi").style.color = "#FFA500";
                document.getElementById("Jtr").style.backgroundColor = "#ffffff";
                document.getElementById("Jtr").style.color = "#FFA500";
                bt2.value=document.getElementById("Jhn").value;
                break;
            case "Jtr":
                document.getElementById("Jtr").style.backgroundColor = "#FFA500";
                document.getElementById("Jtr").style.color="#ffffff"
                document.getElementById("Jgo").style.backgroundColor = "#ffffff";
                document.getElementById("Jgo").style.color = "#FFA500";
                document.getElementById("Jgj").style.backgroundColor = "#ffffff";
                document.getElementById("Jgj").style.color = "#FFA500";
                document.getElementById("Jhn").style.backgroundColor = "#ffffff";
                document.getElementById("Jhn").style.color = "#FFA500";
                document.getElementById("Jsi").style.backgroundColor = "#ffffff";
                document.getElementById("Jsi").style.color = "#FFA500";
                bt2.value=document.getElementById("Jtr").value;
                break;
        }
    }
    function Ichoose(obj) {
        switch(obj.id) {
            case "Itr":
                document.getElementById("Itr").style.color="#ffffff";
                document.getElementById("Itr").style.backgroundColor="#FFA500";
                document.getElementById("Ibus").style.color="#FFA500";
                document.getElementById("Ibus").style.backgroundColor="#ffffff";
                document.getElementById("Il").style.color="#FFA500";
                document.getElementById("Il").style.backgroundColor="#ffffff";
                document.getElementById("Iwon").style.color="#FFA500";
                document.getElementById("Iwon").style.backgroundColor="#ffffff";
                bt2.value=document.getElementById("Itr").value;
                break;
            case"Ibus":
                document.getElementById("Itr").style.color="#FFA500";
                document.getElementById("Itr").style.backgroundColor="#ffffff";
                document.getElementById("Ibus").style.color="#ffffff";
                document.getElementById("Ibus").style.backgroundColor="#FFA500";
                document.getElementById("Il").style.color="#FFA500";
                document.getElementById("Il").style.backgroundColor="#ffffff";
                document.getElementById("Iwon").style.color="#FFA500";
                document.getElementById("Iwon").style.backgroundColor="#ffffff";
                bt2.value=document.getElementById("Ibus").value;
                break;
            case "Il":
                document.getElementById("Itr").style.color="#FFA500";
                document.getElementById("Itr").style.backgroundColor="#ffffff";
                document.getElementById("Ibus").style.color="#FFA500";
                document.getElementById("Ibus").style.backgroundColor="#ffffff";
                document.getElementById("Il").style.color="#ffffff";
                document.getElementById("Il").style.backgroundColor="#FFA500";
                document.getElementById("Iwon").style.color="#FFA500";
                document.getElementById("Iwon").style.backgroundColor="#ffffff";
                bt2.value=document.getElementById("Il").value;
                break;
            case "Iwon":
                document.getElementById("Itr").style.color="#FFA500";
                document.getElementById("Itr").style.backgroundColor="#ffffff";
                document.getElementById("Ibus").style.color="#FFA500";
                document.getElementById("Ibus").style.backgroundColor="#ffffff";
                document.getElementById("Il").style.color="#FFA500";
                document.getElementById("Il").style.backgroundColor="#ffffff";
                document.getElementById("Iwon").style.color="#ffffff";
                document.getElementById("Iwon").style.backgroundColor="#FFA500";
                bt2.value=document.getElementById("Iwon").value;
                break;
        }
    }
    function Gchoose(obj) {
        switch (obj.id) {
            case "Gch" :
                document.getElementById("Gch").style.backgroundColor="#FFA500";
                document.getElementById("Gch").style.color="#ffffff";
                document.getElementById("Gbus").style.backgroundColor="#ffffff";
                document.getElementById("Gbus").style.color="#FFA500";
                document.getElementById("Gl").style.backgroundColor="#ffffff";
                document.getElementById("Gl").style.color="#FFA500";
                document.getElementById("Gtr").style.backgroundColor="#ffffff";
                document.getElementById("Gtr").style.color="#FFA500";
                bt2.value=document.getElementById("Gch").value;
                break;
            case "Gbus" :
                document.getElementById("Gch").style.backgroundColor="#ffffff";
                document.getElementById("Gch").style.color="#FFA500";
                document.getElementById("Gbus").style.backgroundColor="#FFA500";
                document.getElementById("Gbus").style.color="#ffffff";
                document.getElementById("Gl").style.backgroundColor="#ffffff";
                document.getElementById("Gl").style.color="#FFA500";
                document.getElementById("Gtr").style.backgroundColor="#ffffff";
                document.getElementById("Gtr").style.color="#FFA500";
                bt2.value=document.getElementById("Gbus").value;
                break;
            case "Gl":
                document.getElementById("Gch").style.backgroundColor="#ffffff";
                document.getElementById("Gch").style.color="#FFA500";
                document.getElementById("Gbus").style.backgroundColor="#ffffff";
                document.getElementById("Gbus").style.color="#FFA500";
                document.getElementById("Gl").style.backgroundColor="#FFA500";
                document.getElementById("Gl").style.color="#ffffff";
                document.getElementById("Gtr").style.backgroundColor="#ffffff";
                document.getElementById("Gtr").style.color="#FFA500";
                bt2.value=document.getElementById("Gl").value;
                break;
            case "Gtr":
                document.getElementById("Gch").style.backgroundColor="#ffffff";
                document.getElementById("Gch").style.color="#FFA500";
                document.getElementById("Gbus").style.backgroundColor="#ffffff";
                document.getElementById("Gbus").style.color="#FFA500";
                document.getElementById("Gl").style.backgroundColor="#ffffff";
                document.getElementById("Gl").style.color="#FFA500";
                document.getElementById("Gtr").style.backgroundColor="#FFA500";
                document.getElementById("Gtr").style.color="#ffffff";
                bt2.value=document.getElementById("Gtr").value;
                break;
        }
    }
    function destin(obj){
        switch(obj.id){
            case"jeonju":
                document.getElementById("jeonju").style.color="#ffffff";
                document.getElementById("jeonju").style.backgroundColor="#FFA500";
                document.getElementById("iksan").style.color="#FFA500";
                document.getElementById("iksan").style.backgroundColor="#ffffff";
                document.getElementById("gunsan").style.color="#FFA500";
                document.getElementById("gunsan").style.backgroundColor="#ffffff";
                bt3.value=document.getElementById("jeonju").value;
                break;
            case "iksan":
                document.getElementById("jeonju").style.color="#FFA500";
                document.getElementById("jeonju").style.backgroundColor="#ffffff";
                document.getElementById("iksan").style.color="#ffffff";
                document.getElementById("iksan").style.backgroundColor="#FFA500";
                document.getElementById("gunsan").style.color="#FFA500";
                document.getElementById("gunsan").style.backgroundColor="#ffffff";
                bt3.value=document.getElementById("iksan").value;
                break;
            case "gunsan":
                document.getElementById("jeonju").style.color="#FFA500";
                document.getElementById("jeonju").style.backgroundColor="#ffffff";
                document.getElementById("iksan").style.color="#FFA500";
                document.getElementById("iksan").style.backgroundColor="#ffffff";
                document.getElementById("gunsan").style.color="#ffffff";
                document.getElementById("gunsan").style.backgroundColor="#FFA500";
                bt3.value=document.getElementById("gunsan").value;
                break;

        }
    }
</script>
</body>
</html>