@extends("afterlogin/master")

@section('content')


<div class="container">
    <!-- Stories Section -->
    <div class="shadow p-2 bg-primary rounded fs-4 fw-bold text-white">
        {{$detail['firstname']}}'s Profile
    </div>

    <div class="container shadow p-2 bg-body rounded">
        <div style="margin-top: 10px " align="center">
            <a href="{{URL::to('/')}}/images/{{$detail->profile_picture}}">
                <img id="user_pic" src="{{URL::to('/')}}/images/{{$detail['profile_picture']}}" alt="..."
                    style="width: 450px; height: 450px;" />
            </a>

        </div>




    </div><br>
    <div class="container shadow p-2 bg-body rounded">
        <div class="mb-1 row fs-5">
            <label class="col-3">Full Name:</label>
            <div class="col-9">{{$detail->firstname}} {{$detail->lastname}}
            </div>
        </div>
        <hr />
        <div class="mb-1 row fs-5">
            <label class="col-3">Mutual Friends</label>
            <a href="">
                <div class="col-9">

                    <?php

$f1 = App\Models\MyFriend::where("me", $detail->id)->where("status", "confirm")->pluck("friend")->toArray();
$f2 = App\Models\MyFriend::where("friend", $detail->id)->where("status", "confirm")->pluck("me")->toArray();


$m1 = App\Models\MyFriend::where("me", auth()->user()->id)->where("status", "confirm")->pluck("friend")->toArray();
$m2 = App\Models\MyFriend::where("friend", auth()->user()->id)->where("status", "confirm")->pluck("me")->toArray();



$ff = array_merge($f1, $f2);
$mm = array_merge($m1, $m2);



$mutual = array_intersect($ff, $mm);


$count = count($mutual);


if ($count > 0) {
    echo App\Models\Registeration::where("id", reset($mutual))->value("firstname");

    // Display if there are additional mutual friends
    if ($count > 1) {
        echo " and " . ($count - 1) . " others";
    }
} else {
    echo "New for your friends even";
}

            ?>


                </div>
        </div>
        </a>
        <hr />


        <hr />
        <div class="mb-1 row fs-5">
            <label class="col-3">POSTS</label>
            <div class="col-9">23</div>
        </div>
        <hr />
        <div class="mb-1 row fs-5">
            <label class="col-3">Status</label>
            <div class="col-9">{{$detail->status}}</div>
        </div>
        <hr />


        <div class="row p-2">
            <!-- <div class="col-12">
                <a href="/accept_request{{ $detail->id }}">
                    <button class="btn-primary border-0">Confirm</button>
                </a>
                <a href="/decline_request{{ $detail->id}}">
                    <button class="border-0" style="background-color:#ABBACC;color:white;">Delete</button>
                </a>
            </div> -->
            
        </div>
    </div>
</div>

@endsection