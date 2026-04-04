<?php  
session_start();
include "../config/db.php";
include "../config/config.php";
include "../config/functions.php";


$fname = $lname = $currency = $email = $password = $phone = $country = $occupation = "";

$msg = "";
$err = "";

  if (isset($_GET['ref'])) {
    $ref_user = ucwords($_GET['ref']);

  }else{
    $ref_user = "";
  }

  if (isset($_POST['signup'])) {
      
      if(empty(text_input($_POST["fname"]))){
          $err = "Please enter first name.";     
      }else{
          $fname = text_input($_POST["fname"]);
      }

      if(empty(text_input($_POST["lname"]))){
          $err = "Please enter last name.";     
      }else{
          $lname = text_input($_POST["lname"]);
      }

      // if(empty(text_input($_POST["currency"]))){
      //       $err = "Please enter currency.";     
      //   }else{
      //       $currency = text_input($_POST["currency"]);
      //   }

      // if(empty(text_input($_POST["phone"]))){
      //     $err = "Please enter Phone number.";     
      // }else{
      //     $phone = text_input($_POST["phone"]);
      // }


      // if(empty(text_input($_POST["country"]))){
      //     $err = "Please enter Country";     
      // }else{
      //     $country = text_input($_POST["country"]);
      // }

      // if(empty(text_input($_POST["occupation"]))){
      //     $err = "Please enter occupation";     
      // }else{
      //     $occupation = text_input($_POST["occupation"]);
      // }
      

      if(empty(text_input($_POST["email"]))){
          $err = "Please enter an email.";
      } else{
          // Prepare a select statement
          $sql = "SELECT id FROM users WHERE email = ?";
          
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "s", $param_email);
              
              // Set parameters
              $param_email = trim($_POST["email"]);
              
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  /* store result */
                  mysqli_stmt_store_result($stmt);
                  
                  if(mysqli_stmt_num_rows($stmt) == 1){
                      $err = "This email is already taken.";
                  } else{
                      $email = text_input($_POST["email"]);
                  }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }
           
          // Close statement
          mysqli_stmt_close($stmt);
      }

      if(empty(text_input($_POST["password"]))){
          $err = "Please enter a password.";     
      } elseif(strlen(text_input($_POST["password"])) < 6){
          $err = "Password must have atleast 6 characters.";
      }elseif (text_input($_POST['password']) != text_input($_POST['password_confirmation'])) {
          $err = "Passwords do not match";
      } else{
          $password = text_input($_POST["password"]);
      }

      if (empty($err)) {
        $referral = text_input($_POST['ref']);
        $pin = '1234567890';
        $pin = str_shuffle($pin);
        $pin = strlen($pin) != 6 ? substr($pin, 0, 6) : $pin;
        
        $refcode = 'QWERTYUIOPLKJHGFDSAZXCVBNM1234567890';
        $refcode = str_shuffle($refcode);
        $refcode = strlen($refcode) != 6 ? substr($refcode, 0, 6) : $refcode;

        $currency = "$";

          // $query = "INSERT INTO users (fname, email, password, phone, country, currency, pin, referral,occupation, refcode) VALUES ('$fname', '$email', '$password', '$phone', '$country', '$currency', '$pin', '$referral', '$occupation', '$refcode' ) ";
         $query = "INSERT INTO users (fname, lname, email, password, currency, refcode, referral) VALUES ('$fname', '$lname', '$email', '$password', '$currency', '$refcode', '$referral' ) ";
          $save = mysqli_query($link, $query);

          if ($save) {

            $_SESSION['USERLOGIN'] = $email;

            $subject = "Welcome Message";
            $body = "<strong>Hi ".$fname." ".$lname." </strong> <p>Welcome to ".$sitename." Investment Programme. We are committed to giving you the best professional financial services to see you achieve your goals. </p> <p>We wish you the best of ".$sitename." experience. Rest assured we're here if you have any questions, drop us a line at ".$sitemail." or contact the live support team on the website. </p> ";

            sendMail($email, $fname, $subject, $body);

            $asubject = "NEW USER REGISTRATION";
            $abody = "A new user with registered name - ".$fname." ".$lname.", email - ".$email.".";

            sendAdminMail($sitemail, "Admin", $asubject, $abody);

            echo "<script>window.location.href = '../dashboard/index' </script>";
          }else{
            $err = mysqli_error($link);
          }

          mysqli_close($link);
      }

  }
