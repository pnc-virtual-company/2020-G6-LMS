<?php namespace App\Filters;
// filter create for protect dashboard or url and need go to filter.php in config
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersCheck implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $uri = service('uri');
        if($uri->getSegment(1) == 'user'){
            if($uri->getSegment(2) == ''){
                $segment = '/';
            }else{
                $segment = '/'.$uri->getSegment(2);
            }
           return redirect()->to($segment);
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}