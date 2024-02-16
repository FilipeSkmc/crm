<?php

namespace App\Http\Controllers;

class AbstractController extends Controller
{
  protected $serviceClass;
  protected $service;

  public function __construct()
  {
    $this->service = new $this->serviceClass;
  }
}
