<?php
namespace App\Controllers;

use App\Models\IncidentModel;

class IncidentManagement extends BaseController
{
    public function index()
    {
        $model = new IncidentModel();
        $data['incidents'] = $model->findAll();
        return view('incident_management/index', $data);
    }

    public function create()
    {
        return view('incident_management/create');
    }

    public function store()
    {
        $model = new IncidentModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'severity' => $this->request->getPost('severity'),
            'status' => $this->request->getPost('status'),
            'escalation_level' => $this->request->getPost('escalation_level'),
            'actions_taken' => $this->request->getPost('actions_taken')
        ];
        $model->save($data);
        return redirect()->to('/incident-management');
    }

    public function edit($id)
    {
        $model = new IncidentModel();
        $data['incident'] = $model->find($id);
        return view('incident_management/edit', $data);
    }

    public function update($id)
    {
        $model = new IncidentModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'severity' => $this->request->getPost('severity'),
            'status' => $this->request->getPost('status'),
            'escalation_level' => $this->request->getPost('escalation_level'),
            'actions_taken' => $this->request->getPost('actions_taken')
        ];
        $model->update($id, $data);
        return redirect()->to('/incident-management');
    }

    public function delete($id)
    {
        $model = new IncidentModel();
        $model->delete($id);
        return redirect()->to('/incident-management');
    }
}
