<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Documents extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('documents/' . $endpoint);
    }

    /**
     * Get All Document Types
     *
     * @return mixed
     */
    public function getAllDocumentTypes()
    {
        $url = $this->getUrl('getAllDocumentTypes');
        // TODO
    }

    /**
     * Get By MB Reference
     *
     * @return mixed
     */
    public function getByMBReference()
    {
        $url = $this->getUrl('getByMBReference');
        // TODO
    }

    /**
     * Set MB Reference As Paid
     *
     * @return mixed
     */
    public function setMBReferenceAsPaid()
    {
        $url = $this->getUrl('setMBReferenceAsPaid');
        // TODO
    }

    /**
     * Count
     *
     * @return mixed
     */
    public function count()
    {
        $url = $this->getUrl('count');
        // TODO
    }

    /**
     * Get All
     *
     * @return mixed
     */
    public function getAll()
    {
        $url = $this->getUrl('getAll');
        // TODO
    }

    /**
     * Get One
     *
     * @return mixed
     */
    public function getOne()
    {
        $url = $this->getUrl('getOne');
        // TODO
    }

    /**
     * Get PDF Link
     *
     * @return mixed
     */
    public function getPDFLink()
    {
        $url = $this->getUrl('getPDFLink');
        // TODO
    }

    /**
     * Count Modified Since
     *
     * @return mixed
     */
    public function countModifiedSince()
    {
        $url = $this->getUrl('countModifiedSince');
        // TODO
    }

    /**
     * Get Modified Since
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $url = $this->getUrl('getModifiedSince');
        // TODO
    }

    /**
     * Delete MB Reference
     *
     * @return mixed
     */
    public function deleteMBReference()
    {
        $url = $this->getUrl('deleteMBReference');
        // TODO
    }

    /**
     * Document Cancel
     *
     * @return mixed
     */
    public function documentCancel()
    {
        $url = $this->getUrl('documentCancel');
        // TODO
    }

    /**
     * Document Draft
     *
     * @return mixed
     */
    public function documentDraft()
    {
        $url = $this->getUrl('documentDraft');
        // TODO
    }
}