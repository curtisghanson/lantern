<?php

namespace Lantern\FileMgrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * File
 */
class File
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $realpath;

    /**
     * @var string
     */
    private $relativePath;

    /**
     * @var string
     */
    private $relativePathname;

    /**
     * @var integer
     */
    private $size;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $chmod;

    /**
     * @var string
     */
    private $chown;

    /**
     * @var string
     */
    private $chgrp;

    /**
     * @var \DateTime
     */
    private $createdDatetime;

    /**
     * @var \DateTime
     */
    private $modifiedDatetime;

    /**
     * @var \DateTime
     */
    private $lastAccessedDatetime;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var array
     */
    private $metadata;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return File
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    
        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set realpath
     *
     * @param string $realpath
     * @return File
     */
    public function setRealpath($realpath)
    {
        $this->realpath = $realpath;
    
        return $this;
    }

    /**
     * Get realpath
     *
     * @return string 
     */
    public function getRealpath()
    {
        return $this->realpath;
    }

    /**
     * Set relativePath
     *
     * @param string $relativePath
     * @return File
     */
    public function setRelativePath($relativePath)
    {
        $this->relativePath = $relativePath;
    
        return $this;
    }

    /**
     * Get relativePath
     *
     * @return string 
     */
    public function getRelativePath()
    {
        return $this->relativePath;
    }

    /**
     * Set relativePathname
     *
     * @param string $relativePathname
     * @return File
     */
    public function setRelativePathname($relativePathname)
    {
        $this->relativePathname = $relativePathname;
    
        return $this;
    }

    /**
     * Get relativePathname
     *
     * @return string 
     */
    public function getRelativePathname()
    {
        return $this->relativePathname;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return File
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return File
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     * @return File
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    
        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set chmod
     *
     * @param string $chmod
     * @return File
     */
    public function setChmod($chmod)
    {
        $this->chmod = $chmod;
    
        return $this;
    }

    /**
     * Get chmod
     *
     * @return string 
     */
    public function getChmod()
    {
        return $this->chmod;
    }

    /**
     * Set chown
     *
     * @param string $chown
     * @return File
     */
    public function setChown($chown)
    {
        $this->chown = $chown;
    
        return $this;
    }

    /**
     * Get chown
     *
     * @return string 
     */
    public function getChown()
    {
        return $this->chown;
    }

    /**
     * Set chgrp
     *
     * @param string $chgrp
     * @return File
     */
    public function setChgrp($chgrp)
    {
        $this->chgrp = $chgrp;
    
        return $this;
    }

    /**
     * Get chgrp
     *
     * @return string 
     */
    public function getChgrp()
    {
        return $this->chgrp;
    }

    /**
     * Set createdDatetime
     *
     * @param \DateTime $createdDatetime
     * @return File
     */
    public function setCreatedDatetime($createdDatetime)
    {
        $this->createdDatetime = $createdDatetime;
    
        return $this;
    }

    /**
     * Get createdDatetime
     *
     * @return \DateTime 
     */
    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }

    /**
     * Set modifiedDatetime
     *
     * @param \DateTime $modifiedDatetime
     * @return File
     */
    public function setModifiedDatetime($modifiedDatetime)
    {
        $this->modifiedDatetime = $modifiedDatetime;
    
        return $this;
    }

    /**
     * Get modifiedDatetime
     *
     * @return \DateTime 
     */
    public function getModifiedDatetime()
    {
        return $this->modifiedDatetime;
    }

    /**
     * Set lastAccessedDatetime
     *
     * @param \DateTime $lastAccessedDatetime
     * @return File
     */
    public function setLastAccessedDatetime($lastAccessedDatetime)
    {
        $this->lastAccessedDatetime = $lastAccessedDatetime;
    
        return $this;
    }

    /**
     * Get lastAccessedDatetime
     *
     * @return \DateTime 
     */
    public function getLastAccessedDatetime()
    {
        return $this->lastAccessedDatetime;
    }

    /**
     * Set hash
     *
     * @param string $hash
     * @return File
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    
        return $this;
    }

    /**
     * Get hash
     *
     * @return string 
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set metadata
     *
     * @param array $metadata
     * @return File
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    
        return $this;
    }

    /**
     * Get metadata
     *
     * @return array 
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
