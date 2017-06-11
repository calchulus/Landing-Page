<?php
// Change database parameters !
// also don't forget to change the social media links
// you can also customize the background,logo and fonts with just small modifications 
// you can set a mail method instead of entering into a database ! 

$result = "";
$emailError = "";
if(isset($_POST['submit'])){
    if(!$_POST['email']){
      $emailError = '<div class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;Please enter a valid email address!</div>';
    }
    else{
      DEFINE ('DB_USER', '*****');
      DEFINE ('DB_PASSWORD', '****');
      DEFINE ('DB_HOST', 'localhost');
      DEFINE ('DB_NAME', 'countdown');
      $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      OR die('Could not connect to MySQL: ' .
      mysqli_connect_error());

      $query = "INSERT INTO emails (id,email,time) VALUES (NULL,?,NOW())";
      $stmt = mysqli_prepare($dbc, $query);
      $email_add = $_POST['email'];
      mysqli_stmt_bind_param($stmt, "s", $email_add);
      mysqli_stmt_execute($stmt);
      $affected_rows = mysqli_stmt_affected_rows($stmt);
      if($affected_rows == 1){
          $result = '<div class="text-success"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;Thank You ! I\'ll keep you updated !</div>';
      }
      elseif ($affected_rows!=1) {
          $result = '<div class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Oops! We have an error ! Please try again :(</div>';
      }

      mysqli_stmt_close($stmt);
      mysqli_close($dbc);
    }

}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
</head>
  <body>
    <section id="logo">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="img/logo2.png" alt="logo" class="img-fluid"/>
          </div>
        </div>
      </div>
    </section>

    <section id="intro">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Working on it, will be ready to launch in..</p>
          </div>
        </div>
      </div>
    </section>

    <section id="counter">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="countdown">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="icons">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <ul class="list-inline">
              <a href="https://github.com/voraparth1337" target="blank"><li class="list-inline-item"><i class="fa github fa-github-square fa-4x" aria-hidden="true"></i></li></a>
              <a href="https://twitter.com/parth2351" target="blank"><li class="list-inline-item"><i class="fa twitter fa-twitter-square fa-4x" aria-hidden="true"></i></li></a>
              <a href="https://www.linkedin.com/in/parth-vora-1694a0a7/" target="blank"><li class="list-inline-item"><i class="fa linkedid fa-linkedin-square fa-4x" aria-hidden="true"></i></li></a>
              <a href="http://steamcommunity.com/id/Parth007/" target="blank"><li class="list-inline-item"><i class="fa steam fa-steam-square fa-4x" aria-hidden="true"></i></li></a>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="signup">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <form class="form-inline" method="post" action="#signup" role="form">
               <input class="form-control" type="email" name="email" placeholder="Email address">
               <button type="submit" name="submit" class="btn">Find Out More</button>
              </form>
              <div class="message">
                <?php echo $emailError; ?>
                <?php echo $result; ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>





    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdown.js"></script>
    <script type="text/javascript">
          $(function() {
        $('.countdown').countdown({
            date: "February 28, 2018 15:03:26"
        });
      });
    </script>
  </body>
</html>
