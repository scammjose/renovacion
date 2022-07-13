<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Renovacion</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">

<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
</head>

<body>
    <header class="" style="height:80px; background-color: #fff;">
      <nav class="navbar navbar-expand-lg" style="padding: 10px 0px;">
        <div class="container">
          <a class="navbar-brand" href="" > <img src="assets/images/site1.jpg" alt="">
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href=""></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <section class="text-center">
      <div class="card mx-4 mx-md-5 shadow-5-strong" style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
            ">
        <div class="card-body py-5 px-md-5">

          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <!-- Equipos -->
              <h2>Duración de renovacion</h2>
              <br>Por favor elija las horas que quiera que dure su renovacion</br>
     
              <form action="{{route('renovar')}}" method="POST">
                @csrf
                <div class="form-check">
                  <input class="form-check-input" value="2" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">2 horas</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="3" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                  <label class="form-check-label" for="flexRadioDefault2">3 horas</label>
                </div>
                <!-- Boton de Renovación -->
                <button type="submit" class="btn btn-primary btn-block mb-4" id="insertdata" style="padding: 1.000rem 0.75rem;">Renovación</button>
              </form>
      
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalAgregar" aria-hidden="" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Tus equipos son:</h5>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            <span style="cursor: pointer" class="material-symbols-outlined" data-dismiss="modal">close</span>
          </div>
          <div class="modal-body">
            <div class="col-md-8 mb-4">
              <div class="form-outline">
            
                  @forelse ($data as $item)
                  <p>{{$item->title}}</p>
                  @empty <p>No tienes equipos disponibles</p>
                  @endforelse
                 
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="form-outline">
                <button type="submit" class="btn btn-primary btn-block mb-4" id="form-equipo" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $( document ).ready(function() {
      $('#modalAgregar').modal('toggle')
    });
    </script>
   
   {{-- <script>
      $.ajax({
        url: "{{ route('renovar') }}",
        type: "POST",
        data: {
          // _token: "{{ csrf_token() }}",
          matricula: $('#matricula').val(),
        },
        success: function(data){
          var data = JSON.parse(data);
          console.log('success');
        }, error: function(data) { 
          console.log('error', data);
        }
      });
    });
   </script> --}}