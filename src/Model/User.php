<?php


namespace App\Model;
use Symfony\Component\Validator\Constraints as Assert;

class User
{
    /**
     * @var string
     * @Assert\NotNull(message="Veuillez renseigner votre prénom.")
     */
    public $firstname;

    /**
     * @var string
     * @Assert\NotNull(message="Veuillez renseigner votre nom.")
     */
    public $lastname;

    /**
     * @var string
     * @Assert\NotNull(message="Veuillez renseigner votre pseudo qui sera visible par tous.")
     */
    public $username;

    /**
     * @var string
     * @Assert\NotNull(message="Veuillez renseigner un email valide.")
     */

    public $email;

    /**
     * @var string
     * @Assert\NotNull(message="Veuillez renseigner un mot de passe.")
     */
    public $password;


}