<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Jomolhari' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Homemade Apple' rel='stylesheet'>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/Customize-Search-Bar.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--Date picker in booking page-->
    <!--End of Date picker in booking page-->
    <nav class="navbar navbar-expand navbar-light">
        <button id="Hamburger-icon"><i class="Navbar-icons fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item Home-Logo">
                    <a class="" href="<?= BASEURL; ?>/Home"><img src="https://img.icons8.com/doodle/48/000000/taxi--v1.png"/> Yorkshire</a>
                </li>
            </ul>

            <ul class="nav-item ml-auto">
              <a class="nav-link " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-user-circle" style="color: #000; margin-top:16px; font-size:21px;"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?php
                if(isset($_SESSION['loggedin'])){
                  echo '<button id="Top-Nav-Button"><a class="Top-Nav-Button-Link" href="'.BASEURL.'/Authenticate/UserLogout">Log out</a> </button>';
                }
                else{
                  echo '<button type="button" id="Top-Nav-Button" data-toggle="modal" data-target="#staticBackdrop">Login In</button>';
                }
                 ?>
              </div>
            </ul>
        </div>
    </nav>
  </head>

  <!-- Modal Login-->
  <div class="modal fade modal-center" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!--Put Logo Here-->
          <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL;  ?>/Authenticate/UserLogin" method="post">
            <div class="container">
              <!--
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" required aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>-->
                <!--<label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>-->
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="name" required>
              </div>
                <!--<label for="Username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="name" required>-->
              <div class="form-group">
                <label for="psw">Password</label>
                <input type="password" class="form-control" name="psw" required>
              </div>
                <!--<label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>-->
              <!--
              <div class="form-group">
                <label for="psw-repeat">Repeat Password</label>
                <input type="password" class="form-control" name="psw-repeat" required>
              </div>-->
                <!--<label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>-->
              <!--
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="Male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="Male">Female</label>
              </div>-->
              <!--<input type="radio" id="male" name="gender" value="male">
              <label for="male">Male</label><br>
              <input type="radio" id="female" name="gender" value="female">
              <label for="female">Female</label><br>-->
            <!--<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>-->
            <div class="modal-footer">
              <p>Do not own an account? Click here for</p>
              <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#staticBackdropregister" data-dismiss="modal">
                        Sign Up
            </div>
            <div class="modal-footer clearfix">
              <button type="button" class="btn btn-secondary cancelbtn" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Log In</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!--Modal Sign Up-->
  <div class="modal fade" id="staticBackdropregister" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!--Put Logo Here-->
          <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL;  ?>/Authenticate/UserRegister" method="post">
            <div class="container">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" required aria-describedby="emailHelp">
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
              </div>
                <!--<label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>-->
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="name" required>
              </div>
                <!--<label for="Username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="name" required>-->
              <div class="form-group">
                <label for="psw">Password</label>
                <input type="password" class="form-control" name="psw" required>
              </div>
                <!--<label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>-->

              <div class="form-group">
                <label for="psw-repeat">Repeat Password</label>
                <input type="password" class="form-control" name="psw-repeat" required>
              </div>
                <!--<label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>-->
              <!--
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="Male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="Male">Female</label>
              </div>
              -->
              <!--<input type="radio" id="male" name="gender" value="male">
              <label for="male">Male</label><br>
              <input type="radio" id="female" name="gender" value="female">
              <label for="female">Female</label><br>-->
            <!--<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>-->
            <div class="modal-footer">
              <p>Ownned an account? Click here for</p>
              <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-dismiss="modal" data-target="#staticBackdrop">
                        Login In
                      </button>
            </div>
            <div class="modal-footer clearfix">
              <button type="button" class="btn btn-secondary cancelbtn" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary signupbtn">Sign up</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <?php Flasher::flash(); ?>
