@extends('layouts.app')

@section('content')

    @include('layouts.navbar')


    <!-- Dialog box -->
    <div id="white-background"></div>
    <div id="dlgbox">
        <div id="dlg-header"></div>
        <div id="dlg-body">Removed From Your Playlist</div>
        <div id="dlg-footer">
            <button onclick="dlgLogin()">Close</button>
        </div>

    </div>

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container"  >

    @if($movies->isEmpty())


        <!-- Jumbotron Header -->
        <header class="jumbotron my-6">
            <h1 class="display-6">You have no Movie in your Playlist!</h1>
            <a href="{{route('movies.home')}}" class="btn btn-primary btn-lg">Go To Movies Page!</a>
        </header>

    @endif

    @if(!$movies->isEmpty())


        <!-- Jumbotron Header -->
            <header>

                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Your Playlist!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </header>

    @endif


    <!-- Page Features -->
        <div class="row text-center">

            @if($movies)
                @foreach($movies as $movie)

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="card" style="width: 11.5rem;">
                            <div class="hovereffect">
                                <img  style="width: 100%" class="img-responsive" src="{{$movie->image_link}}" alt="/images/{{$movie->image ? $movie->image : 'no movie photo'}}">
                                <div class="overlay">
                                    <a class="info" href="{{$movie->link}}">IMDB</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <h4 class="card-title">{{$movie->name}}</h4>

                                <h6><strong>Year: </strong>{{$movie->year}}</h6>
                                <h6><strong>Genre: </strong>{{$movie->genre}}</h6>


                            </div>
                            <div class="card-footer">
                                <a onclick="showDialog()"  href="{{route('movie.unsubscribe' , $movie->id)}}" class="btn btn-primary">Remove</a>
                            </div>
                        </div>
                    </div>


            @endforeach
        @endif

        <!-- /.row -->


        </div>
        <!-- /.container -->
    </div>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Walturn Movie App 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <script>

        $(document).ready(function () {
            $(".navbar-nav li").removeClass("nav-item active");//this will remove the active class from
                                               //previously active menu item
            $('#playlist').addClass('nav-item active');
            //for demo
            //$('#demo').addClass('active');
            //for sale
            //$('#sale').addClass('active');
        });


    </script>

    <!-- script of dialog box -->


    <script>
        function dlgLogin() {
            var whitebg = document.getElementById("white-background");
            var dlg = document.getElementById("dlgbox");
            whitebg.style.display = "none";
            dlg.style.display = "none";
        }
        function showDialog() {

            var whitebg = document.getElementById("white-background");
            var dlg = document.getElementById("dlgbox");
            whitebg.style.display = "block";
            dlg.style.display = "block";

            var winWidth = window.innerWidth;
            var winHeight = window.innerHeight;

            dlg.style.left = (winWidth/2) - 480/2 + "px";
            dlg.style.top = "150px"
        }
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@endsection
