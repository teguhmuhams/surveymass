<div class="container text-center">
  <div class="row" id="Login">
    <div class="col" id="gambar">
      <img src="/img/login.png" alt="" />
    </div>
    <div class="col" id="login">
      <form method="post" action="">
        <h1>Login</h1>
        <p>Use your SurveyMass account</p>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" />
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" />
        </div>
        <button id="btn-login" type="submit" class="btn btn-primary">
          Login
        </button>
        <p>Create account?<a href="<?= BASE_URL . '?page=register' ?>">Sign Up</a></p>
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
    width: 25vw;
    font-family: "Inter";
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    color: rgba(30, 30, 30, 0.7);
  }


  #login form #btn-signUp:hover {
    background: #ffffff;
    color: #536DFE;
    border: 1px solid #536DFE;
  }

  #login form #btn-signUp {
    margin: 0;
    background-color: #536DFE;
    width: 25vw;
    font-family: "Inter";
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    color: #ffffff;
    background: linear-gradient(0deg, #536DFE, #536DFE), #536DFE;
    border: 1px solid #bbbbbb;
    border-radius: 10px;
  }
</style>