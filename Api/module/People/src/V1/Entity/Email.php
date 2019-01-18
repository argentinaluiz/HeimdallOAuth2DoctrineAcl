<?php

namespace People\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator;

/**
 * Email
 *
 * @ORM\Table(name="Email_User")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Email {

    /**
     * @var integer
     *
     * @ORM\Column(name="emailId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=254, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isFirst", type="boolean", nullable=true)
     */
    private $isFirst;

    /**
     * @var boolean
     *
     * @ORM\Column(name="checked", type="boolean", nullable=true)
     */
    private $checked;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=45, nullable=true)
     */
    private $hash;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mailing", type="boolean", nullable=true)
     */
    private $mailing;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="emails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $userIdEmail;

    public function __construct(array $options = []) {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }

    public function getEmailId() {
        return $this->emailId;
    }

    public function getIsFirst() {
        return $this->isFirst;
    }

    public function getChecked() {
        return $this->checked;
    }

    public function getHash() {
        return $this->hash;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getMailing() {
        return $this->mailing;
    }

    public function getUserIdEmail() {
        return $this->userIdEmail;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setEmailId($idEmail) {
        $this->emailId = $idEmail;
        return $this;
    }

    public function setIsFirst($isFirst) {
        $this->isFirst = $isFirst;
        return $this;
    }

    public function setChecked($checked) {
        $this->checked = $checked;
        return $this;
    }

    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = new \DateTime("now");
        return $this;
    }

    public function setMailing($mailing) {
        $this->mailing = $mailing;
        return $this;
    }

    public function setUserIdEmail(User $idUserEmail = null) {
        $this->userIdEmail = $idUserEmail;
        return $this;
    }

    public function getArrayCopy() {
        $arr = get_object_vars($this);
        $arr['userIdEmail'] = $this->getUserIdEmail()->getId();
        return $arr;
    }

}
