<?php

namespace Heimdall\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator;
use Zend\Permissions\Acl\Role\RoleInterface;
use ZF\OAuth2\Doctrine\Permissions\Acl\Role\HierarchicalInterface;
use ZF\OAuth2\Doctrine\Entity\Client;
/**
 * AclRole
 *
 * @ORM\Table(name="Role_Acl")
 * @ORM\Entity
 */
class AclRole implements RoleInterface, HierarchicalInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="roleId", type="string", length=45, nullable=true)
     *
     */
    private $roleId;


    /**
     * @var AclRole
     *
     * @ORM\ManyToOne(targetEntity="AclRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;


    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="ZF\OAuth2\Doctrine\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;


 /**
  * Constructor
  */
    public function __construct(array $options = []) {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AclRole
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param string $roleId
     * @return AclRole
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * @return AclRole
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param AclRole $parent
     * @return AclRole
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return AclRole
     */
    public function getClient()
    {
        if($this->client)
            return $this->client->getArrayCopy();

        return $this->client;
    }

    /**
     * @param AclRole $client
     * @return AclRole
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }


    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}
