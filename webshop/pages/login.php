<!DOCTYPE html>
<html>
  <head>
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>

  <div class="content">
    <form name="login" method="POST" enctype="multipart/form-data" action="">
      <p id="page_title">Login</p>
        <input required type="email" name="email" placeholder="example@gmail.com">
        <input required type="password" name="password" placeholder="******">
      <div class="icon_container">
        <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
      </div>

      <p>No account yet? Register <a href="../register/register.php">here!</a></p>
      <?php
      if(isset($_POST['submit'])) {
        $note = "";
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        try {
          $sql = "SELECT * FROM client WHERE email = ?";
          $stmt = $connection->prepare($sql);
          $stmt->execute(array($email));
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          if($result) {
            $passindb = $result['password'];
            $role = $result['role'];
            if(password_verify($password, $passindb)) {
              $_SESSION['ID'] = session_id();
              $_SESSION['USER_ID'] = $result['ID'];
              $_SESSION['USERNAME'] = $result['USERNAME'];
              $_SESSION['EMAIL'] = $result['EMAIL'];
              $_SESSION['STATUS'] = 'ACTIVE';
              $_SESSION['ROLE'] = $role;

            if($role == 0) {
              echo "<script>location.href='index.php?page=webshop;</script>'";
            } elseif ($role == 1) {
              echo "<script>location.href='index.php?page=albums;</script>'";
            } else {
              $note = "No access<br>";
            }

            } else {
              $note = "Try again!<br>";
            }
            } else {
              $note = "Try again!<br>";
            }
          } catch(PDOException $e) {
              echo $e->getMessage();
          }
            echo "<div id='note'>$note</div>";
            }


      ?>

  </body>
</html>
