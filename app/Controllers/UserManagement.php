<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserManagement extends BaseController
{
    public function __construct()
    {
        // Ensure the user is logged in and is an admin
        $this->session = session();
        if (!$this->session->get('logged_in') || $this->session->get('role') !== 'admin') {
            return redirect()->to('/login')->send();
        }
    }

    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('user_management/index', $data);
    }

    public function create()
    {
        return view('user_management/create');
    }

    public function store()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ];
        $model->save($data);
        return redirect()->to('/user-management');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('user_management/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ];
        $model->update($id, $data);
        return redirect()->to('/user-management');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/user-management');
    }
}
