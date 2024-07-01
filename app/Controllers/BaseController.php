<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{
    protected $helpers = ['form'];

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = session();
    }

    protected function isAuthorized($role)
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('/login');
        }
        if ($this->session->get('role') !== $role) {
            return redirect()->to('/unauthorized');
        }
    }
}
