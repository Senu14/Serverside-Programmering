<?php 
class Users {
	public $id;
	public $firstname;
	public $lastname;
	public $birthdate;
	public $email;
	public $phone;
	public $zipcode;
	public $address;
	public $city;
	public $country;

	private $db;

	public function __construct()
	{	
		global $db;
		$this->db = $db;
	}

	/**
	 * Funktion til at hente lister med
	 */
	public function list() {
		
		$sql = "SELECT id,firstname, lastname, 
		        birthdate, email, phone, address, zipcode, city, country 
				FROM users
				
				ORDER BY id
                    LIMIT 10";
		return $this->db->query($sql);
	}

	/**
	 * Funktion til at hente detaljer med
	 */
	public function details($id) {
		$params = array(
			'id' => array($id, PDO::PARAM_INT)
		);

		$sql = "SELECT firstname, lastname, birthdate, email,
	                    phone, address, zipcode, city, country
				FROM users  
				WHERE id = :id";
		return $this->db->query($sql, $params, Db::RESULT_SINGLE);
	}

	/**
	 * Opret Users
	 */
	public function create() {
		$params = array(
			'firstname' => array($this->firstname, PDO::PARAM_STR),
			'lastname' => array($this->lastname, PDO::PARAM_STR),
			'birthdate' => array($this->birthdate, PDO::PARAM_INT),
			'email' => array($this->email, PDO::PARAM_STR),
			'phone' => array($this->phone, PDO::PARAM_INT), 
			'address' => array($this->address, PDO::PARAM_STR), 
			'zipcode' => array($this->zipcode, PDO::PARAM_INT),
			'city' => array($this->city, PDO::PARAM_STR),
			'country' => array($this->country, PDO::PARAM_STR)
		);

		$sql = "INSERT INTO users(firstname, lastname, birthdate, email,
		                    phone, address, zipcode, city, country) 
				VALUES(:firstname, :lastname, :birthdate, :email,
		               :phone, :address, :zipcode, :city, :country)";

		$this->db->query($sql, $params);
		return $this->db->lastInsertId();
	}

	/**
	 * Opdater users
	 */
	public function update() {
		$params = array(
			'firstname' => array($this->firstname, PDO::PARAM_STR),
			'lastname' => array($this->lastname, PDO::PARAM_STR),
			'birthdate' => array($this->birthdate, PDO::PARAM_INT),
			'email' => array($this->email, PDO::PARAM_STR), 
			'phone' => array($this->phone, PDO::PARAM_INT), 
			'address' => array($this->address, PDO::PARAM_STR), 
			'zipcode' => array($this->zipcode, PDO::PARAM_INT),
			'city' => array($this->city, PDO::PARAM_STR),
			'country' => array($this->coutnry, PDO::PARAM_STR)
		);

		$sql = "UPDATE users SET 
				firstname = :firstname,     
                    lastname = :lastname,
                    birthdate = :birthdate,
                    email      = :email,
                    phone   = :phone,
                   	address = :address,
                    zipcode = :zipcode,
                    city = :city,
                    country = :country,
				WHERE id = :id";

		return $this->db->query($sql, $params);
	}

	public function delete($id) {
		$params = array(
			'id' => array($id, PDO::PARAM_INT)
		);
		
		$sql = "DELETE FROM users 
				WHERE id = :id";
		return $this->db->query($sql, $params);
	}
}
?>