<?php

use Timekeeper\Repo\Client\ClientInterface;

class ClientController extends BaseController {

	/**
	 * Member Vars
	 */
	protected $client;
	//protected $reportForm;
	protected $perPage = 10;

	/**
	* Instantiate a new ReportController
	*/
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        //$this->reportForm = $reportForm;

        //Set up auth filter
        $this->beforeFilter('auth');

        //Check CSRF token on POST
        $this->beforeFilter('csrf', array('on' => 'post'));
        
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clients = $this->client->all();

        return View::make('clients.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('clients.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('clients.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
