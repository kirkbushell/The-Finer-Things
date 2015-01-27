<?php
namespace spec\FinerThings\Stubs;

use FinerThings\Core\Events\EventRecorder;

class EventRecorderStub
{
	use EventRecorder;

	public function events()
	{
		return $this->events;
	}
}
