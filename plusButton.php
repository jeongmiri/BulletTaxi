<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$starting_point = $_POST['starting_point'];
$destination = $_POST['destination'];
$user_name = $_POST['username'];
$user_phone = $_POST['userphone'];?>

<form action="../jh/cs_plus.php" method="post">
    <input type = "hidden" value = "<?= $starting_point;?>" name = "starting_point">
    <input type = "hidden" value = "<?= $destination;?>" name = "destination">
    <input type="hidden" value = "<?= $user_name;?>" name = "username">
    <input type = "hidden" value = "<?= $user_phone;?>" name = "userphone">
    <select name="time">
        <option value="">시간</option>
        <option value="04:00-04:30">04:00 ~ 04:30</option>
        <option value="04:30-05:00">04:30 ~ 05:00</option>
        <option value="05:00-05:30">05:00 ~ 05:30</option>
        <option value="05:30-06:00">05:30 ~ 06:00</option>
        <option value="06:00-06:30">06:00 ~ 06:30</option>
        <option value="06:30-07:00">06:30 ~ 07:00</option>
        <option value="07:00-07:30">07:00 ~ 07:30</option>
        <option value="07:30-08:00">07:30 ~ 08:00</option>
        <option value="08:00-08:30">08:00 ~ 08:30</option>
        <option value="08:30-09:00">08:30 ~ 09:00</option>
        <option value="09:00-09:30">09:00 ~ 09:30</option>
        <option value="09:30-10:00">09:30 ~ 10:00</option>
        <option value="10:00-10:30">10:00 ~ 10:30</option>
        <option value="10:30-11:00">10:30 ~ 11:00</option>
        <option value="11:00-11:30">11:00 ~ 11:30</option>
        <option value="11:30-12:00">11:30 ~ 12:00</option>
        <option value="12:00-12:30">12:00 ~ 12:30</option>
        <option value="12:30-13:00">12:30 ~ 13:00</option>
        <option value="13:00-13:30">13:00 ~ 13:30</option>
        <option value="13:30-14:00">13:30 ~ 14:00</option>
        <option value="14:00-14:30">14:00 ~ 14:30</option>
        <option value="14:30-15:00">14:30 ~ 15:00</option>
        <option value="15:00-15:30">15:00 ~ 15:30</option>
        <option value="15:30-16:00">15:30 ~ 16:00</option>
        <option value="16:00-16:30">16:00 ~ 16:30</option>
        <option value="16:30-17:00">16:30 ~ 17:00</option>
        <option value="17:00-17:30">17:00 ~ 17:30</option>
        <option value="17:30-18:00">17:30 ~ 18:00</option>
        <option value="18:00-18:30">18:00 ~ 18:30</option>
        <option value="18:30-19:00">18:30 ~ 19:00</option>
        <option value="19:00-19:30">19:00 ~ 19:30</option>
        <option value="19:30-20:00">19:30 ~ 20:00</option>
        <option value="20:00-20:30">20:00 ~ 20:30</option>
        <option value="20:30-21:00">20:30 ~ 21:00</option>
        <option value="21:00-21:30">21:00 ~ 21:30</option>
        <option value="21:30-22:00">21:30 ~ 21:00</option>
        <option value="22:00-22:30">22:00 ~ 22:30</option>
        <option value="22:30-23:00">22:30 ~ 22:00</option>
        <option value="23:00-23:30">23:00 ~ 23:30</option>
        <option value="23:30-24:00">23:30 ~ 23:00</option>
        <option value="24:00-24:30">24:00 ~ 24:30</option>
        <option value="24:30-25:00">24:30 ~ 24:00</option>
        <option value="25:00-25:30">25:00 ~ 25:30</option>
        <option value="25:30-26:00">25:30 ~ 25:00</option>
        <option value="26:00-26:30">26:00 ~ 26:30</option>
        <option value="26:30-27:00">26:30 ~ 27:00</option>
        <option value="27:00-27:30">27:00 ~ 27:30</option>
        <option value="27:30-28:00">27:30 ~ 28:00</option>
    </select>
    <select name="people">
        <option value="">사람 수</option>
        <option value="2">2/4</option>
        <option value="3">3/4</option>
        <option value="4">4/4</option>
    </select>
    <input type="submit">
</form>
</body>
</html>