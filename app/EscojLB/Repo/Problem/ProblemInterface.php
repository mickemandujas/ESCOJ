<?php namespace EscojLB\Repo\Problem;

interface ProblemInterface {

    /**
     * Create a new Problem
     *
     * @param array  Data to create a new object
     * @param int  ID of the user that add the problem
     * @return boolean id of the created problem or zero if fails
     */
    public function create(array $data, $user_id);

    /**
     * Update an existing Problem
     *
     * @param array  Data to update an problem
     * @param  int $id       Problem ID
     * @return boolean 
     */
    public function update(array $data, $id);

     /**
     * Delete an existing Problem
     *
     * @param  int $id       Problem ID
     * @return boolean 
     */
    public function delete($id);

     /**
     * Update the flag of an existing Problem that indicates whether the probles has or not dataset.
     *
     * @param int  flag to update the dataset flag of the problem 0 or 1.
     * @param  int $id       Problem ID
     * @return boolean 
     */
    public function addOrDeleteDataset(int $flag, $id);

    /**
     * Assign the limits to an existing Problem
     *
     * @param array  Data to update the limitis of the problem
     * @param  int $id       Problem ID
     * @return boolean 
     */
    public function assignLimits(array $data, $id);


    /**
     * Retrieve all languages by Problem ID
     * @param  int $id       Problem ID
     * @return array        Array or Arrayable collection of Language objects
     */
    public function getAllLanguages($id);


    /**
     * Get all languages as key-value array 
     *
     * @param  string $key  key to associate
     * @param  string $value  value to associate
     * @param  int $id       Problem ID
     * @return array    Associative Array with all languages
     */
    public function getKeyValueAllLanguages($key,$value,$id);


    /**
     * Get a Problem by Problem ID
     *
     * @param  int $id       Problem ID
     * @return Object    Problem model object
     */
    public function findById($id);


    /**
     * Get the limits for the problem
     *
     * @param  int $id       Problem ID
     * @param  int $language       Language ID
     * @return Object    Problem model object
     */
    public function findLimitsByIdAndLanguage($id, $language);

    /**
     * Get paginated problems
     *
     * @param int $limit Results per page
     * @param bool $enable indicates if problems will be filtered by enable field.
     * @param int $problem_setter indicates if problems will be filtered by added_by field.
     * @return LengthAwarePaginator with the problems to paginate
     */
    public function getAllPaginate($limit = 10, $enable = true, $problem_setter = 0);

    /**
     * Get filter paginated problems
     *
     * @param int $limit Results per page
     * @param array  Data that contains the filters to apply to the query.
     * @param bool $enable indicates if problems will be filtered by enable field.
     * @param int $problem_setter indicates if problems will be filtered by added_by field.
     * @return LengthAwarePaginator with the problems to paginate
     */
    public function getAllPaginateFiltered($limit = 10, array $data, $enable = true, $problem_setter = 0);

    /**
     * Get all Problems as key-value array 
     *
     * @param  string $key  key to associate
     * @param  string $value  value to associate
     * @param  string $order_by  value used to order the results
     * @return array    Associative Array with all Problems
     */
    public function getKeyValueAllOrderBy($key,$value,$order_by);

}