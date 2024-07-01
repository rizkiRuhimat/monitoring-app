<?php

namespace App\Controllers;

use App\Models\ChangeModel;

class Changes extends BaseController
{
    public function index()
    {
        $model = new ChangeModel();
        $data['changes'] = $model->findAll();
        return view('changes/index', $data);
    }

    public function create()
    {
        return view('changes/create');
    }

    public function store()
    {
        $model = new ChangeModel();
        $file = $this->request->getFile('file');
        $filePath = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $filePath = $newName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'requested_by' => $this->request->getPost('requested_by'),
            'approved_by' => $this->request->getPost('approved_by'),
            'file_path' => $filePath,
        ];
        $model->save($data);
        return redirect()->to('/changes');
    }

    public function edit($id)
    {
        $model = new ChangeModel();
        $data['change'] = $model->find($id);
        return view('changes/edit', $data);
    }

    public function update($id)
    {
        $model = new ChangeModel();
        $file = $this->request->getFile('file');
        $filePath = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $filePath = $newName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'requested_by' => $this->request->getPost('requested_by'),
            'approved_by' => $this->request->getPost('approved_by'),
            'file_path' => $filePath ?: $model->find($id)['file_path'],
        ];
        $model->update($id, $data);
        return redirect()->to('/changes');
    }

    public function delete($id)
    {
        $model = new ChangeModel();
        $model->delete($id);
        return redirect()->to('/changes');
    }

    public function download($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;
        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($filename);
        }

        return $this->response->download($path, null);
    }
}
