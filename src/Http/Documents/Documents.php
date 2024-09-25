<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Documents extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'documents/' . $endpoint;
    }

    /**
     * Get All Document Types
     *
     * @return mixed
     */
    public function getAllDocumentTypes()
    {
        $endpoint = $this->getEndpoint('getAllDocumentTypes/');
        // TODO
    }

    /**
     * Get By MB Reference
     *
     * @return mixed
     */
    public function getByMBReference()
    {
        $endpoint = $this->getEndpoint('getByMBReference/');
        // TODO
    }

    /**
     * Set MB Reference As Paid
     *
     * @return mixed
     */
    public function setMBReferenceAsPaid()
    {
        $endpoint = $this->getEndpoint('setMBReferenceAsPaid/');
        // TODO
    }

    /**
     * Count
     *
     * @return mixed
     */
    public function count()
    {
        $endpoint = $this->getEndpoint('count/');
        // TODO
    }

    /**
     * Get All
     *
     * @return mixed
     */
    public function getAll()
    {
        $endpoint = $this->getEndpoint('getAll/');
        // TODO
    }

    /**
     * Get One
     *
     * @return mixed
     */
    public function getOne()
    {
        $endpoint = $this->getEndpoint('getOne/');
        // TODO
    }

    /**
     * Get PDF Link
     *
     * @return mixed
     */
    public function getPDFLink()
    {
        $endpoint = $this->getEndpoint('getPDFLink/');
        // TODO
    }

    /**
     * Count Modified Since
     *
     * @return mixed
     */
    public function countModifiedSince()
    {
        $endpoint = $this->getEndpoint('countModifiedSince/');
        // TODO
    }

    /**
     * Get Modified Since
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $endpoint = $this->getEndpoint('getModifiedSince/');
        // TODO
    }

    /**
     * Delete MB Reference
     *
     * @return mixed
     */
    public function deleteMBReference()
    {
        $endpoint = $this->getEndpoint('deleteMBReference/');
        // TODO
    }

    /**
     * Document Cancel
     *
     * @return mixed
     */
    public function documentCancel()
    {
        $endpoint = $this->getEndpoint('documentCancel/');
        // TODO
    }

    /**
     * Document Draft
     *
     * @return mixed
     */
    public function documentDraft()
    {
        $endpoint = $this->getEndpoint('documentDraft/');
        // TODO
    }
}