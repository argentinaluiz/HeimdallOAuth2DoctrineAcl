<?php
namespace Status\V1\Rpc\Ping;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class PingController extends AbstractActionController
{
    public function pingAction()
    {

        $user = $this->getIdentity();
        $identity   = $user->getAuthenticationIdentity();
        $idn = $identity['user'];
        $u = $idn->getUsername();
        $user = $this->getIdentity()->getUser()->getUsername();
        $time = date('d/m/Y H:i:s', $identity['expires']);
        $now  = date('d/m/Y H:i:s', time());

        $identity['expire-dt'] = $time;
        return new ViewModel([
            'ack'    => time(),
            'ack-dt' => $now,
            'user'   => $identity
        ]);
    }
}
