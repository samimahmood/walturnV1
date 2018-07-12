@extends('layouts.app')

@section('content')



    @include('layouts.navbar')

    <!-- Page Content -->
    <div class="container"  >

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-3">A Warm Welcome!</h1>
            <p class="lead">Welcome to the Walturn Movie App where you can see all the latest movies listings and you can add movies to
            to your Playlist</p>
            <a href="{{route('movies.home')}}" class="btn btn-primary btn-lg">See All Movie!</a>
        </header>

        <!-- Page Features -->
        <div class="row text-center">




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




@endsection
