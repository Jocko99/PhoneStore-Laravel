<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\User\UserModel;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    public function index(){
        return view("pages.admin.users.users",$this->data);
    }

    public function showUsers(Request $request){
        $users = $this->userModel->getAllUsers($request);
        return response()->json($users);
    }

    public function edit($user){
        $find = $this->userModel->findUser($user);
        $this->data["users"] = $find;
        return view("pages.admin.users.edit-user",$this->data);
    }
    public function update(Request $request){
        return response()->json($this->userModel->updateUser($request));
    }
    public function delete(Request $request){
        $id = $request->input("id");
        return response()->json($this->userModel->deleteUser($id));
    }
}
