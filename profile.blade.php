@extends('afterlogin/master')

@section('content')

<div class="container">
    <!-- Stories Section -->
    <div class="shadow p-2 bg-primary rounded fs-4 fw-bold text-white">
        Your Profile
    </div>

    <div class="container shadow p-2 bg-body rounded">
        <div style="margin-top: 10px " align="center">
            <a href="{{URL::to('/')}}/images/{{auth()->user()->profile_picture}}">
                <img id="user_pic" src="{{URL::to('/')}}/images/{{auth()->user()->profile_picture}}" alt="..."
                    style="width: 450px; height: 450px;" /></a>

            <form action="update_profile_picture" required method="post" enctype="multipart/form-data" id="imageInput"
                style="display:none">
                @csrf
                <input type="file" name="image" accept="image/*">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" onclick="cancelEdit()">Cancle</a>

            </form>




        </div>

        <div class="error-message">
            @if ($errors->has('image'))
                {{$errors->first('image')}}
            @endif
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary" id="edtbtn" type="button" onclick="updatePicture()">Edit
                Profile</button>

        </div>

        <script>
            function updatePicture() {
                document.getElementById('imageInput').style.display = 'block';
                document.getElementById('user_pic').style.display = 'none';
                document.getElementById('edtbtn').style.display = 'none'
            }

            function cancelEdit() {

                document.getElementById('imageInput').style.display = 'none';
                document.getElementById('user_pic').style.display = 'block';
                document.getElementById('edtbtn').style.display = 'block'

            }

            function cp() {
                document.getElementById('cp').style.display = 'block';
                document.getElementById('edtbtn').style.display = "none";
                document.getElementById('cpbtn').style.display = "none";
                document.getElementById('confirm').focus();


            }

            function cancelCp() {

                document.getElementById('cp').style.display = 'none';
                document.getElementById('edtbtn').style.display = "block";
                document.getElementById('cpbtn').style.display = "block";
            }


        </script>


        <div>
            <h6 class="d-block text-center mt-3 mb-3">
                <button class="btn btn-danger" id="cpbtn" onclick="cp()">Change passowrd</button>
            </h6>
        </div>



        <div class="error-message">

            @if ($errors->has("oldPassword"))

                {{$errors->first("oldPassword")}}

            @endif

            <br>

            @if ($errors->has("newPassword"))
                {{$errors->first("newPassword")}}

            @endif
            <br>
            @if ($errors->has("confirmPassword"))
                {{$errors->first("confirmPassword")}}

            @endif

        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form in Modal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="/updateNameStatus" method="post">

                            @csrf
                            <div class="form-group">
                                <label for="name">First Name:</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{auth()->user()->firstname}}" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Status:</label>
                                <input type="text" name="status" class="form-control" placeholder=""
                                    value="{{auth()->user()->status}}" id="email">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <div class="card mt-5" id="cp" style="display:none">
            <div class="card-header text-center">
                <h4>Change Password</h4>
            </div>
            <div class="card-body">
                <form action="/changepassword" method="post">

                    @csrf
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="oldPassword" placeholder="Enter old password">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" name="newPassword" id="confirm" class="form-control" id="newPassword"
                            placeholder="Enter new password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" name="confirmPassword"
                            placeholder="Confirm new password">
                    </div>
                    <div class="d-flex row">
                        <div class="d-grid col-8">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                        <div class="d-grid">
                            <a onclick="cancelCp()" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div><br>
    <div class="container shadow p-2 bg-body rounded">
        <div class="mb-1 row fs-5">
            <label class="col-3">Full Name:</label>
            <div class="col-9">{{auth()->user()->firstname}} {{auth()->user()->lastname}}
            </div>
        </div>
        <hr />
        <div class="mb-1 row fs-5">
            <label class="col-3">Friends</label>
            <div class="col-9"><?php

$f = \App\Models\MyFriend::where("me", auth()->user()->id)->where("status", "confirm")->get();
$f1 = \App\Models\MyFriend::where("friend", auth()->user()->id)->where("status", "confirm")->get();

$total = count($f) + count($f1);
echo $total;
                            ?>

            </div>
        </div>
        <hr />


        <hr />
        <div class="mb-1 row fs-5">
            <label class="col-3">POSTS</label>
            <div class="col-9">23</div>
        </div>
        <hr />
        <div class="mb-1 row fs-5">
            <label class="col-3">Status</label>
            <div class="col-9">{{auth()->user()->status}}</div>
        </div>
        <hr />
        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update</a>
        <!-- <a href="updateaccount.php" class="btn btn-danger"> Go Back</a> -->
    </div>
</div>

@endsection