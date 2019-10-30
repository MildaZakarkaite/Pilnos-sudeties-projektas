<?php

namespace App\Users\User;

class User {
	private $data = [];
	public function __construct(array $data = null) {
		if ($data) {
			$this->setData($data);
		} else {
			$this->data = [
				'id' => null,
				'name' => null,
				'email' => null,
				'password' => null,
			];
		}
	}
	/**
	 * 
	 * @param array $array
	 */
	public function setData(array $array) {
		if (isset($array['id'])) {
			$this->setID($array['id']);
		} else {
			$this->data['id'] = null;
		}
		$this->setName($array['name'] ?? null);
		$this->setEmail($array['email'] ?? null);
		$this->setPassword($array['password'] ?? null);
	}
	/**
	 * Gets all data as array 
	 * @return array
	 */
	public function getData(): array {
		return [
			'id' => $this->getID(),
			'name' => $this->getName(),
			'email' => $this->getEmail(),
			'password' => $this->getPassword()
		];
	}
	/**
	 * Sets ID
	 * @param int $id
	 */
	public function setID(int $id) {
		$this->data['id'] = $id;
	}
	
	/**
	 * Sets name
	 * @param string $name
	 */
	public function setName(string $name) {
		$this->data['name'] = $name;
	}
	
	/**
	 * Sets email to data array
	 * @param string $price
	 */
	public function setEmail(string $email) {
		$this->data['email'] = $email;
	}
	
	/**
	 * Sets if the password
	 * @param string $password
	 */
	public function setPassword(string $password) {
		$this->data['password'] = $password;
	}
	
	/**
	 * Gets ID
	 * @return int|null
	 */
	public function getID(): ?int {
		return $this->data['id'];
	}
	
	/**
	 * Returns name
	 * @return string|null
	 */
	public function getName(): ?string {
		return $this->data['name'];
	}
	
	/**
	 * Returns email
	 * @return string |null
	 */
	public function getEmail(): ?string {
		return $this->data['email'];
	}
	/**
	 * Return if password
	 * @return string|null
	 */
	public function getPassword(): ?string {
		return $this->data['password'];
	}
}