?>

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



<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $sitename ?>">
    <meta name="keywords" content="<?php echo $sitename ?>">
    <meta name="author" content="<?php echo $sitename ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#F4871E" />
    <!-- Site Properties -->
    <title>Sign Up - <?php echo $sitename ?>  </title>
    <!-- Critical preload -->
    <link rel="preload" href="../js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="../css/vendors/uikit.min.css" as="style">
    <link rel="preload" href="../css/style.css" as="style">
    <!-- Icon preload -->
    <link rel="preload" href="../fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="../fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <!-- Font preload -->
    <link rel="preload" href="../fonts/inter-v2-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="../fonts/inter-v2-latin-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="../fonts/inter-v2-latin-700.woff2" as="font" type="font/woff2" crossorigin>
    <!-- Favicon and apple icon -->
    <link rel="shortcut icon" href="favicon.html" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.html">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/vendors/uikit.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <main>
        <!-- section content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <div class="uk-container uk-container-expand">
                <div class="uk-grid" data-uk-height-viewport="expand: true">
                    <div class="uk-width-3-5@m uk-background-cover uk-background-center-right uk-visible@m uk-box-shadow-xlarge" style="background-image: url(../img/in-signin-image.jpg);"></div>
                    <div class="uk-width-expand@m uk-flex uk-flex-middle">
                        <div class="uk-grid uk-flex-center">
                            <div class="uk-width-3-5@m">
                                <div class="in-padding-horizontal@s">
                                    <!-- logo begin -->
                                    <a class="uk-logo" href="../index.html">
                                        <img src="../img/logo.png" data-src="img/logo.png" alt="logo" data-uk-img>
                                    </a>
                                    <!-- logo end -->
                                    <p class="uk-text-lead uk-margin-top uk-margin-remove-bottom">Create your <?php echo $sitename ?>   account</p>
                                    <div style="color:red;font-weight: bold;"><?php echo $err ?></div>
                                  <!-- login form begin -->
                                   <form class="uk-grid uk-form" action="register.php" method="post"  >
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" type="text" name="fname" id="fname" size="30" placeholder="Your First Name *" required>
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" type="text" name="lname" id="lname" size="30" placeholder="Your Last Name *" required>
                                        </div>
                          <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-envelope fa-sm"></span>
                                            <input class="uk-input uk-border-rounded"  type="email" name="email" id="email" size="30" placeholder="Your Email *" required>
                                        </div>
                          <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" type="password" name="password" id="pwwd" size="30" placeholder="Enter Password *" required>
                                        </div>
                          <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" type="password" name="password_confirmation" id="cpwwd" size="30" placeholder="Repeat Password *" required>
                                        </div>
                                        <div class="uk-margin-small uk-width-auto uk-text-small">
                                            <label><input class="uk-checkbox uk-border-rounded" type="checkbox"> I accept and agree with the terms of the <a href="#">User Agreement</a></label>
                                        </div>
                                      <input type="hidden" name="ref" value="<?php echo $ref_user ?>" >

                                        <div class="uk-margin-small uk-width-1-1">
                                            <button class="uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left" type="submit" name="signup">Sign Up</button>
                                        </div>
                                    </form>
                                    <!-- login form end -->
                                     <p class="uk-text-small uk-margin-remove-top uk-margin-medium-bottom">Do you have an account? <a href="login.php">Login here</a></p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        


    </main>
    <!-- Javascript -->
    <script src="../js/vendors/uikit.min.js"></script>
    <script src="../js/vendors/blockit.min.js"></script>
    <script src="../js/config-theme.js"></script>
</body>

</html>