<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregunta
 *
 * @ORM\Table(name="pregunta")
 * @ORM\Entity(repositoryClass="SurveyBundle\Repository\PreguntaRepository")
 */
class Pregunta
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
     * @ORM\Column(name="enunciado", type="string", length=255)
     */
    private $enunciado;

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
     * Set enunciado
     *
     * @param string $enunciado
     *
     * @return Pregunta
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;

        return $this;
    }

    /**
     * Get enunciado
     *
     * @return string
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return Pregunta
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
    * @ORM\ManyToOne(targetEntity="Encuesta", inversedBy="pregunta")
    * @ORM\JoinColumn(name="encuesta_id", referencedColumnName="id", nullable=false)
    */
    private $encuesta;

     /**
     * Set encuesta
     *
     * @param Encuesta $encuesta
     * @return Amenaza
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
    * @ORM\OneToMany(targetEntity="Opcion", mappedBy="pregunta")
    */
    private $opcion;

     /**
    *Set opcion
    *
    *@param Opcion $opcion
    *
    *@return Pregunta
    */
    public function setOpcion(Opcion $opcion)
    {
        $this->opcion=$opcion;
        
        return $this;
    }

    /**
     * Get opcion
     *
     * @return Opcion 
     */
    public function getOpcion()
    {
        return $this->opcion;
    }


    /**
    * @ORM\OneToMany(targetEntity="RespuestaElegida", mappedBy="pregunta")
    */
    private $respuestaelegida;

     /**
    *Set respuestaelegida
    *
    *@param RespuestaElegida $respuestaelegida
    *
    *@return Pregunta
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
    public function getRespuestaElegida()
    {
        return $this->respuestaelegida;
    }

    public function __toString() 
    {
        return (string) $this->name; 
    }

}

