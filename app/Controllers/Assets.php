<?php

namespace App\Controllers;

use App\Models\AssetModel;

class Assets extends BaseController
{
    public function index()
    {
        $model = new AssetModel();
        $data['assets'] = $model->findAll();
        return view('assets/index', $data);
    }

    public function create()
    {
        return view('assets/create');
    }

    public function store()
    {
        $model = new AssetModel();
        $data = [
            'asset_name' => $this->request->getPost('asset_name'),
            'type' => $this->request->getPost('type'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'purchase_date' => $this->request->getPost('purchase_date'),
            'critical_status' => $this->request->getPost('critical_status') ? 1 : 0
        ];
        $model->save($data);
        return redirect()->to('/assets');
    }

    public function edit($id)
    {
        $model = new AssetModel();
        $data['asset'] = $model->find($id);
        return view('assets/edit', $data);
    }

    public function update($id)
    {
        $model = new AssetModel();
        $data = [
            'asset_name' => $this->request->getPost('asset_name'),
            'type' => $this->request->getPost('type'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'purchase_date' => $this->request->getPost('purchase_date'),
            'critical_status' => $this->request->getPost('critical_status') ? 1 : 0
        ];
        $model->update($id, $data);
        return redirect()->to('/assets');
    }

    public function delete($id)
    {
        $model = new AssetModel();
        $model->delete($id);
        return redirect()->to('/assets');
    }
}
