<?php



include_once $_SERVER['DOCUMENT_ROOT']."/TODO/models/UserModel.php";

class UserController
{
    private $email;
    private $password;
    private $id;
    private $avatarURL="profil-avatar.jpg";
    private $role;



    private const MIN_PASSWORD_LENGTH =6;


    function __construct(string $email, string $password)
    { 
        $this->email= $email;
        $this->password = $password;
    }

    function isEmailValid():bool{
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    function isPasswordValid() : bool
    {
        return strlen($this->password) >= self::MIN_PASSWORD_LENGTH;
    }

    function isDataValid() : bool
    {
        return $this->isEmailValid() && $this->isPasswordValid();
    }

    //generer une chaine de caractére des erreurs
    function getErrors(){
        //declaration d'un tableau d'erreurs
        $errors= [];
        if(!($this->isEmailValid())){ //si l'email n'est pas valide
            //ajouter l'erreur au tableau
            array_push($errors, "emailError=InputInvalid");
        }

        if(!($this->isPasswordValid())){ // si le mdp n'est pas valide
            //ajouter l'erreur au tableau
            array_push($errors, "passwordError=InputInvalid");            
        }

        //retourner la chaine de caractére des erreurs
        return join("&", $errors);
        //emailError=InputInvalid&passwordError=InputInvalid
    }


    function signupUser(){
        //sauvgarde des informations dans la base de données
        $userModel= new UserModel($this->email, $this->password);
        $userModel->addToDB();
        

    }



    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    function exist()
    {
    $userModel = new UserModel($this->email, $this->password);
    //recup le tableau des infos de l'utilisateur
    //user tab contient le tableau des infos du user et fetch les cherches
    $userTab = $userModel -> fetch();
    var_dump($userTab);

    // si le tableau est vide donc l'utilisateur n'existe pas
    if (count($userTab) === 0) {
        return false;
    } else { //cas ou l'utilisateur existe bel et bien
        //enregistrer les informations de l'utilisateur afin de créer sa session
        $this->id = $userTab['id'];
        if ($userTab['avatarURL'] == null){
            $this->avatarURL = "./images/users/profil-avatar.jpg";
         }else{
            $this->avatarURL = $userTab['avatarURL'];
        }
        $this -> role= $userTab['role'];

        return true;
    }
    }

        function isPasswordCorrect(){

            $userModel = new UserModel($this->email, $this->password);
            //recup le tableau des infos de l'utilisateur
            //user tab contient le tableau des infos du user et fetch les cherches
            $userTab = $userModel -> fetch();

            return $userTab['password'] === $this->password;

        }

        
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of avatarURL
     */ 
    public function getAvatarURL()
    {
        return $this->avatarURL;
    }

    /**
     * Set the value of avatarURL
     *
     * @return  self
     */ 
    public function setAvatarURL($avatarURL)
    {
        $this->avatarURL = $avatarURL;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}
