<?php
namespace App\Controllers;

use App\Models\ComplianceModel;

class Compliance extends BaseController
{
    public function index()
    {
        $model = new ComplianceModel();
        $data['compliance'] = $model->findAll();
        return view('compliance/index', $data);
    }

    public function create()
    {
        return view('compliance/create');
    }

    public function store()
    {
        $model = new ComplianceModel();
        $file = $this->request->getFile('file');
        $filePath = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $filePath = $newName;
        }

        $data = [
            'compliance_metric' => $this->request->getPost('compliance_metric'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'issue_date' => $this->request->getPost('issue_date'),
            'resolution_date' => $this->request->getPost('resolution_date'),
            'file_path' => $filePath,
        ];
        $model->save($data);
        return redirect()->to('/compliance');
    }

    public function edit($id)
    {
        $model = new ComplianceModel();
        $data['compliance'] = $model->find($id);
        return view('compliance/edit', $data);
    }

    public function update($id)
    {
        $model = new ComplianceModel();
        $file = $this->request->getFile('file');
        $filePath = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $filePath = $newName;
        }

        $data = [
            'compliance_metric' => $this->request->getPost('compliance_metric'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'issue_date' => $this->request->getPost('issue_date'),
            'resolution_date' => $this->request->getPost('resolution_date'),
            'file_path' => $filePath ?: $model->find($id)['file_path'],
        ];
        $model->update($id, $data);
        return redirect()->to('/compliance');
    }

    public function delete($id)
    {
        $model = new ComplianceModel();
        $model->delete($id);
        return redirect()->to('/compliance');
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
