<?php namespace Illuminate3\BootAwesome;

use Illuminate3\BootAwesome\Contracts\IncludableInterface;
use Illuminate3\BootAwesome\Contracts\FormableInterface;
use Illuminate3\BootAwesome\Contracts\LinkableInterface;
use Illuminate3\BootAwesome\Contracts\AlertableInterface;

use HTML;
use URL;

class Bootstrap extends BootstrapBase implements IncludableInterface, FormableInterface, LinkableInterface, AlertableInterface {

/*
	public function __construct(Illuminate\Routing\UrlGenerator $url = null)
	{
		$this->url = $url;
	}
*/

	/**
	 * Include the Bootstrap CDN / Local CSS file
	 *
	 * @param string $type
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function cssBoot($type = 'cdn', array $attributes = array())
	{
		switch($type)
		{
			case 'cdn':
				$return = $this->add('style', self::CSS_BOOTSTRAP_CDN, $attributes) .
					$this->add('style', self::CSS_DATETIME_CDN, $attributes);
				break;
			case 'local':
			default:
				$return = $this->add('style', asset(self::CSS_BOOTSTRAP_LOCAL), $attributes) .
					$this->add('style', self::CSS_BOOTSTRAP_MAP_LOCAL, $attributes) .
					$this->add('style', asset(self::CSS_DATETIME_LOCAL), $attributes);
		}

		return $return;
	}

	/**
	 * Include the FontAwesome CDN / Local CSS file
	 *
	 * @param string $type
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function cssFont($type = 'cdn', array $attributes = array())
	{
		switch($type)
		{
			case 'cdn':
				$return = $this->add('style', self::CSS_FONTAWESOME_CDN, $attributes);
				break;
			case 'local':
			default:
				$return = $this->add('style', asset(self::CSS_FONTAWESOME_LOCAL), $attributes);
		}

		return $return;
	}

	/**
	 * Include the Bootstrap CDN JS file. Include jQuery CDN / Local JS file.
	 *
	 * @param string $type
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function js1x($type = 'cdn', array $attributes = array())
	{
		switch($type)
		{
			case 'cdn':
				$return = $this->add('script', self::JS_JQUERY_1x_CDN, $attributes) .
					$this->add('script', self::JS_BOOTSTRAP_CDN, $attributes) .
					$this->add('script', self::JS_MOMENT_CDN, $attributes) .
					$this->add('script', self::JS_DATETIME_CDN, $attributes);
				break;
			case 'local':
			default:
				$return = $this->add('script', asset(self::JS_JQUERY_1x_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_JQUERY_1x_MAP_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_BOOTSTRAP_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_MOMENT_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_DATETIME_LOCAL), $attributes);
		}

		return $return;
	}

	/**
	 * Include the Bootstrap CDN JS file. Include jQuery CDN / Local JS file.
	 *
	 * @param string $type
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function js2x($type = 'cdn', array $attributes = array())
	{
		switch($type)
		{
			case 'cdn':
				$return = $this->add('script', self::JS_JQUERY_2x_CDN, $attributes) .
					$this->add('script', self::JS_BOOTSTRAP_CDN, $attributes) .
					$this->add('script', self::JS_MOMENT_CDN, $attributes) .
					$this->add('script', self::JS_DATETIME_CDN, $attributes);
				break;
			case 'local':
			default:
				$return = $this->add('script', asset(self::JS_JQUERY_2x_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_JQUERY_2x_MAP_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_BOOTSTRAP_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_MOMENT_LOCAL), $attributes) .
					$this->add('script', asset(self::JS_DATETIME_LOCAL), $attributes);
		}

		return $return;
	}

	/**
	 * Create a form text field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param  string                        $icon (do not use the first fa)
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function text($name, $label = null, $value = null, $errors = null, $icon = null, array $options = array())
	{
		return $this->input('text', $name, $label, $value, $errors, $icon, $options);
	}

	/**
	 * Create a form password field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param  string                        $icon (do not use the first fa)
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function password($name, $label = null, $errors = null, $icon = null, array $options = array())
	{
		return $this->input('password', $name, $label, null, $errors, $icon, $options);
	}

	/**
	 * Create a form email field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param  string                        $icon (do not use the first fa)
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function email($name, $label = null, $value = null, $errors = null, $icon = null, array $options = array())
	{

		return $this->input('email', $name, $label, $value, $errors, $icon, $options);
	}

	/**
	 * Create a form file field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function file($name, $label = null, $errors = null, array $options = array())
	{
		return $this->input('file', $name, $label, null, $errors, $options);
	}

	/**
	 * Create a form date field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 * @param array                          $parameters
	 *
	 * @return string
	 */
	public function date($name, $label = null, $value = null, $errors = null, array $options = array(), array $parameters = array())
	{
		return $this->input('date', $name, $label, $value, $errors, $options, $parameters);
	}

