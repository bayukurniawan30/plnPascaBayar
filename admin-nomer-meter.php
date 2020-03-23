<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Nomer Meter Pelanggan</title>
  </head>
  <body>
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
          <div class="uk-container" uk-height-viewport>

              <div class="uk-flex-center" uk-grid>
                  <div class="uk-width-large uk-animation-slide-bottom-small bind-animation">
                      <div class="uk-card uk-margin uk-card-default uk-card-body" style="position: relative; top: 50%;">
                          <h3 class="uk-card-title uk-text-bold uk-text-center uk-margin-remove-bottom">MASUKAN</h3>
                          <p class="uk-text-center uk-margin-remove-top ">Masukan Nomer Meter</p>

                          <form id="form-sign-in" method="post" action="action/admin-nomer-action.php">
                              <div class="uk-margin">
                                  <div class="uk-inline uk-width-1-1">
                                      <span class="uk-form-icon" uk-icon="icon: bolt"></span>
                                      <input class="uk-input" type="tel" placeholder="Nomer Meter Pelanggan" name="nomor_kwh" required>
                                  </div>
                              </div>

                              <div class="uk-margin">
                                  <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Masuk</button>
                              </div>
                          </form>

                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
  </body>
</html>
