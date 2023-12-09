<div class="container text-center">
  <div class="row" id="Login">
    <div class="col" id="gambar">
      <img src="/img/login.png" alt="" />
    </div>
    <div class="col" id="login">
      <form method="post" action="">
        <div class="container w-75">
          <h1>Login</h1>
          <p>Use your SurveyMass account</p>
          <?php if (isset($_SESSION['message'])) : ?>
            <?= $_SESSION['message'] ?>
            <?php unset($_SESSION['message']);
            ?>
          <?php endif; ?>
          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" />
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" />
          </div>
          <button type="submit" class="btn btn-primary w-100">
            Login
          </button>
          <p>Create account? <a href="<?= BASE_URL . '/register' ?>">Sign Up</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
  #Login {
    display: flex;
    justify-content: center;
    flex-direction: row;
    align-items: center;
    height: 100vh;
  }

  #gambar {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 50vw;
  }

  #gambar img {
    width: 70%;
  }

  #login {
    display: flex;
    justify-content: center;
    filter: drop-shadow(0px 4px 24px rgba(0, 0, 0, 0.1));
  }

  #login form {
    background-color: #ffffff;
    padding: 5vw 1vw;
    margin-top: 1.4vw;
    padding-bottom: 1vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 35vw;
    height: 60vh;
    border-radius: 10px;
  }

  #login .form-control {
    color: #686b6f;
  }

  #login h1 {
    margin-bottom: 1vw;
    font-family: "Inter";
    font-style: normal;
    font-weight: 700;
    font-size: 33px;
    line-height: 30px;
    color: #1e1e1e;
  }

  #login p {
    margin-bottom: 1vw;
    font-family: "Inter";
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 40px;
    color: #1e1e1e;
  }

  #login a {
    color: #536DFE;
  }

  #login a:hover {
    color: #6f83f8;
  }

  #login img {
    width: 14%;
  }

  #login form .mb-3 {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background: linear-gradient(0deg, #ffffff, #ffffff), #ffffff;
    border: 1px solid rgba(10, 10, 10, 0.1);
    border-radius: 10px;
    font-size: 16px;
    color: rgba(30, 30, 30, 0.7);
  }
</style>