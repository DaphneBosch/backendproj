function logout() {
  var logout = confirm("Are you sure to log out?");
  if(logout) {
    location.href="index.php?page=logout";
  }
}
