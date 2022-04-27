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


<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <a href="create">create</a>
    <a href="logout">logout</a>
    <h2>{{session()->get("message")}}</h2>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td> <img width="100px" height="100px" src="{{url('images/'.$value->image)}}" alt=""></td>
                                <td><a href="{{url('/delete/'.$value->id)}}">Delete</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


            </body>
            
            </html>
            