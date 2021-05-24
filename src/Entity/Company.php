<?php

namespace App\Entity;
use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 * @ORM\Table(name="`company`")
 * @ApiResource(
 *     collectionOperations={"get","post"},
 *     itemOperations={"get","delete","put","patch"},
 *     normalizationContext={"groups"={"company:read"}},
 *     denormalizationContext={"groups"={"company:write"}}
 * )
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("company:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"company:read", "company:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"company:read", "company:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"company:read", "company:write"})
     */
    private $image;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @Groups("company:read")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @Groups("company:read")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("company:read")
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
     private $is_desactive;

     public function __construct()
     {
         $this->is_desactive =false;
         $this->created_at = new \DateTime();
     }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIsDesactive(): ?bool
    {
        return $this->is_desactive;
    }

    public function setIsDesactive(?bool $is_desactive): self
    {
        $this->is_desactive = $is_desactive;

        return $this;
    }
}
