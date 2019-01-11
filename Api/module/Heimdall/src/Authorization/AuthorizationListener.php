<?php

namespace Heimdall\Authorization;

use ZF\MvcAuth\MvcAuthEvent;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;
use Zend\EventManager\Event as ZendEvent;

class AuthorizationListener
{
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $authorization = $mvcAuthEvent->getAuthorizationService();
//
//        //Deny from all
//          $authorization->deny();
////
////        //Allow from all for oauth authentication
//        $list = $authorization->getRoles();
//        $r = $mvcAuthEvent->getMvcEvent()->getRouter();
//        $services = $mvcAuthEvent->getMvcEvent()->getApplication()->getServiceManager();
//        $identity = $services->get('authentication')->getIdentity();
//        $authorization->addResource('ZF\OAuth2\Controller\Auth::token');
//        $authorization->addResource('Heimdall\V1\Rest\User\Controller:::collection');
//        $authorization->allow(null, 'ZF\OAuth2\Controller\Auth::token');
//        $authorization->allow(null, 'Status\V1\Rpc\Ping\Controller::ping', 'GET');
//        $r2 = $authorization->isAllowed(null, 'Status\V1\Rpc\Ping\Controller::ping', 'GET');
//        $authorization->allow(null, 'Heimdall\V1\Rest\User\Controller:::collection', 'GET');

//return;
      //   Add application specific resources
//        $authorization->addResource('FooBar\V1\Rest\Foo\Controller::collection');
//        $authorization->allow(RoleFixture::USER, 'FooBar\V1\Rest\Foo\Controller::collection', 'GET');
    }

}




//namespace Status\Authorization;
//
//use Zend\View\Helper\ServerUrl;
//use ZF\MvcAuth\MvcAuthEvent;
//
//class AuthorizationListener
//{
//    protected $services;
//    protected $container;
//    protected $authorization;
//    protected $authentication;
//    protected $em;
//    protected $entity;
//    protected $client;
//    protected $identity;
//
//    public function __invoke(MvcAuthEvent $mvcAuthEvent)
//    {
//        $this->authorization = $mvcAuthEvent->getAuthorizationService();
//        $this->services = $mvcAuthEvent->getMvcEvent()->getApplication()->getServiceManager();
//        $this->container = $this->services->get('config');
//        $this->em = $this->services->get('Doctrine\ORM\EntityManager');
//        $this->entity = $this->em->getRepository("Heimdall\V1\Entity\User");
//        $this->getClient();
//        $this->acl();
//    }
//    private function getClient()
//    {
//        $this->identity = $this->services->get('authentication')->getIdentity();
//        if ($this->identity->getAuthenticationIdentity()) {
//            $authenticationIdentity = $this->identity->getAuthenticationIdentity();
//            $clientId = $authenticationIdentity['client_id'];
//            return $this->em->getRepository("Heimdall\V1\Entity\Client")->findOneBy(['clientId' => $clientId]);
//        }
//        return null;
//    }
//
//    private function acl()
//    {
//        //$this->authorization->deny();
//        if($this->getClient() instanceof \Heimdall\V1\Entity\Clients){
//            $list = $this->getClient()->getUsers();
//            $aclClients = $this->getClient()->getAclRole();
//            //$this->authorization->deny();
//            foreach ($aclClients as $acl){
//                $this->authorization->addRole($acl->getAclName(), $acl->getParent() ? $acl->getParent()->getAclName() : null );
//                if ($acl->getIsAdmin()){
//                    $this->authorization->allow($acl->getAclName(), null, null);
//                }
//            }
//
//            $privileges = $this->getClient()->getPrivileges();
//            foreach ($privileges as $priv){
//                $roles = $priv->getAclRole()->getAclName();
//                $resource = $priv->getAclResources()->getResourcesUrl();
//
//                if($priv->getGet() == true){
//                    $this->authorization->allow($roles, $resource, 'GET');
//                }
//                if($priv->getPost() == true){
//                    $this->authorization->allow($roles, $resource, 'POST');
//                }
//                if($priv->getUpdate() == true){
//                    $this->authorization->allow($roles, $resource, 'UPDATE');
//                }
//                if($priv->getDelete() == true){
//                    $this->authorization->allow($roles, $resource, 'DELETE');
//                }
//            }
//
//
//            $p = $this->authorization->getRoles();
//            $p2 = $this->authorization->getResources();
//            $r1 =
//            $r2 = $this->authorization->isAllowed('Editor', 'Status\V1\Rpc\Ping\Controller::ping', 'GET');
//
//          //  $r1 = $this->authorization->isAllowed('guest', 'Status\V1\Rpc\Ping\Controller::ping', 'GET');
//
////            foreach ($list as $user){
////               if($user->getDeleted() != true){
////
////               };
//    //    }
//            $r = $this->authorization->getRoles();
//    }
////        //$authorization->deny(null, 'Status\V1\Rpc\Ping\Controller::ping', 'GET');
////        $this->authorization->deny();
////        $list = $this->entity->findAll();
////
////        //  $user = $list[0]->getUsers()->first()->getArrayCopy();
////
////        foreach ($list as $user){
////            $authorization->addRole($user->getUsername());
////        }
////
////        $r = $authorization->getRoles();
////
////        $authorization->allow('johndoe', 'Status\V1\Rpc\Ping\Controller::ping', 'GET');
//////
//////        $authorization->deny(null, 'Status\V1\Rest\Produtos\Controller::collection', 'GET');
//////        $authorization->allow('johndoe', 'Status\V1\Rest\Produtos\Controller::collection', 'GET');
//            return $this;
//    }
//}


