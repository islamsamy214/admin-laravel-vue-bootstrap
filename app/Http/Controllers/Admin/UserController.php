<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Traits\ImageTrait;

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


    public function store(StoreUserRequest $request)
    {
        $request->validated();

        //encrypt password
        $form_data = $request->except(['password', 'password_confirmation', 'image']);
        $form_data['password'] = bcrypt($request->password);

        //image uploading
        if ($request->image) {
            $form_data['image'] = $this->uploadImage($request->image, 'images/users');
        }
        dd($form_data['image']);

        User::create($form_data);
    } //end of store


    public function edit(User $user)
    {
        return $user;
    } //end of edit


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['mimes:jpeg,jpg,png,gif', 'max:2000'],
        ]);

        //encrypt password
        $form_data = $request->except(['password', 'password_confirmation', 'image']);
        $form_data['password'] = bcrypt($request->password);

        //image uploading
        if ($request->image) {
            if ($user->image != 'default.jpg') {
                $this->deleteImage($user->image, 'users/');
            }
            $form_data['image'] = $this->uploadImage($request->image, 'images/users');
        }

        $user->update($form_data);
    } //end of update


    public function destroy(User $user)
    {
        if ($user->image != 'default.jpg') {
            $this->deleteImage($user->image, 'users/');
        }
        $user->delete();
    } //end of destroy
}
