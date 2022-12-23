<?php
class Admin{

    private int $id;

    private string $login;
    private string $role;

    function __construct($login,$role){
        $this->login = $login ;
        $this->role = $role ;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

}
?>