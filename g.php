<?php
$logo = array("

\e[32m████████╗░░░░░░░██████╗░██████╗░░█████╗░██████╗░
╚══██╔══╝░░░░░░██╔════╝░██╔══██╗██╔══██╗██╔══██╗
\e[91m░░░██║░░░█████╗██║░░██╗░██████╔╝███████║██████╦╝
░░░██║░░░╚════╝██║░░╚██╗██╔══██╗██╔══██║██╔══██╗
\e[32m░░░██║░░░░░░░░░╚██████╔╝██║░░██║██║░░██║██████╦╝
░░░╚═╝░░░░░░░░░░╚═════╝░╚═╝░░╚═╝╚═╝░░╚═╝╚═════╝░
                   
                      ");
function source($site, $ZH, $PHPSESSID) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_URL, $site);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIE, "ZHE=" . $ZH . "; PHPSESSID=" . $PHPSESSID . ";");
    curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 20);
    $exec = curl_exec($curl);
    curl_close($curl);
    return (preg_match_all('#<td>((www.)?[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]+/(?:.*))#', $exec, $sites)) ? $sites[1] : null;
}
define('FOLDER', 'result');
if (!is_dir(FOLDER)) {
    mkdir(FOLDER);
}
echo $logo[array_rand($logo) ];
$ZH = '5f87135c112a1fabb1700e2ee5314e6a';
$PHPSESSID = 'jq5m1rnbucdho4avs75qj5bgk4';
echo "
   \e[32mZONE-H Graber";
   
echo "
   \e[32mGitHub: https://github.com/mronion420";
echo "
   \e[32mTelegram: https://t.me/mronion420";

echo "
   \e[92m[\e[91m*\e[92m] \e[32mGive Me Notifier Name \e[97m\e[91m> \e[97m";
$notifier = trim(fgets(STDIN));
if (empty($ZH) && empty($PHPSESSID)) die("Wrong Setting.");
echo "

";
for ($i = 1;$i <= 50;$i++) {
    $sites = source('http://webcache.googleusercontent.com/search?q=cache:www.zone-h.org/archive/notifier=' . $notifier . '/page=' . $i, $ZH, $PHPSESSID);
    if ($sites) {
        foreach ($sites as $site) {
            $xxx = "http://$site
";
            preg_match_all('/http:\/\/(.*?)\//', $xxx, $Done);
            foreach ($Done[1] as $lolxd) {
                $lolx = "http://$lolxd
";
                echo "    $lolx";
                $lol = fopen(FOLDER . "/{$notifier}.txt", 'a+');
                fwrite($lol, $lolx);
            }
        }
    } else {
        continue;
    }
}
echo "

";
echo "    Done! With \e[92m" . count(file(FOLDER . "/" . $notifier . ".txt")) . "\e[97m Website SAVED in to \e[91m->  \e[97m/" . FOLDER . "/" . $notifier . ".txt
";
echo "

";
@unlink("cookie.txt");
?>