<?php
include ("./includes/header.php");
include ("./includes/connection.php");
?>

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Lorem ipsum dolor sit.</h1>
        <p class="col-lg-10 fs-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus obcaecati quod inventore, quos placeat aspernatur.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
      <?php
          if(isset($_SESSION["error"])) {
              echo '<div class="alert alert-danger" role="alert">' . $_SESSION["error"] . '</div>';

              unset($_SESSION["error"]);
          }
      ?>
      <h3> Login as Existing Customer </h3>
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" name="formLogin" method="POST" action="../login_php.php">



          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="txtEmail"  autocomplete="off">
            <label for="floatingInput">Email address</label>
          </div>

          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="txtPassword">
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me" name="chkRemember"> Remember me
            </label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <hr class="my-4">
          <a href="register.php" class="text-body-secondary">Create a new account</a>
        </form>
      </div>
    </div>
</div>
