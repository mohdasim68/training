<?php

/**
 * OK we didnt need to override this class but here it is anyway
 */
require_once('service/core/SugarRestService.php');

class  FynsisRestService extends SugarRestService
{
	public function __construct($url)
	{
		parent::__construct($url);
	}

}
?>