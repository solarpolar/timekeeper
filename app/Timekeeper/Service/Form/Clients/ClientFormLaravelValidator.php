<?php namespace Timekeeper\Service\Form\Clients;

use Timekeeper\Service\Validation\AbstractLaravelValidator;

class ClientFormLaravelValidator extends AbstractLaravelValidator {
	
	/**
	 * Validation rules
	 *
	 * @var Array 
	 */
	protected $rules = array(
		'name' => 'required',
	);

	/**
	 * Custom Validation Messages
	 *
	 * @var Array 
	 */
	protected $messages = array(
		//'email.required' => 'An email address is required.'
	);
}