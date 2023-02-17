<?php
namespace App\Helper;

use App\Models\Movie;
use App\Models\User;
use App\Models\UserList;

class FunctionsUtilities
{

    public function uploadImage(Request $request)
    {try {
        $user_id = $request->user_id;
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found']);
        }

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->storeAs('public/images',$imageName);

        $user->image = $imageName;
        $user->save();

        return response()->json(['success' => 'Image uploaded successfully']);
    } catch (\Exception $e) {
        \Log::error($e);
        return response()->json(['error' => 'An error occurred while uploading the image']);
    }

    }

        function Store_movie_to_list($user_list_id, $movie_id,$userId)
        {
            $list = UserList::where('user_id', $userId)
                ->where('list_name', 'ALL')
                ->first();
            $listId = $list->id;
            $userList = UserList::find($user_list_id);
            $userListALL = UserList::find($listId);
            $movie = Movie::find($movie_id);

            if ($userList && $movie) {
                if ($userList->movies->contains($movie_id)) {
                    // record already exists
                    return false;
                } else {
                    $userList->movies()->attach($movie_id);
                    $userListALL->movies()->attach($movie_id);
                    return true;
                }
            }
            return false;
        }


        function Remove_movie_from_list($user_list_id, $movie_id)
         {
            $userList = UserList::find($user_list_id);
            $movie = Movie::find($movie_id);

            if ($userList && $movie) {
                if ($userList->movies->contains($movie_id)) {
                    $userList->movies()->detach($movie_id);
                    return true;
                } else {
                    // record does not exist
                    return false;
                }
            }
            return false;
    }
//      function Store_movie_to_list($user_list_id, $movie_id)
//        {
//
//          return  Movie::where('id',$movie_id)->first()->userLists()->attach(UserList::where('id',$user_list_id)->get());
//          return  Movie::where('id',$movie_id)->first()->userLists()->attach(UserList::where('id',(l id ta3ult l ALL list))->get());
//        }

        function get_user_lists($user_id){
            return User::where('id',$user_id)->with('userLists')->get();
        }
        function get_users_by_letter($letter){

            $users = User::where('name', 'LIKE', '%'.$letter.'%')->get();

            return $users;
        }
        function get_movies_by_letter($letter){

            $movies = Movie::where('movie_name', 'LIKE', '%'.$letter.'%')->get();

            return $movies;
        }

        function get_user_lists_of_user($user_id){
            $user = User::find($user_id);
            $categories = $user->userLists;
            return $categories;
        }

        public function getFollowers($user_id)
        {
            $user = User::find($user_id);
            $followers = $user->users;

        return response()->json(
             $followers,
        );
    }
        function isFollowed($user_id,$followed_user_id){
            $user = User::find($followed_user_id);
            $follower = User::find($user_id);

            $isFollowed = $user->users->contains($follower);

            if ($isFollowed) {
                return "true";
            } else {
                return "false";
            }
        }
        function followFriend($user_id,$followed_user_id){
            return User::where('id',$followed_user_id)->first()->users()->attach(User::where('id',$user_id)->get());
        }
         public function unfollow($user_id, $followed_user_id) {
            $follower = User::find($user_id);
            $followed = User::find($followed_user_id);
            $follower->users()->detach($followed);
        }
        function movies_in_list($user_list_id){
            return UserList::where('id',$user_list_id)->with('movies')->get();
        }
}
