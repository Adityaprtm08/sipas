<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // jika user belum login
    if(session()->get('logged_in') != TRUE){
    // maka redirct ke halaman login
      return redirect()->to('/Auth'); 
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // jika user belum login
    if(session()->get('logged_in') == TRUE){
      return redirect()->to('/Dashboard'); 
    }
  }
}