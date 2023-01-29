<?php
class Text{
    public function SendNumberText($lang)
    {
        if ($lang == 'uzb') : return "Botdan to'liq foydalanish uchun Telefon raqam yuboring 👇👇👇";
        elseif ($lang == 'rus') : return "Для полного использования бота отправьте номер телефона 👇👇👇";
        elseif ($lang == 'eng') : return "To fully use the bot, send the phone number 👇👇👇";
        endif;
    }
    public function HelloText($lang)
    {
        if ($lang == 'uzb') : return "Assalomu alekum";
        elseif ($lang == 'rus') : return "Привет";
        elseif ($lang == 'eng') : return "Hello";
        endif;
    }
    public function HomePageText($lang){
        if ($lang == 'uzb') : return "🏡 Bosh Menu";
        elseif ($lang == 'rus') : return "🏡 Главное меню";
        elseif ($lang == 'eng') : return "🏡 Main Menu";
        endif;
    }
    public function ReturnNumberText($lang){
        if ($lang == 'uzb') : return "Telefon raqamingizni qayta yuboring 🔁";
        elseif ($lang == 'rus') : return "Повторно отправьте свой номер телефона 🔁";
        elseif ($lang == 'eng') : return "Resend your phone number 🔁";
        endif;
    }
    public function EventText($lang){
        if ($lang == 'uzb') : return "Ro'yhatdan o'tish uchun kerakli tadbirlardan birini tanlang: 👇👇👇";
        elseif ($lang == 'rus') : return "Выберите одно из событий, чтобы зарегистрироваться: 👇👇👇";
        elseif ($lang == 'eng') : return "Choose one of the events to register: 👇👇👇";
        endif;
    }
    public function RegisterText($lang){
        if ($lang == 'uzb') : return "Kerakli b'limni tanlang: 👇👇👇";
        elseif ($lang == 'rus') : return "Выберите необходимый раздел: 👇👇👇";
        elseif ($lang == 'eng') : return "Choose the required section: 👇👇👇";
        endif;
    }
}
?>
