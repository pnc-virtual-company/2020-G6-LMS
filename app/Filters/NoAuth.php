<?php namespace App\Filters;
// filter create for protect dashboard or url and need go to filter.php in config
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoAuth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if(session()->get('isLoggedIn')){
            return redirect()->to('/yourLeave');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}