<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespuestaEncuesta
 *
 * @ORM\Table(name="respuesta_encuesta")
 * @ORM\Entity(repositoryClass="SurveyBundle\Repository\RespuestaEncuestaRepository")
 */
class RespuestaEncuesta
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
     * @var string
     *
     * @ORM\Column(name="direccionIp", type="string", length=25)
     */
    private $direccionIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pub_date", type="datetime")
     */
    private $pubDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set direccionIp
     *
     * @param string $direccionIp
     *
     * @return RespuestaEncuesta
     */
    public function setDireccionIp($direccionIp)
    {
        $this->direccionIp = $direccionIp;

        return $this;
    }

    /**
     * Get direccionIp
     *
     * @return string
     */
    public function getDireccionIp()
    {
        return $this->direccionIp;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return RespuestaEncuesta
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Get pubDate
     *
     * @return \DateTime
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }


    /**
    * @ORM\ManyToOne(targetEntity="Encuesta", inversedBy="respuestaencuesta")
    * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="id", nullable=false)
    */
    private $encuesta;

    /**
     * Set encuesta
     *
     * @param Encuesta $encuesta
     * @return RespuestaEncuesta
     */
    public function setEncuesta(Encuesta $encuesta = null)
    {
        $this->encuesta = $encuesta;
    
        return $this;
    }

    /**
     * Get encuesta
     *
     * @return Encuesta
     */
    public function getEncuesta()
    {
        return $this->encuesta;
    }


    /**
    * @ORM\OneToMany(targetEntity="RespuestaElegida", mappedBy="respuestaencuesta")
    */
    private $respuestaelegida;

     /**
    *Set respuestaelegida
    *
    *@param RespuestaElegida $respuestaelegida
    *
    *@return RespuestaEncuesta
    */
    public function setRespuestaElegida(RespuestaElegida $respuestaelegida)
    {
        $this->respuestaelegida=$respuestaelegida;
        
        return $this;
    }

    /**
     * Get respuestaelegida
     *
     * @return RespuestaElegida 
     */
    public function getRespustaElegida()
    {
        return $this->respuestaelegida;
    }
}

