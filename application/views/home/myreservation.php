<!doctype html>
    <html lang="en" id="top">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL; ?>public/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?php echo URL; ?>public/assets/img/apple-icon.png">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Reservation Hotel</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="<?php echo URL; ?>public/bootstrap3/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>public/assets/css/gsdk.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>public/assets/css/demo.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>public/assets/css/style1.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>public/assets/css/style2.css" rel="stylesheet" />

        <link href="<?php echo URL; ?>public/assets/css/hotelaff.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>



<style>
    * {
  padding:0;
  margin:0;
}
.slideContainer {
  position: relative;
}
.picture {
  display: none;

  transition-duration: 0.5s;
  transition-timing-function: ease;
}

.arrow {
  color: white;
  font-size: 3em;
  position: absolute;
  top: 40%;
  left: 5%;
  width: 90%;

}

    </style>
<style>
@import "https://fonts.googleapis.com/css?family=Montserrat:400,400i,700";*{position:relative;margin:0;padding:0;box-sizing:border-box;font-family:Montserrat,sans-serif}:focus{outline:none}body{background:#e0e0e0;height:100vh}

</style>




        <!--     Font Awesome     -->
        <link href="<?php echo URL; ?>public/bootstrap3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <div id="navbar-full">
        <div class="container">
            <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">

                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="http://creative-tim.com">
                            <div class="logo-container">
                                <div class="logo">
                                    <img src="<?php echo URL; ?>public/assets/img/new_logo.png">
                                </div>
                                <div class="brand">
                                    Reservation Hotel
                                </div>
                            </div>

                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/">Home</a></li>
                            <li><a href="#top">Top</a></li>
                            <li><a href="#down">Down</a></li>
                            <?php if (isset($_SESSION['client'])) {?>
                            <li><a href="/myreservation" >My Reservation</a></li>

                            <li><a href="<?php echo URL; ?>login/logout" class="btn btn-round btn-default">Logout</a></li>

                           <?php }else{ ?>
                            <li><a href="/inscription" class="btn btn-round btn-default">Register</a></li>
                            <li><a href="/login" class="btn btn-round btn-default">Login</a></li>

                             <?php } ?>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div><!--  end container-->

        <div class='blurred-container'>
            <div class="motto">
                <div>Get</div>
                <div class="border no-right-border">T</div><div class="border">OP</div>
                <div>Offer</div>
            </div>
            <div class="img-src" style="background-image: url('<?php echo URL; ?>public/assets/img/cover_4.jpg')"></div>
            <div class='img-src blur' style="background-image: url('<?php echo URL; ?>public/assets/img/cover_4_blur.jpg')"></div>
        </div>

    </div>

    <div class="main">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
    @if ($message = Session::get('ops!'))
      <div class="alert alert-danger">
        <p>{{$message}}</p>
      </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops! </strong> verifier votre donnee.<br>
            <ul>
                @foreach ($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container tim-container">


    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
             <center> <h3 class="mb-0">My Reservation</h3></center>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>DateDebut</th>
                    <th>DateFin</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>DateDebut</th>
                    <th>DateFin</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                @foreach ($reservations as $reservation)
                  <tr>
                    <td>{{ $loop->index+1 }}.</td>
                    <td>{{$reservation->DateDebut}}</td>
                    <td>{{$reservation->DateFin}}</td>
                    <td>{{$reservation->hotel->Nom}}</td>
                    <td class="td-actions text-right">
<form action="{{ URL::route('annulerreservation',[$reservation->Id_Reservation,$reservation->Id_Chambre]) }}" method="post">

@csrf
                        @method('DELETE')
<button style="margin-top: 0px;height:30px;padding-top: 4px;" onclick="return confirmation();" class="btn btn-danger">Cancel Reservation</button>

</form>

</td>


                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
</div>



        <div  class="parallax-pro" id="down">
        <div class="img-src" style="background-image: url('<?php echo URL; ?>public/assets/img/Cover.jpg');"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-md-offset-3 col-md-12 text-center">
                    <h4 class="hello text-center">
                        <a href="http://gsdk.creative-tim.com">Contact Us <span class="label label-warning"> New</span></a>
                        <small>

                        <li>
                                <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                                Route     km  - 3012     - Tunisie</li>
                                <li>
                                <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>

                                Mobile :(+216) 54 647 661</li>
                                <li>
                                <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>

                                Mobile : (+216) 44 587 066</li>
                                <li>
                                <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>

                                E-mail : khalilfrikha@iit.ens.tn </li>
                                <li>
<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>

E-mail : yahia.chehaider@iit.ens.tn </li>
                        </small>
                    </h4>

                </div>
            </div>
            <div class="space-30"></div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="credits">
                        &copy; <script>document.write(new Date().getFullYear())</script> Get Best Offer <a href=""> Hotel Reservation</a>,<i class="fa fa-heart heart" alt="love"></i> Welcome.
                    </div>
                </div>
            </div>
        </div>

    </div>

    </body>


    <script src="<?php echo URL; ?>public/jquery/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

    <script src="<?php echo URL; ?>public/bootstrap3/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/assets/js/gsdk-checkbox.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/addroom.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/datetime.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/btnonclick.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/datetimedisp.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/gsdk-radio.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/gsdk-bootstrapswitch.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/get-shit-done.js"></script>
    <script src="<?php echo URL; ?>public/assets/js/custom.js"></script>

<script>

var slideIndex = 1;
slideShow(slideIndex);

function slideMove(n) {
  slideShow(slideIndex += n);
}

function slideShow(n) {
  var i;
  var slide= document.getElementsByClassName("picture");

  if (n > slide.length) {
    slideIndex = 1;
  }

  if(n < 1) {
    slideIndex = slide.length;
  }

  for(i = 0; i < slide.length; i++) {
    slide[i].style.display = "none";
  }

  slide[slideIndex-1].style.display = "block";
}


</script>
<script>
function confirmation(){
    if(confirm('are you sure?')){
        document.getElementById('reservation').submit();
    }else{
        return false;
    }
}
</script>


    </html>
