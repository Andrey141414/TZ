<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\bookModel;
use Illuminate\Support\Facades\Validator;
class userController extends Controller
{
    public function userInfo(User $user)
    {
        
        return response()->json([
            'id'=> $user->id,
            'email'=> $user->email ,
            'name' => $user->name,
            ]);
    }

//Реализовать метод получения одного пользователя +

    public function get_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:App\Models\User,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error'
            ], 400);
        }

        $user = (new User())->where('id',$request->input('id_user'))->first();
        return $user;
       
    }

//Реализовать метод получения всех пользователей +

    public function get_all_user()
    {
        return User::all();
    }


//Реализовать метод изменения одного пользователя  +

    public function update_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user'=>'required|exists:App\Models\User,id',
            'name' => 'required|between:2,100',
            'email' => 'required|email|unique:users|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error'
            ], 400);
        }       
        $user = User::where('id',$request->input('id_user'))->first();
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
       
        $user->save();


    return response()->json([
        'message' => 'Successfully updated',
        'user' => $user
    ], 200);

    }
//Реализовать метод удаления одного пользователя +
    public function delete_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:App\Models\User,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error'
            ], 400);
        }

        $user = User::where('id',$request->input('id_user'))->first()->delete();
        return response()->json([
            'message' => 'user was deleted'
        ], 200);
    }

   

//Реализовать метод изменения нескольких пользователей по id

    public function update_many_user(Request $request)
    {
        $data = $request->input('data');
        
        $users = array();
        foreach($data as $part)
        {
        
            $validator = Validator::make($part, [
            'id_user'=>'required|exists:App\Models\User,id',
            'name' => 'required|between:2,100',
            'email' => 'required|email|unique:users|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error'
            ], 400);
        };
        $user = User::where('id',$part['id_user'])->first();
       
        $user->name = $part['name'];
        $user->email = $part['email'];
        array_push($users,$user);
        $user->save();
        }
        return response()->json([
            'message' => 'Successfully updated',
            'users'=>$users
        ], 200);
    }


    //Реализовать метод удаления нескольких пользователей по id

    public function delete_many_user(Request $request)
    {
        $count_users = User::count();
        if($count_users == 0)
        {
            return response()->json([
                'message' => 'There is no users in table'
            ], 400); 
        }
        
        $validator = Validator::make($request->all(), [
            'id_users' => 'required|exists:App\Models\User,id|between:1,count_users',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error'
            ], 400);
        }


        $id_users = $request->get('id_users');

foreach($id_users as $id_user)
    {
        $user = User::where('id',$id_user)->first()->delete();
        
   } 
   return response()->json([
    'message' => 'user was deleted'
], 200);
}
    
    
}
