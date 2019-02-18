<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use App\User;
use App\Category;
use App\Post;
use App\Profile;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
      $state = $request->get('state');
      $request->session()->put('state',$state);
      session()->regenerate();
      $user = Socialite::driver('google')->user();
      

      $userInfo = User::where('email', $user->getEmail())->first();
      if(isset($userInfo)){
        \Auth::login($userInfo, true);
        return redirect()->guest('admin/dashboard');
      }else{
        $userInsert = new User();
        $userInsert->name = $user->getName();
        $userInsert->email = $user->getEmail();
        $userInsert->password = bcrypt('password');
        $userInsert->save();
        $userInfo = User::where('email', $user->getEmail())->first();
        $id = $userInfo[0]['id'];
        Profile::create([
          'user_id' => $userInfo['id'],
          'avatar' => $user->getAvatar(),
          'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'facebook' => 'https://www.facebook.com',
          'youtube' => 'https://www.youtube.com'
        ]);


        \Auth::login($userInsert, true);
        return redirect()->guest('admin/dashboard');
      }
      
    }

    // $token = $user->token;
       // echo $user->getName();
       // echo "<br>";
       // echo $user->getEmail();
       // echo "<br>";
       // echo "<img src=" . $user->getAvatar() . ">" . "<br>";
       // echo $user->getNickname() . "<br>";
       // echo $user->getId();
}