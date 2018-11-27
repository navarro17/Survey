<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespuestaElegida
 *
 * @ORM\Table(name="respuesta_elegida")
 * @ORM\Entity(repositoryClass="SurveyBundle\Repository\RespuestaElegidaRepository")
 */
class RespuestaElegida
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

        /**
    * @ORM\ManyToOne(targetEntity="RespuestaEncuesta", inversedBy="respuestaelegida")
    * @ORM\JoinColumn(name="respuestaencuesta_id", referencedColumnName="id", nullable=false)
    */
    private $respuestaencuesta;

    /**
     * Set respuestaencuesta
     *
     * @param RespuestaEncuesta $respuestaencuesta
     * @return RespuestaElegida
     */
    public function setRespuestaEncuesta(RespuestaEncuesta $respuestaencuesta = null)
    {
        $this->respuestaencuesta = $respuestaencuesta;
    
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

    /**
    * @ORM\ManyToOne(targetEntity="Pregunta", inversedBy="respuestaelegida")
    * @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id", nullable=false)
    */
    private $pregunta;

    /**
     * Set pregunta
     *
     * @param Pregunta $pregunta
     * @return RespuestaElegida
     */
    public function setPregunta(Pregunta $pregunta = null)
    {
        $this->pregunta = $pregunta;
    
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
    * @ORM\ManyToOne(targetEntity="Opcion", inversedBy="respuestaelegida")
    * @ORM\JoinColumn(name="opcion_id", referencedColumnName="id", nullable=false)
    */
    private $opcion;

    /**
     * Set opcion
     *
     * @param Opcion $opcion
     * @return RespuestaElegida
     */
    public function setOpcion(Opcion $opcion = null)
    {
        $this->opcion = $opcion;
    
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
}

