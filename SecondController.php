<?php

namespace App\Http\Controllers;

use App;
use App\Models\comments;
use App\Models\Friends;
use App\Models\likes;
use App\Models\MyFriend;
use App\Models\Posts;
use App\Models\Registeration;
use App\Models\stories;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Response;
use Validator;

class SecondController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    function home()
    {
        $userId = auth()->user()->id;

        // Get all friend IDs (both directions)
        $friendIdsFromMe = MyFriend::where("me", $userId)->where("status", "confirm")->pluck("friend")->toArray();
        $friendIdsFromFriend = MyFriend::where("friend", $userId)->where("status", "confirm")->pluck("me")->toArray();

        // Combine all friend IDs
        $allFriendIds = array_merge($friendIdsFromMe, $friendIdsFromFriend);

        // Fetch public posts, ordered by most recent first
        $publicPosts = Posts::where("visibility", "public")
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch friend usernames
        $friendUsernames = Registeration::whereIn("id", $allFriendIds)
            ->pluck("username")
            ->toArray();

        // Fetch posts from friends, ordered by most recent first
        $friendPosts = Posts::where("visibility", "friends")
            ->whereIn("user", $friendUsernames)
            ->orderBy('created_at', 'desc')
            ->get();

        // Combine posts
        $combinedPosts = $publicPosts->concat($friendPosts);

        // Sort posts to alternate between public and friend posts
        $combinedPosts = $combinedPosts->sortBy(function ($post) use ($publicPosts, $friendPosts) {
            $isPublic = $publicPosts->contains($post);
            return $isPublic ? 0 : 1; // Sorting logic to alternate
        })->values();







        $publicStories = stories::where("visibility", "public")
            ->orderBy('created_at', 'desc')
            ->get();
        // Fetch posts from friends, ordered by most recent first
        $friendStroies = stories::where("visibility", "friends")
            ->whereIn("user", $friendUsernames)
            ->orderBy('created_at', 'desc')
            ->get();

        // Combine posts
        $combinedStories = $publicStories->concat($friendStroies);

        // Sort posts to alternate between public and friend posts
        $combinedStories = $combinedStories->sortBy(function ($post) use ($publicStories, $friendStroies) {
            $isPublic = $publicStories->contains($post);
            return $isPublic ? 0 : 1; // Sorting logic to alternate
        })->values();



        return view('afterlogin/home', compact('combinedPosts','combinedStories'));
    }


    function messageKaro()
    {
        return view('afterlogin/messenger');
    }

    function message()
    {
        return view('afterlogin/messageKaro');
    }

    function profile()
    {


        return view('afterlogin/profile');
    }

    public function updateProfilePicture(Request $request)
    {
        // Validate the image upload
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Fetch the currently authenticated user
        $user = auth()->user();

        // Get the old image filename from the database
        $oldImage = $user->profile_picture;

        // If an old image exists, delete it from the filesystem
        if ($oldImage && file_exists(public_path('images/' . $oldImage))) {
            unlink(public_path('images/' . $oldImage));
        }

        // Generate a unique image name for the new upload
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();

        // Move the new image to the 'public/images' directory
        $request->image->move(public_path('images'), $imageName);

        // Update the user's profile picture in the database
        $user->profile_picture = $imageName;
        $user->save();

        // Return back with a success message
        return back()->with('success', 'Profile picture updated successfully');
    }


    function ChangePassword(Request $request)
    {

        $rules = [
            'oldPassword' => 'required',
            'newPassword' => [
                'required',
                'string',
                'min:8',               // Minimum length
                'regex:/[a-z]/',       // Must contain at least one lowercase letter
                'regex:/[A-Z]/',       // Must contain at least one uppercase letter
                'regex:/[0-9]/',       // Must contain at least one digit
                'regex:/[@$!%*#?&]/',  // Must contain a special character
            ],
            'confirmPassword' => [
                'required',
                'same:newPassword',  // Must match newPassword
            ],
        ];

        $user = Hash::check($request['oldPassword'], auth()->user()->password);

        if (!$user) {
            return redirect()->back()->with("error", "Old Password didn't matched");

        }


        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }





        $user = auth()->user();


        $user->password = bcrypt($request['newPassword']);

        $user->save();
        return redirect()->back()->with("success", "Password has been changed");






    }


    function friends()
    {


        $receiver = MyFriend::where("me", auth()->user()->id)->pluck("friend");

        $sender = MyFriend::where("friend", auth()->user()->id)->pluck("me");

        $suggestion = Registeration::where("username", '!=', auth()->user()->username)->
            whereNotIn("id", $receiver)->whereNotIn("id", $sender)->get();

        $request = MyFriend::where("friend", auth()->user()->id)->where("status", "pending")->get("me");




        return view('afterlogin/friends_management', compact("suggestion", "request"));
    }


    function updateNameStatus(Request $request)
    {
        $rules = [
            'name' => 'required|max:50|min:2|alpha|string',
            'status' => 'required|max:200|min:5|string',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->route("friends")->with("error", "Name and Status not updated");
        }


        $fn = $request['name'];
        $st = $request['status'];

        $user = auth()->user();

        $user->firstname = $fn;
        $user->status = $st;

        $user->save();

        return redirect()->back()->with("success", "Name and Status has been updated");

    }

    function sendRequest($id)
    {

        $insert = new MyFriend();

        $insert->me = auth()->user()->id;
        $insert->friend = $id;
        $insert->status = "pending";

        $insert->save();



        return redirect()->back()->with("success", "Friend request has been sent");

    }


    function confirmRequest($id)
    {



        $up = MyFriend::where("me", $id)->where("friend", auth()->user()->id)->first();

        $up->status = "confirm";
        $up->save();



        return redirect()->back()->with("success", "Congrates You have a  new friend now");
    }


    function declineRequest($id)
    {
        $de = MyFriend::where("me", $id)->where("friend", auth()->user()->id)->first();
        $de->delete();

        return redirect()->back()->with("success", "You decline friend request");
    }
    function friendProfile($id)
    {


        $detail = Registeration::where("id", $id)->first();
        return view('afterlogin/friend_profile', compact('detail'));
    }



    function Post(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:250',
            'post' => 'required|image|mimes:jpg,png,webp',
            'visibility' => 'required'
        ]);


        $insert = new Posts();

        $imageName = time() . '.' . $request->post->getClientOriginalExtension();

        $request->post->move(public_path("images"), $imageName);

        $insert->user = auth()->user()->username;
        $insert->caption = $request['caption'];
        $insert->picture = $imageName;
        $insert->visibility = $request['visibility'];

        if ($insert->save()) {
            return redirect()->back()->with("success", "Post is uploaded successfully..");
        } else {
            return redirect()->back()->with("error", "Something went wrong");
        }






    }

    public function liked($postId)
    {


        $check = likes::where("user", auth()->user()->username)->where("postId",$postId)->exists();

        if($check)
        {
            $liked = likes::where("postId", $postId)->where("user", auth()->user()->username)->first();
            $liked->delete();

            return redirect()->back()->with('postId', $postId);

        }else{
            $insert = new likes();

            $insert->user = auth()->user()->username;
            $insert->postId = $postId;
            $insert->likes += 1;

            $insert->save();



        }

        return redirect()->back()->with('postId', $postId);

    }


    function commentKaro(Request $request)
    {

        $pId= $request['postId'];

    
        $comment = $request->comment;


        $insert = new comments();

        $insert->postId = $pId;
        $insert->user = auth()->user()->username;
        $insert->comment = $comment;
        $insert->save();



        return redirect()->back()->with("postId",$pId);
    }

    function addStory(Request $request)
    {
        $request->validate([
            'story'=>'required|image|mimes:jpg,png,webp',
            'visibility'=>'required',
        ]);
        $insert = new stories();

        $imageName = $request['story']->getClientOriginalName();

        $request->file('story')->move(public_path("images/"), $imageName);

        $insert->story = $imageName;
        $insert->visibility = $request['visibility'];
        $insert->user = auth()->user()->username;
        $insert->save();

        return redirect()->back();
    }


}
