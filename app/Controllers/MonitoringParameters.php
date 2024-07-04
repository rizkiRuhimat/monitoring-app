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
        $data['tools_names'] = $this->getToolsNames();
        $data['service_names'] = $this->getServiceNames();
        $data['functional_servers'] = $this->getFunctionalServers();
        // $data['resource_names'] = $this->getResourceNames();
        return view('monitoring_parameters/create', $data);
    }

    public function store()
    {
        $model = new MonitoringParametersModel();
        $tags = $this->request->getPost('tags');
        $data = [
            'monitoring_tool' => $this->request->getPost('monitoring_tool'),
            'ip_address' => $this->request->getPost('ip_address'),
            'name_server' => $this->request->getPost('name_server'),
            'functional_server' => $this->request->getPost('functional_server'),
            'services' => $this->request->getPost('services'),
            'ports_service' => $this->request->getPost('ports_service'),
            // 'resources' => $this->request->getPost('resources'),
            // 'thresholds' => $this->request->getPost('thresholds'),
            'kpi_indicator' => $this->request->getPost('kpi_indicator') ? 1 : 0,
            'tags' => json_encode($tags),
            'description' => $this->request->getPost('description'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $model->save($data);
        return redirect()->to('/monitoring_parameters');
    }

    public function edit($id)
    {
        $model = new MonitoringParametersModel();
        $data['parameter'] = $model->find($id);
        $data['parameter_names'] = $this->getParameterNames();
        $data['tools_names'] = $this->getToolsNames();
        $data['service_names'] = $this->getServiceNames();
        $data['functional_servers'] = $this->getFunctionalServers();
        // $data['resource_names'] = $this->getResourceNames();
        return view('monitoring_parameters/edit', $data);
    }

    public function update($id)
    {
        $model = new MonitoringParametersModel();
        $tags = $this->request->getPost('tags');
        $data = [
            'monitoring_tool' => $this->request->getPost('monitoring_tool'),
            'ip_address' => $this->request->getPost('ip_address'),
            'name_server' => $this->request->getPost('name_server'),
            'functional_server' => $this->request->getPost('functional_server'),
            'services' => $this->request->getPost('services'),
            'ports_service' => $this->request->getPost('ports_service'),
            // 'resources' => $this->request->getPost('resources'),
            // 'thresholds' => $this->request->getPost('thresholds'),
            'kpi_indicator' => $this->request->getPost('kpi_indicator') ? 1 : 0,
            'tags' => json_encode($tags),
            'description' => $this->request->getPost('description'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $model->update($id, $data);
        return redirect()->to('/monitoring_parameters');
    }

    public function delete($id)
    {
        $model = new MonitoringParametersModel();
        $model->delete($id);
        return redirect()->to('/monitoring_parameters');
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
    
    private function getToolsNames()
    {
        // Define the list of service names
        return [
            'PRTG',
            'Grafana',
            'Native',
            // Add more service names as needed
        ];
    }


    private function getServiceNames()
    {
        // Define the list of service names
        return [
            'Apache2',
            'Docker',
            'Kannel',
            'MSSQL Server',
            'Mysql',
            'NginX',
            'PostgreSQL',
            'Redis',
            'RabbitMQ',
            'Others',
            // Add more service names as needed
        ];
    }

    private function getFunctionalServers()
    {
        // Define the list of functional servers
        return [
            'Web Server',
            'Database Server',
            'Application Server',
            // Add more functional servers as needed
        ];
    }

    private function getResourceNames()
    {
        // Define the list of resource names
        return [
            'CPU',
            'Memory',
            'Disk',
            'Network',
            // Add more resource names as needed
        ];
    }
}
