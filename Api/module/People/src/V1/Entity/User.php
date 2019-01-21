<?php

namespace People\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Crypt\Password\Bcrypt;
use ZF\OAuth2\Doctrine\Entity\Client;
use Zend\Hydrator;


/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="People\V1\Entity\UserRepository")
 */
class User
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
     * @ORM\ManyToOne(targetEntity="Heimdall\V1\Entity\AclRole")
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
     * @ORM\OneToMany(targetEntity="Email", mappedBy="userIdEmail", cascade={"persist", "remove"}, orphanRemoval=true, indexBy="emailId"))
     */
    private $emails;

    /**
     * @var Address
     * @ORM\OneToMany(targetEntity="Address", mappedBy="userIdAddress", cascade={"persist", "remove"}, orphanRemoval=true, indexBy="adressId"))
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="birthDay", type="smallint",  nullable=true)
     */
    private $birthDay;

    /**
     * @var string
     *
     * @ORM\Column(name="birthMonth", type="smallint", nullable=true)
     */
    private $birthMonth;

    /**
     * @var string
     *
     * @ORM\Column(name="birthYear", type="smallint", nullable=true)
     */
    private $birthYear;

    /**
     * @var string
     *
     * @ORM\Column(name="occupation", type="string", length=45, nullable=true)
     */
    private $occupation;

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

        (new Hydrator\ClassMethods)->hydrate($options, $this);
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
     * @return string
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @param string $birthDay
     * @return User
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthMonth()
    {
        return $this->birthMonth;
    }

    /**
     * @param string $birthMonth
     * @return User
     */
    public function setBirthMonth($birthMonth)
    {
        $this->birthMonth = $birthMonth;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * @param string $birthYear
     * @return User
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;
        return $this;
    }

    /**
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param string $occupation
     * @return User
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
        return $this;
    }

    /**
     * @return AclRole
     */
    public function getRole()
    {
//        if(null != $this->role)
//            return $this->role->getArrayCopy();

                return $this->role;
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
//        if( null != $this->parent_client)
//            return $this->parent_client->getArrayCopy();

        return $this->parent_client;
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

    public function getPhoneCollection(){
        if ($this->phones->count() > 0):
            $phones = [];
            foreach ($this->phones as $key => $value) {
                $phones[] = $value->getArrayCopy();
            }
            return $phones;
        endif;
        return $this->phones;
    }

    /**
     * @return ArrayCollection Phone
     */
    public function getPhones()
    {
        return $this->phones;

    }

    public function addPhones($phones){
        foreach ($phones as $phone) {
            $phone->setUserIdPhone($this);
            $this->phones->add($phone);
        }
    }

    public function removePhones($phones){
        foreach ($phones as $phone) {
            $phone->setUserIdPhone(null);
            $this->phones->removeElement($phone);
        }
    }

    public function setPhones($phones) {
        $this->phones = $phones;
        return $this;
    }

    public function getEmailCollection(){
        if ($this->emails->count() > 0):
            $emails = [];
            foreach ($this->emails as $key => $value) {
                $emails[] = $value->getArrayCopy();
            }
            return $emails;
        endif;
    }
    public function getEmails()
    {
        return $this->emails;
    }

    public function removeEmails($emails){
        foreach ($emails as $email) {
            $email->setUserIdEmail(null);
            $this->emails->removeElement($email);
        }
    }

    public function addEmails( $emails){
        foreach ($emails as $email) {
            $email->setUserIdEmail($this);
            $this->emails->add($email);
        }
    }


    /**
     * @param Email $emails
     * @return User
     */
    public function setEmails($email) {
        $this->emails = $email;
        return $this;
    }

    public function getAddressCollection(){
        if ($this->address->count() > 0):
            $address = array();
            foreach ($this->address as $key => $value) {
                $address[] = $value->getArrayCopy();
            }
            return $address;
        endif;
    }
    public function getAddress() {
        return $this->address;
    }

    public function addAddress($address){
        foreach ($address as $addr) {
            $addr->setUserIdAddress($this);
            $this->address->add($addr);
        }
        return $this;
    }

    public function removeAddress($address){
        foreach ($address as $addr) {
            $addr->setUserIdAddress(null);
            $this->address->removeElement($addr);
        }
        return $this;
    }


    public function setAddress($address ) {
        $this->address = $address;
        return $this;
    }

    public function getArrayCopy() {
        $arr = get_object_vars($this);
        return $arr;
    }
}
