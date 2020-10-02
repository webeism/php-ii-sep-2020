<?php
declare(strict_types=1);
class User1 {
    private $id;
    private $token;
    public function __construct(int $id, string $token) {
        $this->id = $id;
        $this->token = (int) $token;
    }
    public function getId(): int { return $this->id; }
    public function setId(int $id): void { $this->id = $id; }
    public function gettoken(): string { return $this->token; }
    public function settoken(string $token): void { 
		$this->token = (int) $token; 
	}
}

class User2 {
    public int $id;
    public string $token;
    public function __construct($id, $token) {
        $this->id = $id;
        $this->token = (int) $token;
    }
}


$user[] = new User1(12345, 'ABC');
$user[] = new User2(12345, 'ABC');

var_dump($user);
