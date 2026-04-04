<?php  
include 'session.php';
?>

<html lang="en">

<head>
    <style data-styles="">
        ion-icon {
            visibility: hidden
        }

        .hydrated {
            visibility: inherit
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="<?php echo $sitename ?>">
    <meta name="Author" content="<?php echo $sitename ?>">
    <meta name="Keywords" content="<?php echo $sitename ?>, Bitcoin Trading, Investment ">
    <!-- Title -->
    <title><?php echo $sitename ?> - Trading Platform Dashboard ™ </title>
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="css/select2.min.css" rel="stylesheet">


    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js">


    <link rel="icon" href="../img/logo.png" sizes="32x32" />

    <!-- Icons css -->
    <link href="css/icons.css" rel="stylesheet">

    <!-- Internal Chart-Morris css-->
    <link href="css/morris.css" rel="stylesheet">

    <!--  Left-Sidebar css -->
    <link href="css/sidemenu.css" rel="stylesheet">

    <!--  Right-sidemenu css -->
    <link href="css/sidebar.css" rel="stylesheet">

    <!-- Internal Nice-select css  -->
    <link href="css/nice-select.css" rel="stylesheet">

    <!-- Internal News-Ticker css-->
    <link href="css/flag-icon.min.css" rel="stylesheet">

    <!-- Jquery-countdown css-->
    <link href="css/countdown.css" rel="stylesheet">

    <!-- Internal News-Ticker css-->
    <link href="css/jquery.jConveyorTicker.css" rel="stylesheet">

    <!-- style css-->
    <link href="css/style.css" rel="stylesheet">

    <!-- skin css-->
    <link href="css/skin-modes.css" rel="stylesheet">

    <!-- dark-theme css-->
    <link href="css/style-dark.css" rel="stylesheet">

    <!--- Animations css-->
    <link href="css/animate.css" rel="stylesheet">


    <script src="https://luxurypips.com/secure/assets/plugins/ionicons/ionicons/ionicons.suuqn5vt.js" type="module"
        crossorigin="true" data-resources-url="https://luxurypips.com/secure/assets/plugins/ionicons/ionicons/"
        data-namespace="ionicons"></script>
    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
    <style type="text/css"
        id="s./node_modules/css-loader/index.js!./node_modules/sass-loader/lib/loader.js!./package/src/animation.scss-0">
        /**
* @license
* Copyright Akveo. All Rights Reserved.
* Licensed under the MIT License. See License.txt in the project root for license information.
*/
        .eva-animation {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        .eva-infinite {
            animation-iteration-count: infinite;
        }

        .eva-icon-shake {
            animation-name: eva-shake;
        }

        .eva-icon-zoom {
            animation-name: eva-zoomIn;
        }

        .eva-icon-pulse {
            animation-name: eva-pulse;
        }

        .eva-icon-flip {
            animation-name: eva-flipInY;
        }

        .eva-hover {
            display: inline-block;
        }

        .eva-hover:hover .eva-icon-hover-shake,
        .eva-parent-hover:hover .eva-icon-hover-shake {
            animation-name: eva-shake;
        }

        .eva-hover:hover .eva-icon-hover-zoom,
        .eva-parent-hover:hover .eva-icon-hover-zoom {
            animation-name: eva-zoomIn;
        }

        .eva-hover:hover .eva-icon-hover-pulse,
        .eva-parent-hover:hover .eva-icon-hover-pulse {
            animation-name: eva-pulse;
        }

        .eva-hover:hover .eva-icon-hover-flip,
        .eva-parent-hover:hover .eva-icon-hover-flip {
            animation-name: eva-flipInY;
        }

        @keyframes eva-flipInY {
            from {
                transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
                animation-timing-function: ease-in;
                opacity: 0;
            }

            40% {
                transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
                animation-timing-function: ease-in;
            }

            60% {
                transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
                opacity: 1;
            }

            80% {
                transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
            }

            to {
                transform: perspective(400px);
            }
        }

        @keyframes eva-shake {

            from,
            to {
                transform: translate3d(0, 0, 0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translate3d(-3px, 0, 0);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translate3d(3px, 0, 0);
            }
        }

        @keyframes eva-pulse {
            from {
                transform: scale3d(1, 1, 1);
            }

            50% {
                transform: scale3d(1.2, 1.2, 1.2);
            }

            to {
                transform: scale3d(1, 1, 1);
            }
        }

        @keyframes eva-zoomIn {
            from {
                opacity: 1;
                transform: scale3d(0.5, 0.5, 0.5);
            }

            50% {
                opacity: 1;
            }
        }
    </style>
    <style type="text/css">
        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            box-sizing: content-box;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>
    <style type="text/css">
        @keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        @-moz-keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        @-webkit-keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        #jiCXNzJ-1600607701865 {
            outline: none !important;
            visibility: visible !important;
            resize: none !important;
            box-shadow: none !important;
            overflow: visible !important;
            background: none !important;
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity1) !important;
            -moz-opacity: 1 !important;
            -khtml-opacity: 1 !important;
            top: auto !important;
            right: 10px !important;
            bottom: 90px !important;
            left: auto !important;
            position: fixed !important;
            border: 0 !important;
            min-height: 0 !important;
            min-width: 0 !important;
            max-height: none !important;
            max-width: none !important;
            padding: 0 !important;
            margin: 0 !important;
            -moz-transition-property: none !important;
            -webkit-transition-property: none !important;
            -o-transition-property: none !important;
            transition-property: none !important;
            transform: none !important;
            -webkit-transform: none !important;
            -ms-transform: none !important;
            width: auto !important;
            height: auto !important;
            display: none !important;
            z-index: 2000000000 !important;
            background-color: transparent !important;
            cursor: auto !important;
            float: none !important;
            border-radius: unset !important;
            pointer-events: auto !important
        }

        #QsGvCzY-1600607701867.open {
            animation: tawkMaxOpen .25s ease !important;
        }
    </style>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=IBM+Plex+Sans:wght@700&family=Jost&family=Niconne&display=swap"
        rel="stylesheet">

