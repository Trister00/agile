<?php

include_once '../config/database.php';
include_once '../models/message.php';
$page_title = 'chat';

echo $_SESSION['pseudo'];
echo $_SESSION['id_user'];
echo "<br/>";

?>

<?php
$databse = new Database();
$db = $databse->getConnection();
$message = new Message($db);
$message->id_canal = $_GET['id_canal'];
$messages = $message->readAll();


$id_canal = $_GET['id_canal'];
// echo $id_canal;
// print_r($messages);
?>
<div class="mesgs">
    <div class="msg_history">
        <?php
        foreach ($messages as $mess) {
            if ($mess['id_user'] != $_SESSION['id_user']) {
                echo  "<div class=\"incoming_msg\">
                <div class=\"incoming_msg_img\"> <img src=\"https://ptetutorials.com/images/user-profile.png\" alt=\"sunil\">
                </div>
                <div class=\"received_msg\">
                    <div class=\"received_withd_msg\">
                        <p>" . $mess['contenu'] . "</p>
                        <span class=\"time_date\"> 11:01 AM | June 9</span>
                    </div>
                </div>
            </div>";
            } else {
                echo ' <div class="outgoing_msg">
                <div class="sent_msg">
                    <p>' . $mess['contenu'] . '</p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>';
            }
        }
        echo 'fin boucle';
        ?>
        <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
            </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p>Hi bro, send me nudes</p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>
        </div>
        <div class="outgoing_msg">
            <div class="sent_msg">
                <p>Ok motherfucker</p>
                <span class="time_date"> 11:01 AM | June 9</span>
            </div>
        </div>
        <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
            </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p>Thanks men</p>
                    <span class="time_date"> 11:01 AM | Yesterday</span>
                </div>
            </div>
        </div>
        <div class="outgoing_msg">
            <div class="sent_msg">
                <p>Your welcome</p>
                <span class="time_date"> 11:01 AM | Today</span>
            </div>
        </div>

    </div>
    <div class="type_msg">
        <div class="input_msg_write">
            <input type="text" class="write_msg" placeholder="Type a message" />
            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
        </div>
    </div>
</div>