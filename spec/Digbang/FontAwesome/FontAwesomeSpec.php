<?php namespace spec\Digbang\FontAwesome;

use Illuminate\Html\HtmlBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FontAwesomeSpec extends ObjectBehavior
{
	function let()
	{
		$this->beConstructedWith(new HtmlBuilder());
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Digbang\FontAwesome\FontAwesome');
    }

	function it_should_give_me_an_icon()
	{
		$this->icon('times')->shouldMatch('/class="[^"]*fa fa-times[^"]*"/');
		$this->icon('fa-times')->shouldMatch('/class="[^"]*fa fa-times[^"]*"/');
		$this->icon('times', ['class' => 'fa-bigger'])->shouldMatch('/class="[^"]*fa fa-times[^"]* fa-bigger[^"]*"/');
		$this->icon('fa-times', 'fa-bigger')->shouldMatch('/class="[^"]*fa fa-times[^"]* fa-bigger[^"]*"/');
	}

	function it_should_let_me_change_the_tag()
	{
		$this->setTag('span');

		$this->icon('times')->shouldMatch('/^<span/');
	}

	public function getMatchers()
	{
		return [
			'match' => function($subject, $argument) {
				return preg_match($argument, $subject) > 0;
			}
		];
	}
}