</head>

<body class="main-body app sidebar-mini dark-theme sidebar-gone" onload="startTime()">

    <!-- Loader -->
    <div id="global-loader" class="dark-loader">
        <img src="loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- main-sidebar opened -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar sidebar-scroll ps">
        <div class="main-sidebar-header">
            <a class=" desktop-logo logo-light" href="index"
                style="font-weight: bold; color: white; font-family: 'IBM Plex Sans', sans-serif;"><img
                    style="width: auto; height: 45px;" src="../img/logo.png"></a>

        </div>
        <div class="main-sidebar-body circle-animation ">

            <ul class="side-menu circle">

                <li>
                    <h3 class="">
                        <center>

                            <script>
                                function startTime() {
                                    var today = new Date();
                                    var h = today.getHours();
                                    var m = today.getMinutes();
                                    var s = today.getSeconds();
                                    m = checkTime(m);
                                    s = checkTime(s);
                                    document.getElementById('txt').innerHTML =
                                        h + ":" + m + ":" + s + " GMT +2";
                                    var t = setTimeout(startTime, 500);
                                }
                                function checkTime(i) {
                                    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
                                    return i;
                                }
                            </script>
 



                            <div id="txt"></div>
                            Joined -<span style="text-transform: capitalize;"><?php echo $date_joined ?></span><br>
                        </center>
                    </h3>

                </li>

                <li class="slide">
                    <div style="" id="google_translate_element"></div>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="index">
                        <i class="side-menu__icon fas fa-chart-line"></i>
                        <span class="side-menu__label">
                            Dashboard</span>
                    </a>
                </li>
                <li class="slide">
                    <div id="google_translate_element"></div>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="profile">
                        <i class="side-menu__icon fa fa-desktop"></i>
                        <span class="side-menu__label">
                            My Account</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" href="deposit"><i
                            class="side-menu__icon fa fa-wallet"></i><span
                            class="side-menu__label">Fund Account</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" href="withdrawal"><i
                            class="side-menu__icon fa fa-dollar-sign"></i><span
                            class="side-menu__label">Withdrawal</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" href="invest"><i
                            class="side-menu__icon fa fa-bar-chart"></i><span
                            class="side-menu__label">Invest</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" href="investment-history.php"><i
                            class="side-menu__icon fa fa-briefcase"></i><span
                            class="side-menu__label">Invest History</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i
                            class="side-menu__icon fas fa-history"></i><span
                            class="side-menu__label">Transactions</span></a>
                    <ul class="slide-menu">

                        <li><a class="slide-item" href="deposit-history">Deposit History</a></li>
                        <li><a class="slide-item" href="withdraw-history">Withdrawal History</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="referrals.php"><i
                            class="side-menu__icon fa fa-link"></i><span
                            class="side-menu__label">Referral</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i
                            class="side-menu__icon fa fa-user "></i><span
                            class="side-menu__label">Account Settings</span></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="profile">Profile</a></li>
                        <li><a class="slide-item" href="profile-edit">Update Profile</a></li>
                        <li><a class="slide-item" href="profile-upload-cover">Upload Profile Image</a></li>
                        <li><a class="slide-item" href="profile-change-password">Change Password</a></li>
                    </ul>
                </li>
  

                <li class="slide">
                    <a class="side-menu__item" href="logout">
                        <i class="side-menu__icon fa fa-power-off"></i>
                        <span class="side-menu__label">Sign Out</span></a>
                </li>
            </ul>
        </div>
        <div class="ps__rail-x" style="left: 0px; top: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </aside> <!-- main-sidebar -->
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- Page main-header -->
        <div class="main-header sticky side-header nav nav-item sticky-pin fixed-header visible-title">
            <div class="container-fluid">
                <div class="main-header-left ">
                    <div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
                        <a class="open-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="eva eva-menu-outline header-icons">
                                <g data-name="Layer 2">
                                    <g data-name="menu">
                                        <rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect>
                                        <rect x="3" y="11" width="18" height="2" rx=".95" ry=".95"></rect>
                                        <rect x="3" y="16" width="18" height="2" rx=".95" ry=".95"></rect>
                                        <rect x="3" y="6" width="18" height="2" rx=".95" ry=".95"></rect>
                                    </g>
                                </g>
                            </svg></a>
                        <a class="close-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="eva eva-close-outline header-icons">
                                <g data-name="Layer 2">
                                    <g data-name="close">
                                        <rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect>
                                        <path
                                            d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z">
                                        </path>
                                    </g>
                                </g>
                            </svg></a>
                    </div>

                </div>
                <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="index"><?php echo $sitename ?></a>
                    </div>
                </div>
                <!-- GTranslate: https://gtranslate.io/ -->


