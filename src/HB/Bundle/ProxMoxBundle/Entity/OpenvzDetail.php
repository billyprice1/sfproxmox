<?php

namespace HB\Bundle\ProxMoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpenvzDetail
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class OpenvzDetail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="disk", type="integer")
     */
    private $disk;

    /**
     * @var string
     *
     * @ORM\Column(name="ostemplate", type="string", length=255)
     */
    private $ostemplate;

    /**
     * @var string
     *
     * @ORM\Column(name="hostname", type="string", length=255)
     */
    private $hostname;

    /**
     * @var string
     *
     * @ORM\Column(name="nameserver", type="string", length=255)
     */
    private $nameserver;

    /**
     * @var string
     *
     * @ORM\Column(name="searchdomain", type="string", length=255)
     */
    private $searchdomain;

    /**
     * @var integer
     *
     * @ORM\Column(name="onboot", type="integer")
     */
    private $onboot;

    /**
     * @var bigint
     *
     * @ORM\Column(name="swap", type="bigint")
     */
    private $swap;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=255)
     */
    private $ipAddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="quotaugidlimit", type="bigint")
     */
    private $quotaugidlimit;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="memory", type="bigint")
     */
    private $memory;

    /**
     * @var integer
     *
     * @ORM\Column(name="cpuunits", type="bigint")
     */
    private $cpuunits;

    /**
     * @var string
     *
     * @ORM\Column(name="digest", type="string", length=255)
     */
    private $digest;

    /**
     * @var integer
     *
     * @ORM\Column(name="quotatime", type="bigint")
     */
    private $quotatime;

    /**
     * @var string
     *
     * @ORM\Column(name="storage", type="string", length=255)
     */
    private $storage;

    /**
     * @var integer
     *
     * @ORM\Column(name="cpus", type="integer")
     */
    private $cpus;


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
     * Set disk
     *
     * @param integer $disk
     * @return OpenvzDetail
     */
    public function setDisk($disk)
    {
        $this->disk = $disk;

        return $this;
    }

    /**
     * Get disk
     *
     * @return integer 
     */
    public function getDisk()
    {
        return $this->disk;
    }

    /**
     * Set ostemplate
     *
     * @param string $ostemplate
     * @return OpenvzDetail
     */
    public function setOstemplate($ostemplate)
    {
        $this->ostemplate = $ostemplate;

        return $this;
    }

    /**
     * Get ostemplate
     *
     * @return string 
     */
    public function getOstemplate()
    {
        return $this->ostemplate;
    }

    /**
     * Set hostname
     *
     * @param string $hostname
     * @return OpenvzDetail
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * Get hostname
     *
     * @return string 
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Set nameserver
     *
     * @param string $nameserver
     * @return OpenvzDetail
     */
    public function setNameserver($nameserver)
    {
        $this->nameserver = $nameserver;

        return $this;
    }

    /**
     * Get nameserver
     *
     * @return string 
     */
    public function getNameserver()
    {
        return $this->nameserver;
    }

    /**
     * Set searchdomain
     *
     * @param string $searchdomain
     * @return OpenvzDetail
     */
    public function setSearchdomain($searchdomain)
    {
        $this->searchdomain = $searchdomain;

        return $this;
    }

    /**
     * Get searchdomain
     *
     * @return string 
     */
    public function getSearchdomain()
    {
        return $this->searchdomain;
    }

    /**
     * Set onboot
     *
     * @param integer $onboot
     * @return OpenvzDetail
     */
    public function setOnboot($onboot)
    {
        $this->onboot = $onboot;

        return $this;
    }

    /**
     * Get onboot
     *
     * @return integer 
     */
    public function getOnboot()
    {
        return $this->onboot;
    }

    /**
     * Set swap
     *
     * @param boolean $swap
     * @return OpenvzDetail
     */
    public function setSwap($swap)
    {
        $this->swap = $swap;

        return $this;
    }

    /**
     * Get swap
     *
     * @return boolean 
     */
    public function getSwap()
    {
        return $this->swap;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return OpenvzDetail
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set quotaugidlimit
     *
     * @param integer $quotaugidlimit
     * @return OpenvzDetail
     */
    public function setQuotaugidlimit($quotaugidlimit)
    {
        $this->quotaugidlimit = $quotaugidlimit;

        return $this;
    }

    /**
     * Get quotaugidlimit
     *
     * @return integer 
     */
    public function getQuotaugidlimit()
    {
        return $this->quotaugidlimit;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return OpenvzDetail
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set memory
     *
     * @param integer $memory
     * @return OpenvzDetail
     */
    public function setMemory($memory)
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * Get memory
     *
     * @return integer 
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * Set cpuunits
     *
     * @param integer $cpuunits
     * @return OpenvzDetail
     */
    public function setCpuunits($cpuunits)
    {
        $this->cpuunits = $cpuunits;

        return $this;
    }

    /**
     * Get cpuunits
     *
     * @return integer 
     */
    public function getCpuunits()
    {
        return $this->cpuunits;
    }

    /**
     * Set digest
     *
     * @param string $digest
     * @return OpenvzDetail
     */
    public function setDigest($digest)
    {
        $this->digest = $digest;

        return $this;
    }

    /**
     * Get digest
     *
     * @return string 
     */
    public function getDigest()
    {
        return $this->digest;
    }

    /**
     * Set quotatime
     *
     * @param integer $quotatime
     * @return OpenvzDetail
     */
    public function setQuotatime($quotatime)
    {
        $this->quotatime = $quotatime;

        return $this;
    }

    /**
     * Get quotatime
     *
     * @return integer 
     */
    public function getQuotatime()
    {
        return $this->quotatime;
    }

    /**
     * Set storage
     *
     * @param string $storage
     * @return OpenvzDetail
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * Get storage
     *
     * @return string 
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * Set cpus
     *
     * @param integer $cpus
     * @return OpenvzDetail
     */
    public function setCpus($cpus)
    {
        $this->cpus = $cpus;

        return $this;
    }

    /**
     * Get cpus
     *
     * @return integer 
     */
    public function getCpus()
    {
        return $this->cpus;
    }
}
