<?php
namespace App\Controllers;

use App\Models\DocumentationModel;

class Documentation extends BaseController
{
    public function index()
    {
        $model = new DocumentationModel();
        $data['documentation'] = $model->findAll();
        return view('documentation/index', $data);
    }

    public function create()
    {
        return view('documentation/create');
    }

    public function store()
    {
        $model = new DocumentationModel();
        $file = $this->request->getFile('file');
        $filePath = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $filePath = $newName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'file_path' => $filePath,
        ];
        $model->save($data);
        return redirect()->to('/documentation');
    }

    public function edit($id)
    {
        $model = new DocumentationModel();
        $data['documentation'] = $model->find($id);
        return view('documentation/edit', $data);
    }

    public function update($id)
    {
        $model = new DocumentationModel();
        $file = $this->request->getFile('file');
        $filePath = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $filePath = $newName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'file_path' => $filePath ?: $model->find($id)['file_path'],
        ];
        $model->update($id, $data);
        return redirect()->to('/documentation');
    }

    public function delete($id)
    {
        $model = new DocumentationModel();
        $model->delete($id);
        return redirect()->to('/documentation');
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
