<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder {

    protected array $properties = ['firstname', 'lastname', 'email', 'password', 'phone', 'address', 'registered'];

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->data['firstname'];
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $this->data['firstname'] = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->data['lastname'];
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->data['lastname'] = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->data['email'];
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->data['email'] = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->data['password'];
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->data['password'] = $password;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->data['phone'];
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->data['phone'] = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->data['address'];
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->data['address'] = $address;
    }

    /**
     * @return string
     */
    public function getRegistered(): string
    {
        return $this->data['registered'];
    }

    /**
     */
    public function setRegistered(): void
    {
        $this->data['registered'] = date("Y-m-d H:i:s");
    }
}
