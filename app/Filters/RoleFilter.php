<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!logged_in()) {
            return redirect()->to('/login');
        }

        $role = $arguments[0] ?? null;

        if (!in_groups($role)) {
            // Redirect user ke halaman sesuai role mereka
            if (in_groups('teller')) {
                return redirect()->to('/teller');
            } elseif (in_groups('customer_service')) {
                return redirect()->to('/cs');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu aksi setelah request selesai
    }
}
