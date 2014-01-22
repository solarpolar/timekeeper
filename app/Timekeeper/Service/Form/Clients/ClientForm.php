<?php namespace Timekeeper\Service\Form\Clients;

use Timekeeper\Service\Validation\ValidableInterface;
use Timekeeper\Repo\Client\ClientInterface;

class ClientForm {

	/**
	 * Form Data
	 *
	 * @var array
	 */
	protected $data;

	/**
	 * Validator
	 *
	 * @var \Cesario\Service\Form\ValidableInterface 
	 */
	protected $validator;

	/**
	 * Session Repository
	 *
	 * @var \Cesario\Repo\Session\SessionInterface 
	 */
	protected $client;

	public function __construct(ValidableInterface $validator, ClientInterface $client)
	{
		$this->validator = $validator;
		$this->client = $client;

	}

	/**
     * Create a new client
     *
     * @return integer
     */
    public function store(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }

        return $this->client->store($input);
    }

	/**
     * Update a new client
     *
     * @return integer
     */
    public function update(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }

        return $this->client->update($input);
    }

	/**
	 * Return any validation errors
	 *
	 * @return array 
	 */
	public function errors()
	{
		return $this->validator->errors();
	}

	/**
	 * Test if form validator passes
	 *
	 * @return boolean 
	 */
	protected function valid(array $input)
	{

		return $this->validator->with($input)->passes();
		
	}


}