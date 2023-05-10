<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImageTrait;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
<<<<<<< HEAD
use App\Models\Team;
use App\Models\Role;
use Illuminate\Support\Str;
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

class UserController extends Controller
{
    use ImageTrait;

    private $paginate_users = 10;

    public function index(Request $request)
    {
        if ($request->search) {
            $users = $this->getSearch($request);
        } else {
            $users = $this->getUsers();
        }
        return $users;
    } //end of index


    public function getUsers()
    {
        $users = User::where('email', '!=', 'super_admin@app.com')->latest()->paginate($this->paginate_users);
        return $users;
    } //end of getUsers


    public function getSearch($request)
    {
        $users = User::where('email', '!=', 'super_admin@app.com')
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->latest()->paginate($this->paginate_users)->toArray();

        // pop super_admin@app.com from the collercion
        $users['data'] = array_filter($users['data'], function ($user) {
            return $user['email'] != 'super_admin@app.com';
        });

        return $users;
    } //end of getSearch

<<<<<<< HEAD
    public function create()
    {
        return response()->json(['teams' => Team::all(), 'roles' => Role::all()]);
    } //end of create
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

    public function store(StoreUserRequest $request)
    {
        //encrypt password
        $form_data = $request->except(['password', 'password_confirmation', 'image']);
<<<<<<< HEAD
        // $form_data['password'] = bcrypt($request->password);

        //image uploading
        // $request->image ? $form_data['image'] = $this->img($request->image, 'images/users/') : '';

        // generate random email
        $form_data['email'] = Str::random(10) . '@app.com';
        $form_data['password'] = bcrypt($form_data['email']);
        $form_data['image'] = 'assets/images/user.png';
=======
        $form_data['password'] = bcrypt($request->password);

        //image uploading
        $request->image ? $form_data['image'] = $this->img($request->image, 'images/users/') : '';
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

        $user = User::create($form_data);

        // send test mail to user
<<<<<<< HEAD
        // Mail::to($user)->send(new TestMail($user));
=======
        Mail::to($user)->send(new TestMail($user));
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

        return response()->json(__('User Created Successfully'));
    } //end of store


    public function edit(User $user)
    {
<<<<<<< HEAD
        return response()->json(['user' => $user, 'teams' => Team::all(), 'roles' => Role::all()]);
=======
        return $user;
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    } //end of edit


    public function update(UpdateUserRequest $request, User $user)
    {
        //encrypt password
        $form_data = $request->except(['password', 'password_confirmation', 'image']);
<<<<<<< HEAD
        // $form_data['password'] = bcrypt($request->password);

        //image uploading
        // if ($request->image) {
        //     $user->image ? $this->deleteImg($user->image) : '';
        //     $form_data['image'] = $this->img($request->image, 'images/users/');
        // } else {
        //     $form_data['image'] = $user->image;
        // }
        $form_data['email'] = Str::random(10) . '@app.com';
        $form_data['password'] = bcrypt($form_data['email']);
        $form_data['image'] = 'assets/images/user.png';
        
=======
        $form_data['password'] = bcrypt($request->password);

        //image uploading
        if ($request->image) {
            $user->image ? $this->deleteImg($user->image) : '';
            $form_data['image'] = $this->img($request->image, 'images/users/');
        } else {
            $form_data['image'] = $user->image;
        }
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        $user->update($form_data);
        return response()->json(__('User Updated Successfully'));
    } //end of update


    public function destroy(User $user)
    {
<<<<<<< HEAD
        $user->image != 'assets/images/user.png' ? $this->deleteImg($user->image) : '';
=======
        $user->image != 'images/default.jpg' ? $this->deleteImg($user->image) : '';
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        $user->delete();
    } //end of destroy
}
