<?php namespace EscojLB\Repo\Judgment;

interface JudgmentInterface {

	/**
     * Create a new Judgment
     *
     * @param array  Data to create a new user object
     * @param int  $contest_id if this is not null idicates wheter a judgment belongs to a contest and the id is given.
     * @return User Object
     */
    public function create(array $data, $contest_id = null);

     /**
     * Get paginated judgments
     *
     * @param int $limit Results per page
     * @param array $contest_data indicates if judgments will be filtered by contest_id field and if the contest is current appply the logic to frozen time.
     * @return LengthAwarePaginator with the judgments to paginate
     */
    public function getAllPaginate($limit = 10, array $contest_data = null);

    /**
     * Get filter paginated judgments
     *
     * @param int $limit Results per page
     * @param array  Data that contains the filters to apply to the query.
     * @param array $contest_data indicates if judgments will be filtered by contest_id field and if the contest is current appply the logic to frozen time.
     * @return LengthAwarePaginator with the judgments to paginate
     */
    public function getAllPaginateFiltered($limit = 10, array $data, array $contest_data = null);
}
