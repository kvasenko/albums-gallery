<?php
/**
 * Created by PhpStorm.
 * User: kvasenko
 * Date: 28.10.16
 * Time: 10:21
 */

namespace App\Gallery_Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    protected $handlerName;

    protected $handler;

    public function getHandler()
    {
        $this->handler = $this->get($this->handlerName);

        return $this->handler;
    }
}
