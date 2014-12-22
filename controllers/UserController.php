<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-15
 * Time: 下午4:59
 */

class UserController extends BaseController {



    public function login()
    {

        if (Auth::check())
        {
            return Redirect::intended('/');
        }

        if (Input::has('username'))
        {
            //
            $email = Input::get('username');
            $password = Input::get('password');
            //$isAutologin = Input::get('autologin') == "true" ? true : false;

            if (Auth::attempt(array('email' => $email, 'password' => $password)))
            {
                return Redirect::intended('/');
            }

        }

        $this->layout->content = View::make('user.login');

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::intended('login');
    }

    public function profile()
    {
        return View::make('user.profile');
    }


    public function update()
    {
        if (Input::has('editnew'))
        {
            $uid = Auth::user()->id;
            $user = User::where('id','=',$uid)->get();
            $originpassword = Input::get('originpwd');
            if (Hash::check($originpassword, $user[0]->password))
            {
                // 密码匹配...
                $password = Input::get('newpwd');

                $data = array(
                    'password'=>Hash::make($password),
                );

                $newuser = User::where('id','=',$uid)->update($data);
                return Redirect::to('/');
            }
            else
            {
                return Redirect::action('UserController@profile');

            }

        }

    }


} 