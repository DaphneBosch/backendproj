<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html"; charset="utf-8">
    <title>Webshop</title>
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/logout.js"></script>
  </head>
  <body>

  <div class="header">
    <div class="icon_container">
      <div class="icon">&#x266c;</div>
      </div>

      <?php
      if(isset($_SESSION['ID']) && $_SESSION['STATUS'] == 'ACTIVE') {
        if($_SESSION['ROLE'] == 0) {
      ?>

      <div class="user">
        <p id="user">User:
        <?php echo $_SESSION['USERNAME'];?>
        </p>
      </div>

      <div class="nav">
        <ul>
          <li onclick="location.href='index.php?page=profile_edit'">Account</li>
          <li onclick="location.href='index.php?page=webshop'">Webshop</li>
          <li onclick="location.href=logout()">Logout</li>
        </ul>
      </div>
    <?php } elseif($_SESSION['ROLE'] == 1) {?>
      <div class="user">
        <p id="user">Admin:
        <?php echo $_SESSION['USERNAME'];?>
        </p>
      </div>
      <div class="nav-admin">
        <ul>
          <li onclick="location.href='index.php?page=albums'">Albums</li>
          <li onclick="location.href='index.php?page=clients'">Clients</li>
          <li onclick="location.href='index.php?page=weborders'">Weborders</li>
          <li onclick="location.href='index.php?page=rapport'">Rapport</li>
          <li onlcick="logout()">Logout</li>
        </ul>
      </div>

      <?php
        }
      }
      ?>
  </body>
</html>
