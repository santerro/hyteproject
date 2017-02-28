<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="tyyli.css" rel="stylesheet">
  </head>
  <body class="vaaleanruskea">
    <div id="wrapper">
      <header></header>
      <nav id="top">
        <ul>
          <li><a class="sininen" id="menuNappi" href="#">Menu &#9776;</a></li>
        </ul>
        <ul id="menu">
          <li><a class="sininen nappi" href="index.html">Etusivu</a></li>
          <li><a class="sininen nappi" href="harjoitukset.html">Harjoitukset</a></li>
          <li><a class="sininen nappi" href="yhteystiedot.html">Yhteystiedot</a></li>
          <li><a class="sininen nappi" href="login.php">Oma</a></li>
        </ul>
      </nav>
      <div id="frm">
      <h3>Create an account</h3>
    <form action="process2.php" method="post">
      
      <input type="text" placeholder="Username" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      
      <input type="submit" value="Register" name="register" id="btn" />
    </form>
    <a href="login.php">Login</a>
      </div>
      <footer class="sininen">&#169; Fuutteri</footer>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script>
    $(function(){
      $('#menuNappi').click(function(evt){
        $('#menu').slideToggle(400);
      });
    });
  </script>
  </body>
</html>