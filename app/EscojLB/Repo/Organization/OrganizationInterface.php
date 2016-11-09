<?php namespace EscojLB\Repo\Organization;

interface OrganizationInterface {

    /**
     * Get all Organizations as key-value array 
     *
     * @param  string $key  key to associate
     * @param  string $value  value to associate
     * @return array    Associative Array with all Organizations
     */
    public function getKeyValueAll($key,$value);

     /**
     * Get a Organization by Organization ID
     *
     * @param  int $id       Organization ID
     * @return Object    Organization model object
     */
    public function findById($id);

}
