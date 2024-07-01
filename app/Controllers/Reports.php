<?php
namespace App\Controllers;

use App\Models\IncidentModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class Reports extends BaseController
{
    public function index()
    {
        // Load necessary data for filters
        $incidentModel = new IncidentModel();
        $data['incidents'] = $incidentModel->findAll();
        return view('reports/index', $data);
    }

    public function generate()
    {
        $incidentModel = new IncidentModel();

        // Get filter inputs
        $fromDate = $this->request->getPost('from_date');
        $toDate = $this->request->getPost('to_date');
        $severity = $this->request->getPost('severity');
        $status = $this->request->getPost('status');

        // Build query with filters
        $incidentsQuery = $incidentModel->where('created_at >=', $fromDate)
                                        ->where('created_at <=', $toDate);

        if ($severity) {
            $incidentsQuery->where('severity', $severity);
        }

        if ($status) {
            $incidentsQuery->where('status', $status);
        }

        $incidents = $incidentsQuery->findAll();

        // Pass data to the view for display or export
        $data['incidents'] = $incidents;
        return view('reports/report', $data);
    }

    public function download()
    {
        $incidentModel = new IncidentModel();

        // Get filter inputs
        $fromDate = $this->request->getPost('from_date');
        $toDate = $this->request->getPost('to_date');
        $severity = $this->request->getPost('severity');
        $status = $this->request->getPost('status');

        // Build query with filters
        $incidentsQuery = $incidentModel->where('created_at >=', $fromDate)
                                        ->where('created_at <=', $toDate);

        if ($severity) {
            $incidentsQuery->where('severity', $severity);
        }

        if ($status) {
            $incidentsQuery->where('status', $status);
        }

        $incidents = $incidentsQuery->findAll();

        // Generate CSV
        $filename = 'incident_report_' . Time::now()->toDateString() . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $file = fopen('php://output', 'w');
        fputcsv($file, ['Incident ID', 'Title', 'Description', 'Severity', 'Status', 'Escalation Level', 'Actions Taken', 'Created At']);
        foreach ($incidents as $incident) {
            fputcsv($file, [
                $incident['id'], $incident['title'], $incident['description'],
                $incident['severity'], $incident['status'], $incident['escalation_level'],
                $incident['actions_taken'], $incident['created_at']
            ]);
        }

        fclose($file);
        exit;
    }
}
