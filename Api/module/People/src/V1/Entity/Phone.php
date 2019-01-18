<?php

namespace People\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator;

/**
 * Phone
 *
 * @ORM\Table(name="Phone_User")
 * @ORM\Entity
 */
class Phone {

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phoneId;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="codPrefix", type="string", length=5, nullable=true)
     */
    private $codPrefix;

    /**
     * @var string
     *
     * @ORM\Column(name="codCountry", type="string", length=5, nullable=true)
     */
    private $codCountry;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="phones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $userIdPhone;

    public function __construct(array $options = []) {

        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }

    public function getPhoneId() {
        return $this->phoneId;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getCodPrefix() {
        return $this->codPrefix;
    }

    public function getCodCountry() {
        return $this->codCountry;
    }

    public function getUserIdPhone() {
        return $this->userIdPhone;
    }

    public function setIdPhone($idPhone) {
        $this->phoneId = $idPhone;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function setCodPrefix($codPrefix) {
        $this->codPrefix = $codPrefix;
        return $this;
    }

    public function setCodCountry($codCountry) {
        $this->codCountry = $codCountry;
        return $this;
    }

    public function setUserIdPhone(User $idUserPhone = null) {
        $this->userIdPhone = $idUserPhone;
        return $this;
    }

    public function getArrayCopy() {
        $arr = get_object_vars($this);
        $arr['userIdPhone'] = $this->getUserIdPhone()->getId();
        return $arr;
    }

}
