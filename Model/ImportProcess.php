<?php

namespace Flower\MarketingBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ImportProcess
 *
 */
abstract class ImportProcess
{

    const STATUS_READY = 0;
    const STATUS_IN_PROGRESS = 1;

    const TYPE_CONTACT_LIST = 'contact_list';
    const TYPE_ACCOUNT = 'account';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255)
     */
    protected $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="coldef", type="string", length=255)
     */
    protected $coldef;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint")
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="\Flower\ModelBundle\Entity\Marketing\ContactList")
     * @ORM\JoinColumn(name="contact_list_id", referencedColumnName="id")
     */
    protected $contactList;

    /**
     * @var integer
     *
     * @ORM\Column(name="failCount", type="bigint")
     */
    protected $failCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="successCount", type="bigint")
     */
    protected $successCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalCount", type="bigint")
     */
    protected $totalCount;

    /**
     * @var DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    protected $created;

    /**
     * @var DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated", type="datetime")
     */
    protected $updated;

    public function __construct()
    {
        $this->status = self::STATUS_READY;
        $this->totalCount = 0;
        $this->successCount = 0;
        $this->failCount = 0;
    }

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
     * Set status
     *
     * @param integer $status
     *
     * @return ImportProcess
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set contactList
     *
     * @param \Flower\ModelBundle\Entity\Marketing\ContactList $contactList
     *
     * @return ImportProcess
     */
    public function setContactList(\Flower\ModelBundle\Entity\Marketing\ContactList $contactList = null)
    {
        $this->contactList = $contactList;

        return $this;
    }

    /**
     * Get contactList
     *
     * @return \Flower\ModelBundle\Entity\Marketing\ContactList
     */
    public function getContactList()
    {
        return $this->contactList;
    }

    /**
     * Set fileCode
     *
     * @param string $fileCode
     * @return ImportProcess
     */
    public function setFileCode($fileCode)
    {
        $this->fileCode = $fileCode;

        return $this;
    }

    /**
     * Get fileCode
     *
     * @return string
     */
    public function getFileCode()
    {
        return $this->fileCode;
    }

    /**
     * Set failCount
     *
     * @param integer $failCount
     * @return ImportProcess
     */
    public function setFailCount($failCount)
    {
        $this->failCount = $failCount;

        return $this;
    }

    /**
     * Get failCount
     *
     * @return integer
     */
    public function getFailCount()
    {
        return $this->failCount;
    }

    /**
     * Set successCount
     *
     * @param integer $successCount
     * @return ImportProcess
     */
    public function setSuccessCount($successCount)
    {
        $this->successCount = $successCount;

        return $this;
    }

    /**
     * Get successCount
     *
     * @return integer
     */
    public function getSuccessCount()
    {
        return $this->successCount;
    }

    /**
     * Set totalCount
     *
     * @param integer $totalCount
     * @return ImportProcess
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * Get totalCount
     *
     * @return integer
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }


    /**
     * Set filename
     *
     * @param string $filename
     * @return ImportProcess
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
     * Set coldef
     *
     * @param string $coldef
     * @return ImportProcess
     */
    public function setColdef($coldef)
    {
        $this->coldef = $coldef;

        return $this;
    }

    /**
     * Get coldef
     *
     * @return string
     */
    public function getColdef()
    {
        return $this->coldef;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ImportProcess
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return ImportProcess
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}
