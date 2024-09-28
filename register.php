 
<html>

<head>
    <title>Volandia - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
        
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Volandia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../">Home</a>
                        </li>
                    </ul>
                    <?php 
           include "utils/navbarLoggato.php";
           ?>
                </div>
            </div>
        </nav>

        
    </header >
    <div class="bg-tertiary">
      <?php 
      if(isset($_COOKIE["errore"])){
        echo '<div class="alert alert-danger">
              <strong>Errore!</strong> '. $_COOKIE["errore"] . '
            </div>
      <div class="container" >';
      setcookie("errore", "", time() - 60);
      }
      ?>
      
          
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Registrazione</h5>
                <form action="utils/registrazione.php" method="POST">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput4" placeholder="" name="nome" required>
                    <label for="floatingInput4">Nome</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput3" placeholder="" name="cognome" required>
                    <label for="floatingInput3">Cognome</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="username" required>
                    <label for="floatingInput">Username</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="" name="password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Registrati</button>
                  </div>
                  <hr class="my-4">
                  
                </form>
                <div class="d-grid mb-2">
                    <a href="login.php" class="btn btn-secondary btn-login text-uppercase fw-bold" >
                       ho gia un account
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top mt-auto" style="background-color: #e3f2fd;">
        <div class="align-items-center mx-auto">
            <span class="text-muted">&copy; Volandia 2049</span>
        </div>
    </footer>
</body>

</html>