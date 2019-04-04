<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    /**
     * @var string
     */
    private $mailerFrom;
    /**
     * @var string
     */
    private $mailerTo;

    /**
     * ContactNotification constructor.
     * @param \Swift_Mailer $mailer
     * @param Environment $renderer
     * @param string $mailerFrom
     * @param string $mailerTo
     */
    public function __construct(\Swift_Mailer $mailer, Environment $renderer, string $mailerFrom, string $mailerTo)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
        $this->mailerFrom = $mailerFrom;
        $this->mailerTo = $mailerTo;
    }

    /**
     * @param Contact $contact
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function notify(Contact $contact)
    {
//        $message = (new \Swift_Message('Contact : '))
//            ->setFrom($this->mailerFrom)
//            ->setTo($this->mailerTo)
//            ->setReplyTo($contact->getEmail())
//            ->setBody($this->renderer->render('emails/contact.html.twig', [
//                'contact' => $contact
//            ]), 'text/html');
//        $this->mailer->send($message);
        $headers= "MIME-Version: 1.0 \n";
        $headers .= "Content-Transfer-Encoding: 8bit \n";
        $headers .= "Content-type: text/html; charset=utf-8 \n";
        $headers .= "From: ".$this->mailerFrom."> \n";
        $headers .= "Reply-To: ".$contact->getEmail()." \n";
        mail ($this->mailerTo,
            'Contact : ',
            $this->renderer->render('emails/contact.html.twig',
                ['contact' => $contact]), $headers);

    }

}
