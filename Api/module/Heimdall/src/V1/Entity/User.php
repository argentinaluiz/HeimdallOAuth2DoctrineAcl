<?php

namespace Heimdall\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Crypt\Password\Bcrypt;
use ZF\OAuth2\Doctrine\Entity\Client;
use ZF\OAuth2\Doctrine\Entity\UserInterface;
use Zend\Hydrator;
use ZF\OAuth2\Doctrine\Permissions\Acl\Role\ProviderInterface;
use Zend\Stdlib\ArraySerializableInterface;


/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class User implements UserInterface, ProviderInterface, ArraySerializableInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=80, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=45, nullable=true)
     */
    private $ref;


    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=254, nullable=true)
     */
    private $photo;


    /**
     * @var string|null
     *
     * @ORM\Column(name="firstName", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastName", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=80, nullable=true)
     */
    private $password;

    /**
     * @var AclRole
     *
     * @ORM\ManyToOne(targetEntity="AclRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;


    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="\ZF\OAuth2\Doctrine\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_client", referencedColumnName="id")
     * })
     */
    private $parent_client;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=true)
     */
    private $deleted;


    /**
     * @var Phone
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="userIdPhone", cascade={"persist", "remove"}, orphanRemoval=true, indexBy="phoneId")
     */
    private $phones;

    /**
     * @var Email
     * @ORM\OneToMany(targetEntity="Email", mappedBy="idUserEmail", cascade={"persist", "remove"}, orphanRemoval=true, indexBy="emailId"))
     */
    private $emails;

    /**
     * @var Address
     * @ORM\OneToMany(targetEntity="Address", mappedBy="userIdAddress", cascade={"persist", "remove"}, orphanRemoval=true, indexBy="adressId"))
     */
    private $address;

       private $accessToken;
       private $authorizationCode;
       private $refreshToken;
       private $client;

    /**
     * Constructor
     */
    public function __construct(array $options = []) {

        $this->emails = new ArrayCollection();
        $this->phones = new ArrayCollection();
        $this->address = new ArrayCollection();

       // (new Hydrator\ClassMethods)->hydrate($options, $this);
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
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
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     * @return User
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return AclRole
     */
    public function getRole()
    {
        return $this->role->getArrayCopy();
    }

    /**
     * @param AclRole
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return Client
     */
    public function getParentClient()
    {
        return $this->parent_client->getArrayCopy();
    }

    /**
     * @param Client $parent_client
     * @return User
     */
    public function setParentClient($parent_client)
    {
        $this->parent_client = $parent_client;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return User
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     * @return User
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param mixed $authorizationCode
     * @return User
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param mixed $refreshToken
     * @return User
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     * @return User
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    public function setCreatedAt($createdAt) {
        $this->createdAt = new \DateTime("now");
        return $this;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = new \DateTime("now");
        return $this;
    }

    /**
     * @param string|null $password
     * @return User
     */
    public function setPassword($password)
    {
        $bcrypt = new Bcrypt();
        $bcrypt->getCost();
        $this->password = $bcrypt->create($password);

        return $this;
    }

    /**
     * @return Phone
     */
    public function getPhones()
    {
        return $this->phones;
    }

    public function setPhones($phones = []) {
        if (!is_array($phones)) {
            return $this;
        }
        $ents = $this->getPhones();
        foreach ($phones as $phone) {
            if (isset($phone['phoneId'])):
                foreach ($ents as $value):
                    if ($value->getIdPhone() == $phone['phoneId']) {
                        $phone['userIdPhone'] = $this;
                        (new Hydrator\ClassMethods)->hydrate($phone, $value);
                    }
                endforeach;
            else:
                $entityPhone = new Phone($phone);
                $entityPhone->setUserIdPhone($this);
                $this->getPhones()->add($entityPhone);
            endif;
        }
        return $this;
    }

    public function getEmails()
    {
        return $this->emails;
    }

    public function setEmails($emails = []) {
        if (!is_array($emails)) {
            return $this;
        }
        $ents = $this->getEmails();
        foreach ($emails as $email) {
            if (isset($email['emailId'])):
                foreach ($ents as $value):
                    if ($value->getEmailId() == $email['emailId']) {
                        $email['userIdEmail'] = $this;
                        (new Hydrator\ClassMethods)->hydrate($email, $value);
                    }
                endforeach;
            else:
                $entityEmail = new Email($email);
                $entityEmail->setUserIdEmail($this);
                $this->getEmails()->add($entityEmail);
            endif;
        }
        return $this;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address = []) {
        if (!is_array($address)) {
            return $this;
        }

        $ents = $this->getAddress();
        foreach ($address as $addr) {
            if (isset($addr['addressId'])):
                foreach ($ents as $value):
                    if ($value->getAddressId() == $addr['addressId']) {
                        $addr['userIdAddress'] = $this;
                        (new Hydrator\ClassMethods)->hydrate($addr, $value);
                    }
                endforeach;
            else:
                $entityAddress = new Address($addr);
                $entityAddress->setUserIdAddress($this);
                $this->getAddress()->add($entityAddress);
            endif;
        }
        return $this;
    }

    public function exchangeArray(array $array)
    {
        // TODO: Implement exchangeArray() method.
    }

    public function getArrayCopy()
    {

        $arr = get_object_vars($this);
        $arr['test'] = '12345678';
        return $arr;
    }
}