<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>

 <select onchange="doGTranslate(this);"><option value="" style=" color:#575757;">Select Language</option><option value="en|af" style="color:#575757;">Afrikaans</option><option value="en|sq" style="color:#575757;">Albanian</option><option value="en|ar" style="color:#575757;">Arabic</option><option value="en|hy" style="color:#575757;">Armenian</option><option value="en|az" style="color:#575757;">Azerbaijani</option><option value="en|eu" style="color:#575757;">Basque</option><option value="en|be" style="color:#575757;">Belarusian</option><option value="en|bg" style="color:#575757;">Bulgarian</option><option value="en|ca" style="color:#575757;">Catalan</option><option value="en|zh-CN" style="color:#575757;">Chinese (Simplified)</option><option value="en|zh-TW" style="color:#575757;">Chinese (Traditional)</option><option value="en|hr" style="color:#575757;">Croatian</option><option value="en|cs" style="color:#575757;">Czech</option><option value="en|da" style="color:#575757;">Danish</option><option value="en|nl" style="color:#575757;">Dutch</option><option value="en|en" style="color:#575757;">English</option><option value="en|et" style="color:#575757;">Estonian</option><option value="en|tl" style="color:#575757;">Filipino</option><option value="en|fi" style="color:#575757;">Finnish</option><option value="en|fr" style="color:#575757;">French</option><option value="en|gl" style="color:#575757;">Galician</option><option value="en|ka" style="color:#575757;">Georgian</option><option value="en|de" style="color:#575757;">German</option><option value="en|el" style="color:#575757;">Greek</option><option value="en|ht" style="color:#575757;">Haitian Creole</option><option value="en|iw" style="color:#575757;">Hebrew</option><option value="en|hi" style="color:#575757;">Hindi</option><option value="en|hu" style="color:#575757;">Hungarian</option><option value="en|is" style="color:#575757;">Icelandic</option><option value="en|id" style="color:#575757;">Indonesian</option><option value="en|ga" style="color:#575757;">Irish</option><option value="en|it" style="color:#575757;">Italian</option><option value="en|ja" style="color:#575757;">Japanese</option><option value="en|ko" style="color:#575757;">Korean</option><option value="en|lv" style="color:#575757;">Latvian</option><option value="en|lt" style="color:#575757;">Lithuanian</option><option value="en|mk" style="color:#575757;">Macedonian</option><option value="en|ms" style="color:#575757;">Malay</option><option value="en|mt" style="color:#575757;">Maltese</option><option value="en|no" style="color:#575757;">Norwegian</option><option value="en|fa" style="color:#575757;">Persian</option><option value="en|pl" style="color:#575757;">Polish</option><option value="en|pt" style="color:#575757;">Portuguese</option><option value="en|ro" style="color:#575757;">Romanian</option><option value="en|ru" style="color:#575757;">Russian</option><option value="en|sr" style="color:#575757;">Serbian</option><option value="en|sk" style="color:#575757;">Slovak</option><option value="en|sl" style="color:#575757;">Slovenian</option><option value="en|es" style="color:#575757;">Spanish</option><option value="en|sw" style="color:#575757;">Swahili</option><option value="en|sv" style="color:#575757;">Swedish</option><option value="en|th" style="color:#575757;">Thai</option><option value="en|tr" style="color:#575757;">Turkish</option><option value="en|uk" style="color:#575757;">Ukrainian</option><option value="en|ur" style="color:#575757;">Urdu</option><option value="en|vi" style="color:#575757;">Vietnamese</option><option value="en|cy" style="color:#575757;">Welsh</option><option value="en|yi" style="color:#575757;">Yiddish</option></select><div id="google_translate_element2"><div class="skiptranslate goog-te-gadget" dir="ltr" style=""><div id=":0.targetLanguage"><select class="goog-te-combo" aria-label="Widget de traduction"><option value="">Sélectionner une langue</option><option value="fr">Français</option><option value="af">Afrikaans</option><option value="sq">Albanais</option><option value="de">Allemand</option><option value="am">Amharique</option><option value="ar">Arabe</option><option value="hy">Arménien</option><option value="as">Assamais</option><option value="ay">Aymara</option><option value="az">Azéri</option><option value="bm">Bambara</option><option value="eu">Basque</option><option value="bn">Bengali</option><option value="bho">Bhodjpouri</option><option value="be">Biélorusse</option><option value="my">Birman</option><option value="bs">Bosniaque</option><option value="bg">Bulgare</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinois (simplifié)</option><option value="zh-TW">Chinois (traditionnel)</option><option value="si">Cingalais</option><option value="ko">Coréen</option><option value="co">Corse</option><option value="ht">Créole haïtien</option><option value="hr">Croate</option><option value="da">Danois</option><option value="dv">Divéhi</option><option value="doi">Dogri</option><option value="es">Espagnol</option><option value="eo">Espéranto</option><option value="et">Estonien</option><option value="ee">Ewe</option><option value="fi">Finnois</option><option value="fy">Frison</option><option value="gd">Gaélique (Écosse)</option><option value="gl">Galicien</option><option value="cy">Gallois</option><option value="ka">Géorgien</option><option value="el">Grec</option><option value="gn">Guarani</option><option value="gu">Gujarati</option><option value="ha">Haoussa</option><option value="haw">Hawaïen</option><option value="iw">Hébreu</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hongrois</option><option value="ig">Igbo</option><option value="ilo">Ilocano</option><option value="id">Indonésien</option><option value="ga">Irlandais</option><option value="is">Islandais</option><option value="it">Italien</option><option value="ja">Japonais</option><option value="jw">Javanais</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="rw">Kinyarwanda</option><option value="ky">Kirghiz</option><option value="gom">Konkani</option><option value="kri">Krio</option><option value="ku">Kurde (Kurmandji)</option><option value="ckb">Kurde (Sorani)</option><option value="lo">Laotien</option><option value="la">Latin</option><option value="lv">Letton</option><option value="ln">Lingala</option><option value="lt">Lituanien</option><option value="lg">Luganda</option><option value="lb">Luxembourgeois</option><option value="mk">Macédonien</option><option value="mai">Maïthili</option><option value="ms">Malaisien</option><option value="ml">Malayalam</option><option value="mg">Malgache</option><option value="mt">Maltais</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mni-Mtei">Meitei (Manipuri)</option><option value="lus">Mizo</option><option value="mn">Mongol</option><option value="nl">Néerlandais</option><option value="ne">Népalais</option><option value="no">Norvégien</option><option value="or">Odia (Oriya)</option><option value="om">Oromo</option><option value="ug">Ouïgour</option><option value="uz">Ouzbek</option><option value="ps">Pachtô</option><option value="pa">Panjabi</option><option value="fa">Persan</option><option value="tl">Philippin</option><option value="pl">Polonais</option><option value="pt">Portugais</option><option value="qu">Quechua</option><option value="ro">Roumain</option><option value="ru">Russe</option><option value="sm">Samoan</option><option value="sa">Sanscrit</option><option value="nso">Sepedi</option><option value="sr">Serbe</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhî</option><option value="sk">Slovaque</option><option value="sl">Slovène</option><option value="so">Somali</option><option value="su">Soundanais</option><option value="sv">Suédois</option><option value="sw">Swahili</option><option value="tg">Tadjik</option><option value="ta">Tamoul</option><option value="tt">Tatar</option><option value="cs">Tchèque</option><option value="te">Telugu</option><option value="th">Thaï</option><option value="ti">Tigrigna</option><option value="ts">Tsonga</option><option value="tr">Turc</option><option value="tk">Turkmène</option><option value="ak">Twi</option><option value="uk">Ukrainien</option><option value="ur">Urdu</option><option value="vi">Vietnamien</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yorouba</option><option value="zu">Zoulou</option></select></div>Fourni par&nbsp;<span style="white-space:nowrap"><a class="VIpgJd-ZVi9od-l4eHX-hSRGPd" href="https://translate.google.com" target="_blank"><img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png" width="37px" height="14px" style="padding-right: 3px" alt="Google Traduction">Traduction</a></span></div></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
                <div class="main-header-right">
                    <div class="nav nav-item  navbar-nav-right ml-auto">
                        <button class="navbar-toggler navresponsive-toggler d-sm-none" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent-4"
                            aria-controls="navbarSupportedContent-4" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fe fe-more-vertical "></span>
                        </button>
                        <div class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user" href="">

                                <img alt="" src="uploads/<?php echo $profile_photo ?>">

                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
                                <div class="main-header-profile header-img">
                                    <h6> </h6><span>
                                        <?php echo $plan ?> </span>
                                </div>
                                <a class="dropdown-item" href="profile"><i class="far fa-user"></i> My Profile</a>
                                <a class="dropdown-item" href="profile-edit"><i class="far fa-edit"></i> Edit
                                    Profile</a>
                                <a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                            </div>
                        </div>
                        <div class="dropdown main-header-message right-toggle">
                            <a class="nav-link " data-toggle="sidebar-right" data-target=".sidebar-right">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /main-header -->

        <!-- Page mobile-header -->
        <div class="responsive main-header fixed-header visible-title">
            <div
                class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark d-sm-none ">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user" href="profile">
                                <img alt="" src="uploads/<?php echo $profile_photo ?>"></a>
                            <div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
                                <div class="main-header-profile header-img">

                                    <h6> </h6><span> </span>
                                </div>
                                <a class="dropdown-item" href="profile"><i class="far fa-user"></i> My Profile</a>
                                <a class="dropdown-item" href="profile-edit"><i class="far fa-edit"></i> Edit
                                    Profile</a>
                                <a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- mobile-header -->