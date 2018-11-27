<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encuesta
 *
 * @ORM\Table(name="encuesta")
 * @ORM\Entity(repositoryClass="SurveyBundle\Repository\EncuestaRepository")
 */
class Encuesta
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
     * @ORM\Column(name="nombre", type="string", length=150)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="poblacion", type="integer")
     */
    private $poblacion;

    /**
     * @var int
     *
     * @ORM\Column(name="porciertoError", type="integer")
     */
    private $porciertoError;

    /**
     * @var string
     *
     * @ORM\Column(name="nivelConfianza", type="string", length=255)
     */
    private $nivelConfianza;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Encuesta
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set poblacion
     *
     * @param integer $poblacion
     *
     * @return Encuesta
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return int
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set porciertoError
     *
     * @param integer $porciertoError
     *
     * @return Encuesta
     */
    public function setPorciertoError($porciertoError)
    {
        $this->porciertoError = $porciertoError;

        return $this;
    }

    /**
     * Get porciertoError
     *
     * @return int
     */
    public function getPorciertoError()
    {
        return $this->porciertoError;
    }

    /**
     * Set nivelConfianza
     *
     * @param string $nivelConfianza
     *
     * @return Encuesta
     */
    public function setNivelConfianza($nivelConfianza)
    {
        $this->nivelConfianza = $nivelConfianza;

        return $this;
    }

    /**
     * Get nivelConfianza
     *
     * @return string
     */
    public function getNivelConfianza()
    {
        return $this->nivelConfianza;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return Encuesta
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
    * @ORM\OneToMany(targetEntity="Pregunta", mappedBy="encuesta")
    */
    private $pregunta; 

     /**
    *Set pregunta
    *
    *@param Pregunta $pregunta
    *
    *@return Encuesta
    */
    public function setPregunta(Pregunta $pregunta)
    {
        $this->pregunta=$pregunta;
        
        return $this;
    }

    /**
     * Get pregunta
     *
     * @return Pregunta 
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }


    /**
    * @ORM\OneToMany(targetEntity="RespuestaEncuesta", mappedBy="encuesta")
    */
    private $respuestaencuesta;

     /**
    *Set respuestaencuesta
    *
    *@param RespuestaEncuesta $respuestaencuesta
    *
    *@return Encuesta
    */
    public function setRespuestaEncuesta(RespuestaEncuesta $respuestaencuesta)
    {
        $this->respuestaencuesta=$respuestaencuesta;
        
        return $this;
    }    

    /**
     * Get respuestaencuesta
     *
     * @return RespuestaEncuesta
     */
    public function getRespuestaEncuesta()
    {
        return $this->respuestaencuesta;
    }

}