	/**
	 * Create a form datetime field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 * @param array                          $parameters
	 *
	 * @return string
	 */
	public function datetime($name, $label = null, $value = null, $errors = null, array $options = array(), array $parameters = array())
	{
		return $this->input('datetime', $name, $label, $value, $errors, $options, $parameters);
	}

	/**
	 * Create a form time field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 * @param array                          $parameters
	 *
	 * @return string
	 */
	public function time($name, $label = null, $value = null, $errors = null, array $options = array(), array $parameters = array())
	{
		return $this->input('time', $name, $label, $value, $errors, $options, $parameters);
	}

	/**
	 * Create a form textarea field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param  string                        $icon (do not use the first fa)
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function textarea($name, $label = null, $value = null, $errors = null, $icon = null, array $options = array())
	{
		return $this->input('textarea', $name, $label, $value, $errors, $icon, $options);
	}

	/**
	 * Create a form select field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param array                          $list
	 * @param string                         $selected
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function select($name, $label = null, array $list = array(), $selected = null, $errors = null, array $options = array())
	{
		return $this->options($name, $label, $list, $selected, $errors, $options);
	}

	/**
	 * Create a form field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param integer $value
	 * @param string  $checked
	 * @param array   $options
	 *
	 * @return string
	 */
	public function checkbox($name, $label = null, $value = 1, $checked = null, array $options = array())
	{
		return $this->field('checkbox', $name, $label, $value, $checked, $options);
	}

	/**
	 * Create a form radio field.
	 *
	 * @param string $name
	 * @param string $label
	 * @param string $value
	 * @param string $checked
	 * @param array  $options
	 *
	 * @return string
	 */
	public function radio($name, $label = null, $value = null, $checked = null, array $options = array())
	{
		return $this->field('radio', $name, $label, $value, $checked, $options);
	}

	/**
	 * Create a form submit button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function submit($value, array $attributes = array())
	{
		return $this->action('submit', $value, $attributes);
	}

	/**
	 * Create a form button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function button($value, array $attributes = array())
	{
		return $this->action('button', $value, $attributes);
	}

	/**
	 * Create a form button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function modalButton($value, array $attributes = array())
	{
		return $this->action('submit', $value, $attributes);
	}

	/**
	 * Create a form reset button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function reset($value, array $attributes = array())
	{
		return $this->action('reset', $value, $attributes);
	}

	/**
	 * Create a button link to url.
	 *
	 * @param string $url
	 * @param string $title
	 * @param array  $attributes
	 * @param string $secure
	 *
	 * @return string
	 */
	public function link($url, $title = null, array $attributes = array(), $secure = null)
	{
		return $this->hyperlink('link', $url, $title, $parameters = array(), $attributes, $secure);
	}

