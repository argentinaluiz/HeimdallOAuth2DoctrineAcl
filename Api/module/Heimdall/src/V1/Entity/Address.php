<?php

namespace Heimdall\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator;

/**
 * Address
 *
 * @ORM\Table(name="Address_User")
 * @ORM\Entity
 */
class Address {

    /**
     * @var integer
     *
     * @ORM\Column(name="addressId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $addressId;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=100, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=100, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=45, nullable=true)
     */
    private $complement;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_cod", type="string", length=45, nullable=true)
     */
    private $zipCod;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=45, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=45, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="parish", type="string", length=45, nullable=true)
     */
    private $parish; //freguesia

    /**
     * @var string
     *
     * @ORM\Column(name="neighborhood", type="string", length=45, nullable=true)
     */
    private $neighborhood; //bairro

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $userIdAddress;

    public function __construct(array $options = []) {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }

    public function getAddressId() {
        return $this->addressId;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getComplement() {
        return $this->complement;
    }

    public function getCity() {
        return $this->city;
    }

    public function getZipCod() {
        return $this->zipCod;
    }

    public function getState() {
        return $this->state;
    }

    public function getReference() {
        return $this->reference;
    }

    public function getUserIdAddress() {
        return $this->userIdAddress;
    }

    public function setAddressId($idAddress) {
        $this->addressId = $idAddress;
        return $this;
    }

    public function getParish() {
        return $this->parish;
    }

    /**
     * @return string
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param string $neighborhood
     * @return Address
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }


    public function setParish($parish) {
        $this->parish = $parish;
        return $this;
    }

    public function setStreet($street) {
        $this->street = $street;
        return $this;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function setNumber($number) {
        $this->number = $number;
        return $this;
    }

    public function setComplement($complement) {
        $this->complement = $complement;
        return $this;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function setZipCod($zipCod) {
        $this->zipCod = $zipCod;
        return $this;
    }

    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    public function setReference($reference) {
        $this->reference = $reference;
        return $this;
    }

    public function setUserIdAddress(User $userIdAddress) {
        $this->userIdAddress = $userIdAddress;
        return $this;
    }

    public function getArrayCopy() {
        $arr = get_object_vars($this);
        $arr['userIdAddress'] = $this->getUserIdAddress()->getUserId();
        return $arr;
    }

}
