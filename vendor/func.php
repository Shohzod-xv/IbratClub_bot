<?php
function query($sorov){
    global $conn;
    return pg_query($conn, $sorov);
}
function check_user($chatId)
{
    $db = query("Select chat_id from users where chat_id='$chatId'");
    if (pg_num_rows($db) != 0) {
        return true;
    } else {
        return false;
    }
}
function lang($chatId){
    $db = query("SELECT language FROM users WHERE chat_id='$chatId'");
    while ($row = pg_fetch_assoc($db)) {
        return $row['language'];
    }
}
function number($chatId){
    $a = query("SELECT phone FROM users WHERE chat_id = '$chatId'");
    while ($row = pg_fetch_assoc($a)) {
        return $row['phone'];
    }
}

