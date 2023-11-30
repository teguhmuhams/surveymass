<div class="container text-center">
  <div class="row" id="register">
    <div class="col" id="gambar">
      <img src="../img/signUp.png" alt="" />
    </div>
    <div class="col" id="signUp">
      <form id="signUp">
        <h1>Sign Up</h1>
        <div class="mb-3">
          <input type="text" class="form-control" id="inputName" placeholder="Fullname" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="inputId" placeholder="Username" aria-describedby="userNameHelp" />
        </div>
        <div class="mb-3">
          <select id="inputJenisKelamin" class="form-control">
            <option selected>Jenis Kelamin</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
          </select>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" id="inputEmail" placeholder="Email" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="inputPassword" placeholder="Password" />
        </div>
        <button id="btn-signUp" type="submit" class="btn btn-primary">
          Sign Up
        </button>
        <p>Have an account? <a href="<?= BASE_URL . '?page=login' ?>">Login</a></p>
      </form>
    </div>
  </div>
</div>
<style>
  #register {
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

  #signUp {
    display: flex;
    justify-content: center;
    filter: drop-shadow(0px 4px 24px rgba(0, 0, 0, 0.1));
  }

  #signUp form {
    background-color: #ffffff;
    padding: 5vw 1vw;
    margin-top: 1.4vw;
    padding-bottom: 1vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 35vw;
    height: 80vh;
    border-radius: 10px;
  }

  #signUp .form-control {
    color: #686b6f;
  }

  #signUp h1 {
    margin-bottom: 1vw;
    font-family: "Inter";
    font-style: normal;
    font-weight: 700;
    font-size: 33px;
    line-height: 30px;

    color: #1e1e1e;
  }

  #signUp p {
    margin-bottom: 1vw;
    font-family: "Inter";
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 40px;
    color: #1e1e1e;
  }

  #signUp a {
    color: #536DFE;
  }

  #signUp a:hover {
    color: #6f83f8;
  }

  #signUp img {
    width: 14%;
  }

  #signUp form .mb-3 {
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


  #signUp form #btn-signUp:hover {
    background: #ffffff;
    color: #536DFE;
    border: 1px solid #536DFE;
  }

  #signUp form #btn-signUp {
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