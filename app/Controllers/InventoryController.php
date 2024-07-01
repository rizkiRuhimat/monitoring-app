<?php
namespace App\Controllers;

use App\Models\InventoryModel;

class InventoryController extends BaseController
{
    public function index()
    {
        $model = new InventoryModel();
        $data['inventory'] = $model->findAll();
        return view('inventory/index', $data);
    }

    public function create()
    {
        return view('inventory/create');
    }

    public function store()
    {
        $model = new InventoryModel();
        $data = [
            'assetName' => $this->request->getPost('assetName'),
            'assetType' => $this->request->getPost('assetType'),
            'criticality' => $this->request->getPost('criticality'),
            'owner' => $this->request->getPost('owner'),
            'description' => $this->request->getPost('description')
        ];
        $model->save($data);
        return redirect()->to('/inventory');
    }

    public function edit($id)
    {
        $model = new InventoryModel();
        $data['inventory'] = $model->find($id);
        return view('inventory/edit', $data);
    }

    public function update($id)
    {
        $model = new InventoryModel();
        $data = [
            'assetName' => $this->request->getPost('assetName'),
            'assetType' => $this->request->getPost('assetType'),
            'criticality' => $this->request->getPost('criticality'),
            'owner' => $this->request->getPost('owner'),
            'description' => $this->request->getPost('description')
        ];
        $model->update($id, $data);
        return redirect()->to('/inventory');
    }

    public function delete($id)
    {
        $model = new InventoryModel();
        $model->delete($id);
        return redirect()->to('/inventory');
    }
}