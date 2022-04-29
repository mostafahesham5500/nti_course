<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>




    <div class="container">
        <h2>Register</h2>
        <h2><a href="{{url('signup')}}">signup</a></h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/dologin') }}" method="post" enctype="multipart/form-data">

            {{-- <input type="hidden" name="_token" value="<?php //echo csrf_token(); ?>"> --}}

            @csrf

            <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" placeholder="Enter Email" value="{{old('content')}}">
            </div>


            <div class="form-group">
                <label for="exampleInputName">Password</label>
                <input type="password" class="form-control" id="exampleInputName" aria-describedby="" name="password"
                    placeholder="Enter Password">
            </div>




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</body>

</html>
