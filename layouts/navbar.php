<nav class="row navbar navbar-expand-lg navbar-light bg-white">
      <a href="#" class="navbar-brand">
        <img src="frontend/images/logoo.jpg" alt="Logo NODSILL" />
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav ml-auto mr-3">
          <li class="nav-item mx-md-2">
            <a href="#" class="nav-link active">Home</a>
          </li>
          <li class="nav-item mx-md-2">
            <a href="#" class="nav-link">Produk</a>
          </li>
          <li class="nav-item mx-md-2">
            <a href="#" class="nav-link">Profil</a>
          </li>
        </ul>

        <!-- Mobile Button -->
        <form action="login.php" class="form-inline d-sm-block d-md-none">
          <button class="btn btn-login my-2 my-sm-0 px-4">Login</button>
        </form>

        <!-- Desktop Button -->
        <form action="login.php" class="form-inline my-2 my-lg-0 d-none d-md-block">
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
            Login
          </button>
        </form>
      </div>
    </nav>