<?php
$name = $_POST['name'] 
$email = $_POST['e-mail'] 
$msg = $_POST['komm'] 

$name = trim(urldecode(htmlspecialchars($name)));
$email = trim(urldecode(htmlspecialchars($email)));
$msg = trim(urldecode(htmlspecialchars($msg)));

if(mail("evgeniaakperova@gmail.com", "Новый запрос на бронирование антикафе", 
"<h1>На вашем сайте была оставлена заявка<h1>
<br>от: <b>".$name."</b>
<br>e-mail: <b>".$email."</b>
<br>пользователь оставил комментарий ".$msg."
<br>Поздравляю с новой заявкой!",
"From: test.ru\r\n". "Content-type: text/html\r\n"))
{
    echo '{"status": "ok"}';
}else{
    echo '{"status": "error"}';
}

if($('#name').val() != '' && $('#email').val() !='') {

}else{
    alert("Заполните обязательные поля")
}

fetch('send.php', {
    method: 'POST',
    headers:{
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: $("#send_form").serialize(),
    }).then((response) => response.json())

.then((data) => {
    if (data.status === 'ok') {
        $("#send_form").addClass("send_success");
        setTimeout(() => $("send_form").removeClass("send_success"), 4000);
    }
    if (data.status === 'error') {
        $("#send_form").addClass("send_fail");
        setTimeout(() => $("send_form").removeClass("send_fail "), 4000);
    }
}
?>
