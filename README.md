# google-play-scrapper
A PHP scraper for Google Play
# Installing
Run the command:
```
composer require mertkose/google-play-scrapper --dev
```
# Quick start
```
use GooglePlay\Scrapper;

// first parameter game id, second parameter langaue (tr, en, etc...)
$data = new Scrapper("com.tencent.ig","tr");

echo $data->get_title();
```

# Methods
```
get_title();
// PUBG MOBILE

get_category();
// Action

get_developer();
// Tencent Games

get_image();
// https://lh3.googleusercontent.com/KsQI-a5CMbJeWkzi6mMf80xjduKEACmFTc5w3dF-M8t7PafIs83Ian4H1171YVO1Zg=s180

get_content_text();
// Google Play's Biggest...

get_content_html();
// <b>Google Play's Biggest...

get_updated();
// December 18, 2018

get_size();
// 39M

get_installs();
// 100,000,000+

get_version();
// 0.10.0

get_editor_choice();
// "1" or "0"

get_video();
// https://www.youtube.com/embed/-OA88xkFgKE?ps=play&vq=large&rel=0&autohide=1&showinfo=0

get_price();
// "Install" or "TRY 3.99 Buy"

get_gallery();
// foreach ($data->get_gallery() as $key) {
//	   echo $key."<br>";
// }
