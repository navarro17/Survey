<?php

namespace SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opcion
 *
 * @ORM\Table(name="opcion")
 * @ORM\Entity(repositoryClass="SurveyBundle\Repository\OpcionRepository")
 */
class Opcion
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
     * @ORM\Column(name="texto", type="string", length=255)
     */
    private $texto;

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
     * Set texto
     *
     * @param string $texto
     *
     * @return Opcion
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     *
     * @return Opcion
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
    * @ORM\ManyToOne(targetEntity="Pregunta", inversedBy="opcion")
    * @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id", nullable=false)
    */
    private $pregunta;

    /**
     * Set pregunta
     *
     * @param Pregunta $pregunta
     * @return Opcion
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
    * @ORM\OneToMany(targetEntity="RespuestaElegida", mappedBy="opcion")
    */
    private $respuestaelegida;

     /**
    *Set respuestaelegida
    *
    *@param RespuestaElegida $respuestaelegida
    *
    *@return Opcion
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
}

