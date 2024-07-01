<?php
namespace App\Controllers;

use App\Models\IncidentModel;
use App\Models\AlertModel;
use CodeIgniter\Controller;

class Alerts extends BaseController
{
    public function index()
    {
        $model = new AlertModel();
        $data['alerts'] = $model->findAll();
        return view('alerts/index', $data);
    }

    public function create()
    {
        return view('alerts/create');
    }

    public function store()
    {
        $model = new AlertModel();
        $data = [
            'type' => $this->request->getPost('type'),
            'threshold' => $this->request->getPost('threshold'),
            'email' => $this->request->getPost('email'),
            'chat_id' => $this->request->getPost('chat_id'),
        ];
        $model->save($data);
        return redirect()->to('/alerts');
    }

    public function edit($id)
    {
        $model = new AlertModel();
        $data['alert'] = $model->find($id);
        return view('alerts/edit', $data);
    }

    public function update($id)
    {
        $model = new AlertModel();
        $data = [
            'type' => $this->request->getPost('type'),
            'threshold' => $this->request->getPost('threshold'),
            'email' => $this->request->getPost('email'),
            'chat_id' => $this->request->getPost('chat_id'),
        ];
        $model->update($id, $data);
        return redirect()->to('/alerts');
    }

    public function delete($id)
    {
        $model = new AlertModel();
        $model->delete($id);
        return redirect()->to('/alerts');
    }

    public function checkAlerts()
    {
        $incidentModel = new IncidentModel();
        $alertModel = new AlertModel();

        // Get all alerts
        $alerts = $alertModel->findAll();

        foreach ($alerts as $alert) {
            // Check the condition for each alert type
            if ($alert['type'] == 'incident_severity') {
                $incidentCount = $incidentModel->where('severity', 'high')->countAllResults();
                if ($incidentCount > $alert['threshold']) {
                    // Send email notification
                    $this->sendEmailNotification($alert['email'], 'High severity incidents exceeded threshold', 'There are currently ' . $incidentCount . ' high severity incidents.');
                    
                    // Send Telegram notification
                    if ($alert['chat_id']) {
                        $this->sendTelegramNotification($alert['chat_id'], 'High severity incidents exceeded threshold. There are currently ' . $incidentCount . ' high severity incidents.');
                    }
                }
            }
        }
    }

    private function sendEmailNotification($to, $subject, $message)
    {
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);
        $email->send();
    }

    private function sendTelegramNotification($chatId, $message)
    {
        $botToken = 'YOUR_TELEGRAM_BOT_TOKEN'; // Replace with your Telegram bot token
        $url = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';
        $data = [
            'chat_id' => $chatId,
            'text' => $message
        ];

        $options = [
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        file_get_contents($url, false, $context);
    }
}
