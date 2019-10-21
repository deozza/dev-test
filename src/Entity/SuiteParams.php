<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\SuiteParamsRepository")
 */
class SuiteParams
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="max", type="integer")
     */
    private $max;

    /**
     * @ORM\Column(name="int1", type="integer")
     */
    private $int1;

    /**
     * @ORM\Column(name="int2", type="integer")
     */
    private $int2;


    /**
     * @ORM\Column(name="str1", type="string", length=255)
     */
    private $str1;


    /**
     * @ORM\Column(name="str2", type="string", length=255)
     */
    private $str2;

    /**
     * @ORM\Column(name="response", type="text")
     */
    private $response;

    /**
     * @ORM\Column(name="count", type="integer")
     */
    private $count;

    public function __construct()
    {
        $this->count = 1;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): self
    {
        $this->max = $max;
        return $this;
    }

    public function getInt1(): ?int
    {
        return $this->int1;
    }

    public function setInt1(int $int1): self
    {
        $this->int1 = $int1;
        return $this;
    }

    public function getInt2(): ?int
    {
        return $this->int2;
    }

    public function setInt2(int $int2): self
    {
        $this->int2 = $int2;
        return $this;
    }

    public function getStr1(): ?string
    {
        return $this->str1;
    }

    public function setStr1(string $str1): self
    {
        $this->str1 = $str1;
        return $this;
    }

    public function getStr2(): ?string
    {
        return $this->str2;
    }

    public function setStr2(string $str2): self
    {
        $this->str2 = $str2;
        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(string $response): self
    {
        $this->response = $response;
        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(): self
    {
        $this->count++;
        return $this;
    }
}