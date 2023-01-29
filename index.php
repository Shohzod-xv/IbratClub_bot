<?php
include "vendor/db.php";
include "vendor/Button.php";
include "vendor/Text.php";
define('API_KEY', 'API_TOKEN');
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chatId = $message->chat->id;
$tx = $message->text;
$first_name = $message->from->first_name;
$miid = $message->message_id;
$callback = $update->callback_query;
$mmid = $callback->inline_message_id;
$mes = $callback->message;
$mid = $mes->message_id;
$mmid = $callback->inline_message_id;
$cbid = $callback->from->id;
$data = $callback->data;
$fromId = $message->from->id;
$num = $message->contact->phone_number;
$back_uz = "🔙️ Orqaga";
$back_ru = "🔙️ Назад";
$back_en = "🔙️ Back";
$btn = new Button();
$text = new Text();
if ($tx == "/start") {
    bot('sendMessage', [
        'chat_id' => $chatId,
        'text' => "
Assalomu aleykum! Botimizga xush kelibsiz! 
Xizmat ko’rsatish tilini tanlang:\n
Здравствуйте! Добро пожаловать в наш бот!
Для начала выберите язык обслуживания: \n
Hello! Welcome to our bot! 
First select the service language:",
        'reply_markup' => $btn->language()
    ]);
    if (!check_user("$chatId")) {
        query("Insert Into users(active,chat_id,count,email,registered_time,registered_type) values(true,'$chatId',8,'pochtauz@gmail.com',NOW(),'BOT')");
    }
}
if ($data == "uzb" || $data == "rus" || $data == "eng") {
    query("UPDATE users SET language = '$data' WHERE chat_id='$cbid'");
    bot('editMessageText', [
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => $text->HelloText($data),
    ]);
    if (number($cbid) != ""){
        bot('sendMessage', [
            'chat_id' => $cbid,
            'text' => $text->HomePageText(lang($cbid)),
            'reply_markup' => $btn->HomePageButton(lang($cbid))
        ]);
    }else{
        bot('sendMessage', [
            'chat_id' => $cbid,
            'text' => $text->SendNumberText($data),
            'reply_markup' => $btn->SendNumberButton($data)
        ]);
    }
}
if ($num){
    if (substr($num, 0, 3) == "998" && strlen($num) == 12) {
        $db = query("UPDATE users SET phone='{$num}' where chat_id ='$fromId'");
        bot('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text->HomePageText(lang($chatId)),
            'reply_markup' => $btn->HomePageButton(lang($chatId))
        ]);
    }elseif (substr($num, 0, 4) == "+998" && strlen($num) == 13){
        $db = query("UPDATE users SET phone='{$num}' where chat_id ='$fromId'");
        bot('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text->HomePageText(lang($chatId)),
            'reply_markup' => $btn->HomePageButton(lang($chatId))
        ]);
    }
    else {
        bot('sendMessage', [
            'chat_id' => $fromId,
            'text' => $text->ReturnNumberText(lang($chatId)),
            'reply_markup' => $btn->SendNumberButton(lang($chatId))
        ]);
    }
}
if ($tx == "🎟 Tadbirlar" || $tx == "🎟 События" || $tx == "🎟 Events"){
    bot('sendPhoto', [
        'chat_id' => $chatId,
        'photo' => "https://telegra.ph/file/4298f0a9275e0a88b4795.jpg",
        'caption' => $text->EventText(lang($chatId)),
        'reply_markup' => $btn->EventButton(lang($chatId))
    ]);
}elseif ($tx == "📞 Bog'lanish" || $tx == "📞 Связаться" || $tx == "📞 Contact") {
    bot('sendMessage', [
        'chat_id' => $chatId,
        'text' => "Contact Malumotlari"
    ]);
}elseif ($tx == "ℹ️ Biz haqimizda" || $tx == "ℹ️ О нас" || $tx == "ℹ️ About us") {
    bot('sendMessage', [
        'chat_id' => $chatId,
        'text' => "Biz haqimizda Malumotlari"
    ]);
}elseif ($tx == "📌 Manzil" || $tx == "📌 Адрес" || $tx == "📌 Address") {
    bot('sendMessage', [
        'chat_id' => $chatId,
        'text' => "Manzil Malumotlari"
    ]);
}
if ($data == "orqaga_uz" || $data == "orqaga_ru" || $data == "orqaga_en"){
    bot('deleteMessage', [
        'chat_id' => $cbid,
        'message_id' => $mid
    ]);
    bot('sendPhoto', [
        'chat_id' => $cbid,
        'photo' => "https://telegra.ph/file/4298f0a9275e0a88b4795.jpg",
        'caption' => $text->EventText(lang($cbid)),
        'reply_markup' => $btn->EventButton(lang($cbid))
    ]);
}
if ($data == "tadbir_one_uzb" || $data == "tadbir_one_rus" || $data == "tadbir_one_eng"){
    bot('deleteMessage', [
        'chat_id' => $cbid,
        'message_id' => $mid
    ]);
    bot('sendPhoto', [
        'chat_id' => $cbid,
        'photo' => "https://telegra.ph/file/4298f0a9275e0a88b4795.jpg",
        'caption' => $text->RegisterText(lang($cbid)),
        'reply_markup' => $btn->RegisterButton(lang($cbid))
    ]);
}
echo "Hello World";