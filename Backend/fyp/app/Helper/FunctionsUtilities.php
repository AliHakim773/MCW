<?php
namespace App\Helper;

use App\Models\Movie;
use App\Models\User;
use App\Models\UserList;

class FunctionsUtilities
{
        function Store_movie_to_list($user_list_id, $movie_id)
        {
          return  Movie::where('id',$movie_id)->first()->userLists()->sync(UserList::where('id',$user_list_id)->get());
          return  Movie::where('id',$movie_id)->first()->userLists()->sync(UserList::where('list_name',"All")->get());
        }
        function get_user_lists($user_id){

            return User::where('id',$user_id)->with('userLists')->get();
        }
         function followFriend($user_id,$followed_user_id){
            return User::where('id',$followed_user_id)->first()->users()->sync(User::where('id',$user_id)->get());
         }

    function movies_in_list($user_list_id){
        return UserList::where('id',$user_list_id)->with('movies')->get();
    }
}
