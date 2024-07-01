<?php
namespace App\Controllers;

use App\Models\MonitoringParametersModel;

class MonitoringParameters extends BaseController
{
    public function index()
    {
        $model = new MonitoringParametersModel();
        $data['parameters'] = $model->findAll();
        return view('monitoring_parameters/index', $data);
    }

    public function create()
    {
        $data['parameter_names'] = $this->getParameterNames();
        $data['service_names'] = $this->getServiceNames();
        return view('monitoring_parameters/create', $data);
    }

    public function store()
    {
        $model = new MonitoringParametersModel();
        $data = [
            'parameter_name' => $this->request->getPost('parameter_name'),
            'threshold' => $this->request->getPost('threshold'),
            'kpi_indicator' => $this->request->getPost('kpi_indicator') ? 1 : 0,
            'description' => $this->request->getPost('description'),
            'hostname' => $this->request->getPost('hostname'),
            'ip_address' => $this->request->getPost('ip_address'),
            'service_name' => $this->request->getPost('service_name')
        ];
        $model->save($data);
        return redirect()->to('/monitoring-parameters');
    }

    public function edit($id)
    {
        $model = new MonitoringParametersModel();
        $data['parameter'] = $model->find($id);
        $data['parameter_names'] = $this->getParameterNames();
        $data['service_names'] = $this->getServiceNames();
        return view('monitoring_parameters/edit', $data);
    }

    public function update($id)
    {
        $model = new MonitoringParametersModel();
        $data = [
            'parameter_name' => $this->request->getPost('parameter_name'),
            'threshold' => $this->request->getPost('threshold'),
            'kpi_indicator' => $this->request->getPost('kpi_indicator') ? 1 : 0,
            'description' => $this->request->getPost('description'),
            'hostname' => $this->request->getPost('hostname'),
            'ip_address' => $this->request->getPost('ip_address'),
            'service_name' => $this->request->getPost('service_name')
        ];
        $model->update($id, $data);
        return redirect()->to('/monitoring-parameters');
    }

    public function delete($id)
    {
        $model = new MonitoringParametersModel();
        $model->delete($id);
        return redirect()->to('/monitoring-parameters');
    }

    private function getParameterNames()
    {
        // Define the list of parameter names
        return [
            'CPU Utilization',
            'Memory Usage',
            'Disk Space',
            'Application Response Time',
            // Add more parameter names as needed
        ];
    }

    private function getServiceNames()
    {
        // Define the list of service names
        return [
            'Web Server',
            'Database Server',
            'Application Server',
            // Add more service names as needed
        ];
    }
}
