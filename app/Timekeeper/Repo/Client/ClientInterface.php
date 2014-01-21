<?php namespace Timekeeper\Repo\Client;

interface ClientInterface {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($data);
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id);

	/**
	 * Delete a client by Id
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id);

	/**
	 * Return a specific client by id
	 * 
	 * @param  integer $id
	 * @return User
	 */
	public function byId($id);

	/**
	 * Return a specific client by name
	 * 
	 * @param  string $name
	 * @return User
	 */
	public function byName($name);

	/**
	 * Return all the clients for the current user. 
	 *
	 * @return stdObject Collection of users
	 */
	public function all();

}
