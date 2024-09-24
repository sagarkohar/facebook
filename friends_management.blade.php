@extends('afterlogin/master')

@section('content')

<div class="container">
    <!-- Friend Requests Section -->
    <div class="section">
        <h4>Friend Requests</h4>

        @if ($request && count($request) > 0)
            @foreach ($request as $r)
                <a href="/friend_profile{{ $r['me'] }}" style="text-decoration:none;color:black">
                    <div class="friend-request p-2 px-3">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ URL::to('/') }}/images/{{ \App\Models\Registeration::where('id', $r['me'])->value('profile_picture') }}"
                                    alt="Profile Picture">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <p style="font-size:20px;">
                                        {{ \App\Models\Registeration::where('id', $r['me'])->value('firstname') }}
                                        {{ \App\Models\Registeration::where('id', $r['me'])->value('lastname') }}
                                    </p>
                                    <p style="font-size:10px;">20 Mutual Friends</p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="/accept_request{{ $r['me'] }}">
                                            <button class="btn-primary border-0">Confirm</button>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="/decline_request/{{ $r['me'] }}">
                                            <button class="border-0"
                                                style="background-color:#ABBACC;color:white;">Delete</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <p style="font-size:15px;color:blue;">No more friend requests are pending.</p>
        @endif





        <hr>
        <hr>

        <h4>Suggestion </h4>

        @if (count($suggestion) > 0)

            @foreach ($suggestion as $fr)

                <a href="/friend_profile{{$fr['me']}}" style="text-decoration:none;color:black">
                    <div class="friend-request p-2 px-3">


                        <div class="row">
                            <div class="col-3">
                                <img src="{{URL::to('/')}}/images/{{$fr->profile_picture}}" alt="Profile Picture">
                            </div>
                            <div class="col-8">

                                <div class="row">
                                    <p style="font-size:20px;">{{$fr->firstname}} {{$fr->lastname}}</p>

                                    <p style="font-size:10px;">20 Mutual Friends</p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="/send_request{{$fr->id}}">
                                            <button class="btn-primary border-0">Add

                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="/remove_suggestion{{$fr->id}}">
                                            <button class="border-0" style="background-color:#ABBACC;color:white;">Remove
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        @else
            <p style="font-size:15px;color:blue">No more Friend suggestions.</p>
        @endif





    </div>

    @endsection