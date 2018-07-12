@extends('layouts.app')

@section('content')


    <!-- Navigation -->

    @include('layouts.navbar')

    <!-- Jumbotron Header -->
    <header class="jumbotron my-lg-1">
        <h1 class="display-5">Add New Movies!</h1>
    </header>

    <!-- Page Content -->
    <div class="container"  >


        <div class="col-md-9 col-md-offset-1">
            {!! Form::open(['method' =>'POST' , 'action' =>'MovieController@store' , 'files' => true]) !!}

            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('genre', 'Genre:') !!}
                    {!! Form::text('genre' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('year', 'Year:') !!}
                    {!! Form::text('year' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('link', 'Link:') !!}
                    {!! Form::text('link' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image_link', 'Image Link:') !!}
                    {!! Form::text('image_link' , null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('image', 'Image:') !!}
                    {!! Form::file('image' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create' , ['class' =>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>



        </div>

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
