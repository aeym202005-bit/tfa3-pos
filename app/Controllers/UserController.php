<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();

        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
    {
        helper(['form', 'url']);

        $rules = [
            'username'  => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'password'  => 'required|min_length[6]',
            'avatar'    => 'uploaded[avatar]|is_image[avatar]|max_size[avatar,2048]'
        ];

        if (! $this->validate($rules)) {
            return view('users/new', [
                'validation' => $this->validator
            ]);
        }

        $avatarFile = $this->request->getFile('avatar');
        $avatarName = '';

        if ($avatarFile && $avatarFile->isValid() && ! $avatarFile->hasMoved()) {
            $avatarName = $avatarFile->getRandomName();
            $avatarFile->move(FCPATH . 'uploads', $avatarName);
        }

        $model = new UserModel();
        $model->save([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'avatar'    => $avatarName
        ]);

        return redirect()->to('/users')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);

        if (empty($data['user'])) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        return view('users/edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $rules = [
            'username'  => "required|min_length[3]|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'avatar'    => 'permit_empty|is_image|max_size[avatar,2048]'
        ];

        if (! $this->validate($rules)) {
            $model = new UserModel();
            return view('users/edit', [
                'user'       => $model->find($id),
                'validation' => $this->validator
            ]);
        }

        $model = new UserModel();
        $userData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
        ];

        // Handle optional password update (only if a new one is typed in)
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Handle optional new avatar upload
        $avatarFile = $this->request->getFile('avatar');
        if ($avatarFile && $avatarFile->isValid() && ! $avatarFile->hasMoved()) {
            $avatarName = $avatarFile->getRandomName();
            $avatarFile->move(FCPATH . 'uploads', $avatarName);
            $userData['avatar'] = $avatarName;
        }

        $model->update($id, $userData);

        return redirect()->to('/users')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('/users')->with('success', 'User deleted successfully!');
    }
}