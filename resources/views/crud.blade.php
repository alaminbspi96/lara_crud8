<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-8 Crud Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <Script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></Script>
</head>
<body style="background-color: #2248b357">
    <div style="padding: 30px"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
              <div class="card">
                <div class="card-header">
                    All Student list
                  </div>
                  @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('update') }} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif

                  @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          {{-- <span style="area-hidden='true' ">&times;</span> --}}
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Sl no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Roll</th>
                            <th scope="col">Class</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $serial = 1;
                          @endphp
                          @foreach ($students as $rows)
                              
                            <tr>
                                <th scope="row">{{$serial++}}</th>
                                <td>{{$rows->name}}</td>
                                <td>{{$rows->roll}}</td>
                                <td>{{$rows->class}}</td>
                                <td>
                                    <a href="{{url('/student/edit/'.$rows->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{url('/student/destroy/'.$rows->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>


                          
                          @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-header">
                    Add New Student
                  </div>

                  @if (session('success'))
                      
                  
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                <div class="card-body">
                    <form action="{{url('student/store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                          @error('name')
                              <strong class="text-danger">{{$message}}</strong>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Roll</label>
                          <input type="text" name="roll" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter roll">
                          @error('roll')
                              <strong class="text-danger">{{$message}}</strong>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Class</label>
                            <input type="text" name="class" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter class">
                            @error('class')
                              <strong class="text-danger">{{$message}}</strong>
                          @enderror
                          </div>
                        
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</body>
</html>