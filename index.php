<?php include "data.php"; ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>메인페이지</title>
</head>
<body>
<?php

if(isset($_SESSION['userid'])){
    $session_id = $_SESSION['userid'];
$user_name = "";
if($pdo) {
    $user = $pdo->prepare("SELECT name FROM guest WHERE id =:id");
    $user->bindParam(':id', $session_id);
    $user->execute();
    $user->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $user->fetch()) {
        $user_name = $row['name'];
    }
}?>
    <h2> <?php echo $user_name?>님이 로그인 하셨습니다.</h2>

<form method="post" action="../sh/select.php">
    <table align="center" border="0" cellspacing="0" width="300">
        <tr>
            <input type="submit" value="예약하기" />
            </td>
        </tr>
    </table>
</form>
    <?php
}else{
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
}
?>
</body>
</html>