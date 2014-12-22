<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-16
 * Time: 下午3:21
 */

class AdminController extends BaseController {

    public function __construct()
    {
        //$this->beforeFilter('adminauth', ['only' => ['index',]]);
        $this->beforeFilter('adminauth');
    }

    public function index()
    {
        $users = User::all();
        return View::make('admin.index',array('user_list'=>$users));
    }

    public function lists($id)
    {
        $users = User::all();
        return View::make('admin.index',array('user_list'=>$users));
    }

    public function createuser()
    {
        if (Input::has('addnew'))
        {

            $email = Input::get('username');
            $password = Input::get('password');

            $newuser = new User;
            $newuser->email = $email;
            $newuser->password = Hash::make($password);
            $newuser->save();

            return Redirect::action('AdminController@index');
        }
        return View::make('admin.create');
    }

    public function deleteuser($id)
    {
        $user = User::where('id','=',$id)->delete();
        return Redirect::action('AdminController@index');
    }

    public function updateuser($id)
    {
        $user = User::where('id','=',$id)->get();
        if (Input::has('editnew'))
        {

            $email = Input::get('username');
            $password = Input::get('password');

            $data = array(
                'email'=>$email,
                'password'=>Hash::make($password),
            );

            $newuser = User::where('id','=',$id)->update($data);
            return Redirect::action('AdminController@index');
        }
        return View::make('admin.edit',array('user_item'=>$user[0]));
    }

}