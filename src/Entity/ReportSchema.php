<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReportSchemaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ReportSchemaRepository")
 */
class ReportSchema
{

    const TYPE_AGREGATION  = 2;
    const TYPE_TIMESERIESE = 4;


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $report_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_aggregation;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $is_active;


    /**
     * @ORM\ManyToMany(targetEntity="Dimensions")
     * @ORM\JoinTable(name="report_schema_dimensions",
     *          joinColumns={@ORM\JoinColumn(name="report_schema_id", referencedColumnName="id")},
     *          inverseJoinColumns={@ORM\JoinColumn(name="dimensions_id", referencedColumnName="id")}
     * )
     */
    private $dimension;



    public function __construct()
    {
        $this->dimension = new ArrayCollection();

    }

    public function getId()
    {
        return $this->id;
    }

    public function getReportType(): ?string
    {
        return $this->report_type;
    }

    public function setReportType(string $report_type): self
    {
        $this->report_type = $report_type;

        return $this;
    }


    public function getReportTypeName()
    {
       $types = array_flip(ReportSchemaRepository::getReportTypes());

       return $types[$this->report_type];
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

    public function getIsAggregation(): ?bool
    {
        return $this->is_aggregation;
    }

    public function setIsAggregation(bool $is_aggregation): self
    {
        $this->is_aggregation = $is_aggregation;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getDimension()
    {
       return $this->dimension;
    }

    public function setDimension($dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }

}
