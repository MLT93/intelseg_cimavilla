<!DOCTYPE html>
<html lang="es">

<?php
require_once("html_css_modules/head/head.html");
?>

<body>
  <?php
  require_once("html_css_modules/header/header.html");
  require_once("html_css_modules/nav/nav.html");

  /**
   * 
   */

  var_dump($users);
  // require_once("html_css_modules/login/login.html");
  ?>
  <form action="/intelseg_cimavilla/login/check/" method="post" target="_self">

    <label for="email">EMAIL</label>
    <input type="email" name="email" id="email" />

    <label for="pass">PASSWORD</label>
    <input type="password" name="pass" id="pass" />

    <!-- <div id="imgcaptcha">
    <img src="./assets/img/captcha_login_register.php" />
  </div>
  <input type="text" name="captcha" id="captcha" /> -->

    <input type="submit" name="check_user" value="LOG IN" />
  </form>
</body>

</html>
