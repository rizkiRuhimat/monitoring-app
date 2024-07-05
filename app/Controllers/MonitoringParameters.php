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
        $data['functional_servers'] = $this->getFunctionalServers();
        $data['resource_names'] = $this->getResourceNames();
        return view('monitoring_parameters/create', $data);
    }

    public function store()
    {
        $model = new MonitoringParametersModel();
        $monitorCategory = $this->request->getPost('monitor_category');
        $ipServer = $this->request->getPost('ip_server');
        $environment = $this->request->getPost('environment');
        $id = $this->request->getPost('id');

        if ($monitorCategory == 'server') {
            $data = [
                'ip_server' => $ipServer,
                'environment' => $environment,
                'monitor_category' => $monitorCategory,
                'id' => $id,
                'resources' => json_encode($this->request->getPost('resources')),
                'warning_thresholds' => json_encode($this->request->getPost('warning_thresholds')),
                'err_thresholds' => json_encode($this->request->getPost('err_thresholds')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        } elseif ($monitorCategory == 'services') {
            $data = [
                'ip_server' => $ipServer,
                'environment' => $environment,
                'monitor_category' => $monitorCategory,
                'id' => $id,
                'services_name' => json_encode($this->request->getPost('services_name')),
                'service_ports' => json_encode($this->request->getPost('service_ports')),
                'status' => json_encode($this->request->getPost('status')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $model->save($data);
        return redirect()->to('/monitoring_parameters');
    }

    public function edit($id)
    {
        $model = new MonitoringParametersModel();
        $data['parameter'] = $model->find($id);
        $data['parameter_names'] = $this->getParameterNames();
        $data['service_names'] = $this->getServiceNames();
        $data['functional_servers'] = $this->getFunctionalServers();
        $data['resource_names'] = $this->getResourceNames();
        return view('monitoring_parameters/edit', $data);
    }

    public function update($id)
    {
        $model = new MonitoringParametersModel();
        $monitorCategory = $this->request->getPost('monitor_category');
        $ipServer = $this->request->getPost('ip_server');
        $environment = $this->request->getPost('environment');

        if ($monitorCategory == 'server') {
            $data = [
                'ip_server' => $ipServer,
                'environment' => $environment,
                'monitor_category' => $monitorCategory,
                'resources' => json_encode($this->request->getPost('resources')),
                'warning_thresholds' => json_encode($this->request->getPost('warning_thresholds')),
                'err_thresholds' => json_encode($this->request->getPost('err_thresholds')),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        } elseif ($monitorCategory == 'services') {
            $data = [
                'ip_server' => $ipServer,
                'environment' => $environment,
                'monitor_category' => $monitorCategory,
                'services_name' => json_encode($this->request->getPost('services_name')),
                'service_ports' => json_encode($this->request->getPost('service_ports')),
                'status' => json_encode($this->request->getPost('status')),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

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
            'InfluxDB',
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
            'Others',
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