	/**
	 * Create a secure button link to url.
	 *
	 * @param string $url
	 * @param string $title
	 * @param array  $attributes
	 * @param string $secure
	 *
	 * @return string
	 */
	public function secureLink($url, $title = null, array $attributes = array(), $secure = null)
	{
		return $this->hyperlink('secureLink', $url, $title, array(), $attributes, $secure);
	}

	/**
	 * Create a button link to route.
	 *
	 * @param string $name
	 * @param string $title
	 * @param array  $parameters
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function linkRoute($name, $title = null, array $parameters = array(), array $attributes = array())
	{
		return $this->hyperlink('linkRoute', $name, $title, $parameters, $attributes, null);
	}

	/**
	 * Create a button link to action.
	 *
	 * @param string $action
	 * @param string $title
	 * @param array  $parameters
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function linkAction($action, $title = null, array $parameters = array(), array $attributes = array())
	{
		return $this->hyperlink('linkAction', $action, $title, $parameters, $attributes, null);
	}

	/**
	 * Create a button link to an email address.
	 *
	 * @param string $email
	 * @param string $title
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function mailto($email, $title = null, array $attributes = array())
	{
		return $this->hyperlink('mailto', $email, $title, array(), $attributes, null);
	}

	/**
	 * Create a none alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function none($content = null, $emphasis = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('message', $content, $emphasis, $dismissible, $attributes);
	}

	/**
	 * Create a success alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function success($content = null, $emphasis = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('success', $content, $emphasis, $dismissible, $attributes);
	}

	/**
	 * Create an info alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function info($content = null, $emphasis = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('info', $content, $emphasis, $dismissible, $attributes);
	}

	/**
	 * Create a warning alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function warning($content = null, $emphasis = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('warning', $content, $emphasis, $dismissible, $attributes);
	}

	/**
	 * Create a danger alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function danger($content = null, $emphasis = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('danger', $content, $emphasis, $dismissible, $attributes);
	}

	/**
	 * Create a button for a modal
	 *
	 * @param string  $id
	 * @param string  $label
	 * @param string  $title
	 * @param string  $route
	 * @param string  $content
	 * @param string  $close
	 * @param string  $button
	 *
	 * @return string
	 */
	public function fullModal($id, $label, $title, $route, $method, $content, $close, $button)
	{
		return $this->modal($id, $label, $title, $route, $method, $content, $close, $button);
	}

	/**
	 * Generate a HTML link.
	 *
	 * @param  string  $url
	 * @param  string  $title
	 * @param  string  $icon (do not use the first fa)
	 * @param  array   $attributes
	 * @param  bool    $secure
	 * @return string
	 */
	public function linkIcon($url, $title = null, $icon = null, $attributes = array(), $secure = null)
	{
		$url = URL::route($url, array(), $secure);
		if (is_null($title) || $title === false) $title = $url;

		return '<a href="'.$url.'"'
		.HTML::attributes($attributes)
		. 'title="' . $title . '">
		<i class="fa fa-' . $icon . '"></i>'
		.HTML::entities($title)
		.'</a>';
	}

	/**
	 * Create a button link to route.
	 *
	 * @param string $name
	 * @param string $title
	 * @param array  $parameters
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function linkRouteIcon($name, $title = null, $icon = null, array $parameters = array(), array $attributes = array())
	{
/*
<a href="{{ route('admin.users.destroy', array($user->id)) }}"
	class="btn btn-danger form-group action_confirm"
	data-method="delete"
	title="{{ trans('lingos::account.command.delete') }}">
	<i class="fa fa-trash-o"></i>
	{{ trans('lingos::button.delete') }}
</a>
*/
//		return $this->hyperlink('linkRoute', $name, $title, $parameters, $attributes, null);

		$url = URL::route($name, $parameters);
		if (is_null($title) || $title === false) $title = $url;

		return '<a href="'.$url.'"'
		.HTML::attributes($attributes)
		. 'title="' . $title . '">
		<i class="fa fa-' . $icon . '"></i>'
		.HTML::entities($title)
		.'</a>';

	}

}
