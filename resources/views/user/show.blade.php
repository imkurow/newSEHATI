<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-2">
                @if ($user->image_path)
                    <img src="{{ Storage::url($user->image_path) }}" alt="Profile Picture" class="img-fluid">
                @else
                    <img src="default_profile_picture_url" alt="Default Profile Picture" class="img-fluid">
                @endif
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

        <!-- Profile Picture Update Form -->
        <form action="{{ route('user.update.picture') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="image">Update Profile Picture</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="#" alt="Image Preview" class="img-fluid mt-2" style="display: none; max-height: 200px;">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <div class="row mt-5">
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>User Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Full name:</strong> {{ $user->name }}</p>
                        <p><strong>Age:</strong> {{ $user->dob }}</p>
                        <p><strong>Gender:</strong> {{ $user->sex }}</p>
                        <p><strong>Weight:</strong> {{ $user->weight }}</p>
                        <p><strong>Height:</strong> {{ $user->height }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal">Edit</button>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Account Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Username:</strong> {{ $user->username }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Password:</strong> {{ $user->password }}</p>
                        <p><strong>Phone:</strong> {{ $user->phone }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAccountModal">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
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
                        <!-- Form fields for updating user details -->
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
    <div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
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
                        <!-- Form fields for updating account details -->
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
