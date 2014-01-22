<?php namespace Timekeeper\Repo\Client;

use Timekeeper\Repo\RepoAbstract;
use Illuminate\Database\Eloquent\Model;

class EloquentClient extends RepoAbstract implements ClientInterface {
	
	protected $client;

	/**
	 * Construct a new SentryClient Object
	 */
	public function __construct(Model $client)
	{
		$this->client = $client;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($data)
	{
		$client = $this->client->create(array(
			'name' => e($data['name']),
			'address' => e($data['address']),
			'user_id' => \Session::get('userId')
		));

		if ($client)	
			return true;
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($data)
	{
		$client = $this->client->find(e($data['client_id']));
		$client->name = e($data['name']);
		$client->address = e($data['address']);

		// Flush the cache
		//$key = md5('client_id.' . $data['client_id']);
		//$this->cache->forget($key);

		return true;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($client_id)
	{
		// Pull the report info, delete it 
        $client = $this->client->find($client_id);

        // Flush the cache
        // $key = md5('client_id.' . $client_id);
        // $this->cache->forget($key);

        $client->delete();
        return true;
	}

	/**
	 * Return a specific client by a given id
	 * 
	 * @param  integer $id
	 * @return Client
	 */
	public function byId($client_id)
	{
		// Build the cache key, unique per client slug
		// $key = md5('client_id.' . $client_id);

		// if ($this->cache->has($key))
		// {
		// 	return $this->cache->get($key);
		// }

		// Item not cached.  Retreive it. 
		$client = $this->client->where('id', $client_id)->first();

		// Store in Cache for the next request.
		//$this->cache->put($key, $client);
		
		return $client;
	}

	/**
	 * Return a specific client by a given name
	 * 
	 * @param  string $name
	 * @return Client
	 */
	public function byName($name)
	{
		// Build the cache key, unique per client slug
		$key = md5('client_name.' . $name);

		if ($this->cache->has($key))
		{
			return $this->cache->get($key);
		}

		// Item not cached.  Retreive it. 
		$client = $this->client->where('name', $name)->first();

		// Store in Cache for the next request.
		$this->cache->put($key, $client);
		
		return $client;
	}

	/**
	 * Return all the registered clients
	 *
	 * @return stdObject Collection of clients
	 */
	public function all()
	{
		return $this->client->where('user_id', \Session::get('userId'))->get();
	}
}
