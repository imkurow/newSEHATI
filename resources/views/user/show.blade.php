

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Details</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="30x30" href="img/sehati-heart.svg">
        {{-- @extends('layout') --}}
    </head>
<<<<<<< HEAD
<body>
=======
    
    <body>
    
>>>>>>> caaf967bf46685913aaca7bc5fcaae84bec75270
    <div class="container mt-5">
        <div class="row align-items-center">
            {{-- <div class="col-md-2">
                <img src="{{ asset('storage/Ellipse 1.png')}}" alt="Profile Picture">
            </div> --}}
            <div class="form-group">
                <label for="image">Profile Image</label>
                {{-- <input type="file" class="form-control-file" id="image" name="image"> --}}
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="#" alt="Image Preview" class="img-fluid mt-2" style="display: none; max-height: 200px;">
            </div>
            <div class="col-md-6">
                <h1>Hi, {{ $user->name }}</h1>
            </div>
            <div class="col-md-2 text-md-right">
                <a href="#" class="btn btn-primary">Sign Out</a>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>User Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Full name:</strong> {{ $user->name }}</p>
                        <p><strong>Age: </strong> {{ $user->dob }}</p>
                        <p><strong>Gender: </strong> {{ $user->sex }}</p>
                        <p><strong>Weight: </strong> {{ $user->weight }}</p>
                        <p><strong>Height: </strong> {{ $user->height }}</p>

                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#editUserModal">Edit</button>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Account Detail</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Username: </strong> {{ $user->username }}</p>
                        <p><strong>Email: </strong> {{ $user->email }}</p>
                        <p><strong>Password: </strong> {{ $user->password }}</p>
                        <p><strong>Phone:</strong> {{ $user->phone }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#editAccountModal">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.update.details') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Full name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" 
                                value="{{ $user->dob }}" required>
                        </div>
                        <div class="form-group">
                           <label for="sex">Gender</label>
                           <div>
                            <input type="radio" id="male" name="sex" value="Male"{{ $user->sex == 'Male' ? 'checked' : '' }} >
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="sex" value="Female"{{ $user->sex == 'Female' ? 'checked' : '' }} >
                            <label for="male">Female</label>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="{{ $user->weight }}" required>
                        </div>
                        <div class="form-group">
                            <label for="height">Height</label>
                            <input type="number" class="form-control" id="height" name="height" value="{{ $user->height }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Account Modal -->
    <div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAccountModalLabel">Edit Account Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.update.account') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user->username }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" 
                            value="{{ $user->password }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>    
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
