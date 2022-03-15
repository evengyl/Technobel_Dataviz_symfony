<?php

namespace App\Entity;

use App\Repository\ContactUsLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactUsLogRepository::class)]
class ContactUsLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $senderMail;

    #[ORM\Column(type: 'text', nullable: true)]
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSenderMail(): ?string
    {
        return $this->senderMail;
    }

    public function setSenderMail(string $senderMail): self
    {
        $this->senderMail = $senderMail;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
