<?php

class Button
{
    public function language()
    {
        return json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "🇺🇿 Uzb", 'callback_data' => "uzb"],
                    ['text' => "🇷🇺 Rus", 'callback_data' => "rus"],
                    ['text' => "🇺🇸 Eng", 'callback_data' => "eng"]
                ],
            ]
        ]);
    }
    public function SendNumberButton($lang)
    {
        if ($lang == 'uzb') : return json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard'=>true,
            'keyboard' => [
                [['text' => "☎️ Raqam Yuborish", 'request_contact' => true]],
            ]
        ]);
        elseif ($lang == "rus") : return json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard'=>true,
            'keyboard' => [
                [['text' => "☎️ Отправить номер", 'request_contact' => true]],
            ]
        ]);
        elseif ($lang == "eng") : return json_encode([
            'resize_keyboard' => true,
            'one_time_keyboard'=>true,

            'keyboard' => [
                [['text' => "☎️ Send Number", 'request_contact' => true]],
            ]
        ]);
        endif;
    }
    public function HomePageButton($lang)
    {
        if ($lang == 'uzb') :
            return json_encode([
                'resize_keyboard' => true,
                'keyboard' => [
                    [['text' => "🎟 Tadbirlar"], ['text' => "📞 Bog'lanish"]],
                    [['text' => "ℹ️ Biz haqimizda"]],
                    [['text' => "📌 Manzil"]]
                ]
            ]);
        elseif ($lang == "rus") :
            return json_encode([
                'resize_keyboard' => true,
                'keyboard' => [
                    [['text' => "🎟 События"], ['text' => "📞 Связаться с нами"]],
                    [['text' => "ℹ️ О нас"]],
                    [['text' => "📌 Адрес"]]
                ]
            ]);
        elseif ($lang == "eng") :
            return json_encode([
                'resize_keyboard' => true,
                'keyboard' => [
                    [['text' => "🎟 Events"], ['text' => "📞 Contact us"]],
                    [['text' => "ℹ️ About us"]],
                    [['text' => "📌 Address"]]
                ]
            ]);
        endif;
    }
    public function EventButton($lang){
        if ($lang == 'uzb') {
            return json_encode([
                'inline_keyboard' => [
                    [['text' => "Tadbir - 1", 'callback_data' => "tadbir_one_uzb"]],
                    [['text' => "Tadbir - 2", 'callback_data' => "tadbir_two_uzb"]],
                    [['text' => "Tadbir - 3", 'callback_data' => "tadbir_three_uzb"]],
                ],
            ]);
        }elseif ($lang == "rus") {
            return json_encode([
                'inline_keyboard' => [
                    [['text' => "Событие - 1", 'callback_data' => "tadbir_one_rus"]],
                    [['text' => "Событие - 2", 'callback_data' => "tadbir_two_rus"]],
                    [['text' => "Событие - 3", 'callback_data' => "tadbir_three_rus"]],
                ]
            ]);
        }elseif ($lang == "eng") {
            return json_encode([
                'inline_keyboard' => [
                    [['text' => "Event - 1", 'callback_data' => "tadbir_one_eng"]],
                    [['text' => "Event - 2", 'callback_data' => "tadbir_two_eng"]],
                    [['text' => "Event - 3", 'callback_data' => "tadbir_three_eng"]],
                ]
            ]);
        }
    }
    public function RegisterButton($lang){
        if ($lang == 'uzb') {
        return json_encode([
            'inline_keyboard' => [
                [['text' => "Tadbir haqida to'liq ma'lumot", 'callback_data' => "tadbir_info_uz"]],
                [['text' => "Tadbirga ro'yhatdan o'tish", 'callback_data' => "tadbir_register_uz"]],
                [['text' => "🔙️ Orqaga", 'callback_data' => "orqaga_uz"]
                ],
            ]
        ]);
        }elseif ($lang == "rus") {
            return json_encode([
                'inline_keyboard' => [
                    [['text' => "Полная информация о событии", 'callback_data' => "tadbir_info_ru"]],
                    [['text' => "Зарегистрироваться на мероприятие", 'callback_data' => "tadbir_register_ru"]],
                    [['text' => "🔙️ Назад", 'callback_data' => "orqaga_ru"]],
                ]
            ]);
        }elseif ($lang == "eng") {
            return json_encode([
                'inline_keyboard' => [
                    [['text' => "Full information about the event", 'callback_data' => "tadbir_info_en"]],
                    [['text' => "Register for the event", 'callback_data' => "tadbir_register_en"]],
                    [['text' => "🔙️ Back", 'callback_data' => "orqaga_en"]],
                ]
            ]);
        }
    }
}



