<?php

namespace App\Controllers;

use App\Models\IncidentModel;
use App\Models\InventoryModel;
use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function index()
    {
        $incidentModel = new IncidentModel();
        $inventoryModel = new InventoryModel();

        // Get the current date and the date one month ago
        $currentDate = date('Y-m-d H:i:s');
        $oneMonthAgo = date('Y-m-d H:i:s', strtotime('-1 month'));

        // Get incident data from the last month
        $incidents = $incidentModel->select('severity, COUNT(*) as count')
                                   ->where('created_at >=', $oneMonthAgo)
                                   ->where('created_at <=', $currentDate)
                                   ->groupBy('severity')
                                   ->findAll();

        // Prepare data for the chart
        $chartData = [
            'labels' => [],
            'data' => [],
        ];

        foreach ($incidents as $incident) {
            $chartData['labels'][] = ucfirst($incident['severity']);
            $chartData['data'][] = $incident['count'];
        }

        // Get inventory count
        $inventoryCount = $inventoryModel->countAll();

        // Pass data to the view
        $data['chartData'] = json_encode($chartData);
        $data['inventoryCount'] = $inventoryCount;
        return view('dashboard/index', $data);
    }
}
