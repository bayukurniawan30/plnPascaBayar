<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Bank</title>
  </head>
  <body>
        <div class="uk-child-width-1-2@s" uk-grid>
                <div class="uk-background-fixed uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url(img/background.jpg); width:210vh; height:100vh;">

                  <div class="uk-position-center uk-animation-fade" uk-margin>
                    <p style="font-family: Poppins-SemiBold; font-size:60px; color:white;"class="uk-animation-slide-bottom uk-h1"> SELAMAT DATANG </p>

                    <div style="position:relative; top:120%;"class="uk-position-center">
                      <button style="font-size: 16px; font-family: Poppins-SemiBold; border-radius: 15.5px; margin-right:20px;" class="uk-button-large uk-button-primary uk-animation-slide-bottom-small bind-animation tombol" onclick="window.location.href='login-bank.php'">LOGIN</button>
                      <button onclick="window.location.href='register-bank.php'"style="font-size: 16px; font-family: Poppins-SemiBold; border-radius: 15.5px;" class="uk-button-large uk-button-secondary uk-animation-slide-bottom-small bind-animation tombol" type="submit">REGISTER</button>
                    </div>

                  </div>
                </div>
  </body>
</html>
