<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelin || {{ $title }}</title>

    <link rel="stylesheet" href="/css/style.css">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Link -->


    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Font Awesome Cdn -->


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- Google Fonts -->
</head>
<body>
    





    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html" id="logo"><span>T</span>ravelin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto"></ul>
            
          @auth
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3">Keluar <span data-feather="log-out"></span></button>
          </form>
          @else 
          <form class="d-flex">
            {{-- <input class="form-control me-2" type="text" placeholder="Search"> --}}
            <button class="nav-link"  href="car-finder-home.html#signin-modal" data-bs-toggle="modal"  type="button">Login</button>

          </form>
          @endauth
            
          </div>
        </div>
      </nav>

      {{--  modal --}}
      <div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content bg-dark border-light">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-6 border-end-md border-light p-4 p-sm-5">
                            <h2 class="h3 text-light mb-4 mb-sm-5">Halo! <br>Selamat Datang.</h2><img
                                class="d-block mx-auto" src="{{ asset('img/signin/signin-dark.svg') }}"
                                width="344" alt="Illustartion">
                            {{-- <div class="text-light mt-4 mt-sm-5"><span class="opacity-60">Don't have an account?
                                </span><a class="text-light" href="car-finder-home.html#signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Sign up here</a></div> --}}
                        </div>
                        <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">

                            <form class="needs-validation" method="POST" action="/login">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label text-light mb-2" for="signin-email">Email</label>
                                    <input class="form-control form-control-light" type="email" id="signin-email"
                                        name="email" placeholder="Masukkan email" required>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-label text-light mb-0"
                                            for="signin-password">Password</label>
                                    </div>
                                    <div class="password-toggle">
                                        <input class="form-control form-control-light" type="password"
                                            id="signin-password" name="password" placeholder="Masukkan password"
                                            required>                            
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg w-100" type="submit">Login</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
