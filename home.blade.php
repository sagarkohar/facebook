@extends('afterlogin/master')

@section('content')

<div class="container">
    <!-- Stories Section -->
    <div class="stories">
        <div class="story col-3" data-toggle="modal" data-target="#storyModal"
            style="background-color: blue; cursor: pointer;">
            <img src="{{ asset('images/' . auth()->user()->profile_picture) }}" style="margin-left: -10px;"
                alt="Story of {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}">
            <span style="color: white;">
                {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
            </span>
        </div>



        <!-- stories section -->

        @foreach ($combinedStories as $cs)

            <div class="story col-3" style="background-image:url('{{URL::to('/')}}/images/{{$cs->story}}');background-size:200px">
                <a href="friend_profile{{App\Models\Registeration::where("username", $cs->user)->value("id")}}"><img src="{{URL::to('/')}}/images/{{App\Models\Registeration::where("username", $cs->user)->value("profile_picture")}}" alt="Story 2"></a>
                <span style="font-weight:bold;color:white">{{App\Models\Registeration::where("username", $cs->user)->value("firstname")}} {{App\Models\Registeration::where("username", $cs->user)->value("lastname")}}</span>
            </div>
        @endforeach

        
        <!-- <div class="story col-3" style="background-image:url({{URL::to('/')}}/images/user.jpg)">
            <img src="{{URL::to('/')}}/images/user.jpg" alt="Story 3">
            <span>Mike Johnson</span>
        </div>
        <div class="story col-3">
            <img src="{{URL::to('/')}}/images/user.jpg" alt="Story 4">
            <span>Alice Brown</span>
        </div>
        <div class="story col-3">
            <img src="{{URL::to('/')}}/images/user.jpg" alt="Story 5">
            <span>Alice Brown</span>
        </div>
        <div class="story col-3">
            <img src="{{URL::to('/')}}/images/user.jpg" alt="Story 6">
            <span>Alice Brown</span>
        </div>
        <div class="story col-3">
            <img src="{{URL::to('/')}}/images/user.jpg" alt="Story 7">
            <span>Alice Brown</span>
        </div> -->
        <!-- Add more stories as needed -->
    </div>

    <!-- Upload Section -->
    <div class="upload_section">
        <div class="row">
            <div class="col-2">
                <img src="{{URL::to('/')}}/images/{{auth()->user()->profile_picture}}"
                    style="width:50px;border-radius:100%;height:50px;" alt="">
            </div>
            <div class="col-10">
                <input type="text" data-toggle="modal" data-target="#firstModal"
                    placeholder="What's on your mind, Sagar?"
                    style="width:90%;height:50px; border-radius:10px;background-color:#E6EEF7; padding-left:10%;"
                    class="border-0" name="" id="">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">Live Video</div>
            <div class="col-4" data-toggle="modal" data-target="#firstModal">Upload Video/Photo</div>
            <div class="col-4" data-toggle="modal" data-target="#firstModal">Feeling/Activity</div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> <!-- Display each error -->
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Modals -->

    <!-- First Modal -->
    <div class="modal fade" id="firstModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal" id="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Create Post</h3>
                        <span class="close" onclick="closeModal()">&times;</span>
                    </div>
                </div>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/post" method="post" enctype="multipart/form-data" id="postForm">
                        @csrf
                        <textarea name="caption" placeholder="Say something about your post"
                            style="width: 100%; height: 80px; border:none"></textarea>

                        <div class="image-fluide" style="width:100%;height:400px;"></div> <!-- Div for image preview -->

                        <input type="file" name="post" id="imageInput" onchange="previewImage(event)">
                        <br>
                        <hr>
                        <h5>Who can see your post?</h5>
                        <input type="radio" name="visibility" value="public" id="">Anyone <br>
                        <input type="radio" name="visibility" id="" value="private">Private
                        <br>
                        <input type="radio" name="visibility" id="" value="friends">Friends
                        <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">POST</button>
                        </div>
                    </form>
                </div>

                <script>
                    function previewImage(event) {
                        var imageFluideDiv = document.querySelector('.image-fluide');
                        imageFluideDiv.innerHTML = ""; // Clear any previous image
                        var file = event.target.files[0];

                        if (file) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement('img');
                                img.src = e.target.result;
                                img.style.width = '100%'; // Adjust as needed
                                img.style.height = '100%'; // Fit the image within the div
                                img.classList.add('img-fluid'); // Adding the Bootstrap img-fluid class
                                imageFluideDiv.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        }
                    }




                </script>



            </div>
        </div>
    </div>

    <!-- story modal -->


    <div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal" id="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Create story</h3>
                        <span class="close" onclick="closeModal()">&times;</span>
                    </div>
                </div>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Story</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/story" method="post" enctype="multipart/form-data" id="postForm">
                        @csrf
                       

                        <div class="image-fluide1" style="width:90%;height:300px;"></div> <!-- Div for image preview -->

                        <input type="file" name="story" id="imageInput1" onchange="previewImage(event)">
                        <br>
                        <hr>
                        <h5>Who can see your story?</h5>
                        <input type="radio" name="visibility" value="public" id="">Anyone <br>
                        <input type="radio" name="visibility" id="" value="private">Private
                        <br>
                        <input type="radio" name="visibility" id="" value="friends">Friends
                        <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                </div>

                <script>
                    function previewImage(event) {
                        var imageFluideDiv = document.querySelector('.image-fluide1');
                        imageFluideDiv.innerHTML = ""; // Clear any previous image
                        var file = event.target.files[0];

                        if (file) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement('img');
                                img.src = e.target.result;
                                img.style.width = '100%'; // Adjust as needed
                                img.style.height = '100%'; // Fit the image within the div
                                img.classList.add('img-fluid'); // Adding the Bootstrap img-fluid class
                                imageFluideDiv.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        }
                    }




                </script>



            </div>
        </div>
    </div>




    @foreach ($combinedPosts as $p)
        <!-- Posts Section -->
        <div class="posts">
            <div class="post">
                <!-- Post header -->
                <div class="post-header">
                    <img class="img-fluid"
                        src="{{ URL::to('/') }}/images/{{ App\Models\Registeration::where('username', $p->user)->value('profile_picture') }}"
                        alt="Profile Picture">
                    <p><span
                            style="margin-right:15px; font-weight:bold;">{{ App\Models\Registeration::where('username', $p->user)->value('firstname') }}</span>
                        is Feeling happy with Tilakram and 6 others at RK University, Gujarat</p>
                </div>

                <!-- Post content -->
                <div class="post-content">
                    <p>{{ $p->caption }}</p>
                    <a href="{{ URL::to('/') }}/images/{{ $p->picture }}">
                        <div style="height:600px;width:530px;" align="center">
                            <img class="img-fluid" src="{{ URL::to('/') }}/images/{{ $p->picture }}"
                                style="width:100%;height:90%;" alt="">
                        </div>
                    </a>
                </div>

                <!-- Post footer -->
                <div class="post-footer">
                    <!-- Like button with dynamic color change -->
                    <a href="/liked{{ $p->id }}">
                        <button>
                            <img src="{{ URL::to('/') }}/images/logos/like.png" alt="Like Button" id="l{{ $p->id }}"
                                style="width:40px;">
                        </button>
                    </a>
                    <span>
                        <?php
    $likes = App\Models\likes::where('postId', $p->id)->get();
    if (count($likes) < 1) {
        echo 'Be the first to Like';
    } else { ?>
                        <div class="" data-toggle="modal" data-target="#userModal{{ $p->id }}">{{ count($likes) }}</div>
                        <?php    } ?>
                    </span>



                    <?php
    $checkLiked = App\Models\likes::where("postId", $p->id)->where("user", auth()->user()->username)->exists();

    if ($checkLiked) {?>
                    <script>

                        document.getElementById("l" +{{$p->id}}).style.backgroundColor = 'blue';
                    </script><?php
    }?>
                    <button onclick="showCommentator({{ $p->id }})" id="c{{ $p->id }}">Comment</button>
                    <div style="display:none;" class="commentSection{{ $p->id }}">
                        <form action="comment" method="post">
                            @csrf
                            <Textarea name="comment" required style="width:300px; height:67px;"></Textarea>
                            <input type="hidden" value="{{ $p->id }}" name="postId">
                            <input type="submit" value="Save" class="bg-primary">
                        </form>
                    </div>
                </div>

                <hr>
                <div class="comments" style="overflow-y:auto; max-height:150px; margin-top:20px;">
                    <?php 
                                                                    $comments = App\Models\comments::where('postId', $p->id)->get();
    echo count($comments) . ' comments';
    foreach ($comments as $c) {
        $commenter = App\Models\Registeration::where('username', $c->user)->first();
                                                                ?>
                    <p><a href="friend_profile{{ $commenter->id }}"><span>{{ $commenter->firstname }}:</span></a>
                        {{ $c->comment }}</p>
                    <hr>


                    <?php
    }



                                                                ?>
                </div>
            </div>
        </div>

        <!-- Modal for Likes -->
        <div class="modal fade" id="userModal{{ $p->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel{{ $p->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $p->id }}">Users Who Reacted</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php 
                                                                        $users = App\Models\likes::where('postId', $p->id)->get();
    foreach ($users as $u) {
        $ur = App\Models\Registeration::where('username', $u->user)->first();
                                                                    ?>
                        <a href="friend_profile{{ $ur->id }}">
                            <h4>{{ $ur->firstname }} {{ $ur->lastname }}</h4>
                        </a>
                        <?php    } ?>
                    </div>
                </div>
            </div>
        </div>
    @endforeach





    <script>


        function showCommentator(pId) {
            $('.commentSection' + pId).show();
            $('#c' + pId).hide();

        }


    </script>




    @if (session('postId'))

        <script>

            var id ={{session('postId')}};

            $('#c' + id).focus();
        </script>

    @endif



</div>

@endsection