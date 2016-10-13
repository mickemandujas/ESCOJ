<?php namespace EscojLB\Repo\Problem;

use Illuminate\Database\Eloquent\Model;
use EscojLB\Repo\Tag\TagInterface;
use EscojLB\Repo\Language\LanguageInterface;

class EloquentProblem implements ProblemInterface {

    protected $problem;
    protected $tag;
    protected $language;

    // Class expects an Eloquent model
    public function __construct(Model $problem, TagInterface $tag, LanguageInterface $language)
    {
        $this->problem = $problem;
        $this->tag = $tag;
        $this->language = $language;

    }

    /**
     * Create a new Problem
     *
     * @param array  Data to create a new object
     * @param int  ID of the user that add the problem
     * @return boolean id of the created problem or zero if fails
     */
    public function create(array $data, $user_id)
    {
        // Create the problem
        $problem = $this->problem->create(array(
            'name' => $data['name'],
            'source_id' => $data['source'],
            'description' => $data['description'],
            'input_specification' => $data['input_specification'],
            'output_specification' => $data['output_specification'],
            'sample_input' => $data['sample_input'],
            'sample_output' => $data['sample_output'],
            'hints' => $data['hints'],
            'added_by' => $user_id,
        ));

        if( ! $problem )
            return 0;

        $this->syncTags($problem, $data['tags']);
        $this->syncLanguages($problem, $data['languages']);

        
        return $problem->id;
    }

    /**
     * Sync tags for problem
     *
     * @param \Illuminate\Database\Eloquent\Model  $problem
     * @param array  $tags
     * @return void
     */
    protected function synctags(Model $problem, array $tags)
    {

        $tagIds = array();

        foreach($tags as $tag)
        {
            $tagIds[explode('_',$tag)[0]] = array('level' => explode('_',$tag)[1]) ;
        }

        // Assign set tags to problem
        $problem->tags()->sync($tagIds);
    }

    /**
     * Sync languages for problem
     *
     * @param \Illuminate\Database\Eloquent\Model  $problem
     * @param array  $languages
     * @return void
     */
    protected function syncLanguages(Model $problem, array $languages, array $data = null)
    {
        $languageIds = array();
        if( is_null($data) )
        {
            if(array_has($languages,'All'))
            {
                $languages = $this->language->getAll();

                foreach ($languages as $language)
                {
                    $languageIds[$language->id] = array(
                        'tlpc_multiplier' => $language->tlpc_multiplier,
                        'ttl_multiplier' => $language->ttl_multiplier,
                        'ml_multiplier' => $language->ml_multiplier,
                        'sl_multiplier' => $language->sl_multiplier,
                        );
                }
            }
            else
            {
                foreach($languages as $id)
                {
                    $language = $this->language->findById($id);

                    if($language)
                    {
                        $languageIds[$id] = array(
                            'tlpc_multiplier' => $language->tlpc_multiplier,
                            'ttl_multiplier' => $language->ttl_multiplier,
                            'ml_multiplier' => $language->ml_multiplier,
                            'sl_multiplier' => $language->sl_multiplier,
                            );
                    }
                }
            }
        }
        else
        {
            foreach($languages as $id)
            {

                $languageIds[$id] = array(
                    'tlpc_multiplier' => $data['tlpc_multiplier_'.$id],
                    'ttl_multiplier' => $data['ttl_multiplier_'.$id],
                    'ml_multiplier' => $data['ml_multiplier_'.$id],
                    'sl_multiplier' => $data['sl_multiplier_'.$id],
                    'tlpc' => $data['tlpc_'.$id],
                    'ttl' => $data['ttl_'.$id],
                    'ml' => $data['ml_'.$id],
                    'sl' => $data['sl_'.$id],
                    );
            }
        }
        
        // Assign set languages to problem
        $problem->languages()->sync($languageIds);
    }

    /**
     * Update an existing Problem
     *
     * @param array  Data to update an Problem
     * @return boolean
     */
    public function update(array $data)
    {
        $problem = $this->problem->find($data['id']);
        $problem->name = $data['name'];
        $problem->author = $data['author'];
        $problem->tlpc = $data['tlpc'];
        $problem->ttl = $data['ttl'];
        $problem->ml = $data['ml'];
        $problem->sl = $data['sl'];
        $problem->description = $data['description'];
        $problem->input_specification = $data['input_specification'];
        $problem->output_specification = $data['output_specification'];
        $problem->sample_input = $data['sample_input'];
        $problem->sample_output = $data['sample_output'];
        $problem->hints = $data['hints'];
        $problem->points = $data['points'];
        $problem->status = $data['status'];
        $problem->save();

        return true;
    }


    /**
     * Assign the limits to an existing Problem
     *
     * @param array  Data to update the limitis of the problem
     * @param  int $id       Problem ID
     * @return boolean 
     */
    public function assignLimits(array $data, $id){
        $problem = $this->problem->find($id);
        $problem->tlpc = $data['tlpc'];
        $problem->ttl = $data['ttl'];
        $problem->ml = $data['ml'];
        $problem->sl = $data['sl'];
        $problem->save();

        $this->syncLanguages($problem, $data['languages'],$data);
    }

    /**
     * Retrieve all languages by Problem ID
     * @param  int $id       Problem ID
     * @return array        Array or Arrayable collection of Language objects
     */
    public function getAllLanguages($id){
        $problem = $this->findById($id);
        return $problem->languages;
    }

       /**
     * Get all languages as key-value array 
     *
     * @param  string $key  key to associate
     * @param  string $value  value to associate
     * @param  int $id       Problem ID
     * @return array    Associative Array with all languages
     */
    public function getKeyValueAllLanguages($key,$value,$id){
        $problem = $this->findById($id);
        return $problem->languages->pluck($value,$key);
    }

    /**
     * Get a Problem by Problem ID
     *
     * @param  int $id       Problem ID
     * @return Object    Problem model object
     */
    public function findById($id){
        return $this->problem->find($id);
    }


}
