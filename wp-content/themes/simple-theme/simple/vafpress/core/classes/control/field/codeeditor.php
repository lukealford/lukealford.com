<?php

class VP_Control_Field_CodeEditor extends VP_Control_Field
{

	/**
	 * Editor's language mode
	 * (javascript, css, html, php, json, xml, markdown)
	 * @var String
	 */
	protected $_mode;

	/**
	 * Editor's theme
	 * (chaos, chrome, clouds, clouds_midnight, cobalt, crimson_editor, dawn, dreamweaver, eclipse,
	 *  github, mono_industrial, monokai, solarized_dark, solarized_light, textmate, twilight)
	 * @var String
	 */
	protected $_theme;

	public function __construct()
	{
		parent::__construct();
	}

	public static function withArray($arr = array(), $class_name = null)
	{
		if(is_null($class_name))
			$instance = new self();
		else
			$instance = new $class_name;
		$instance->_basic_make($arr);

		$instance->set_mode( isset($arr['mode'])  ? $arr['mode']  : 'css');
		$instance->set_theme(isset($arr['theme']) ? $arr['theme'] : 'textmate');

		return $instance;
	}

	protected function _setup_data()
	{
		$opt = array(
			'mode'  => $this->get_mode(),
			'theme' => $this->get_theme(),
		);
		$this->add_data('opt', VP_Util_Text::make_opt($opt));
		parent::_setup_data();
	}

	public function render($is_compact = false)
	{
		$this->_setup_data();
		$this->add_data('is_compact', $is_compact);
		return VP_View::instance()->load('control/codeeditor', $this->get_data());
	}

	public function get_value()
	{
		$value = $this->_value;
		$value = stripslashes($value);
		return $value;
	}

	/**
	 * Get editor's language mode
	 *
	 * @return String Language mode
	 */
	public function get_mode() {
	    return $this->_mode;
	}
	
	/**
	 * Set editor's language mode
	 *
	 * @param String $_mode Language mode
	 */
	public function set_mode($_mode) {
	    $this->_mode = $_mode;
	    return $this;
	}


	/**
	 * Get editor's theme
	 *
	 * @return String Editor's theme
	 */
	public function get_theme() {
	    return $this->_theme;
	}
	
	/**
	 * Set editor's theme
	 *
	 * @param String $_theme Editor's theme
	 */
	public function set_theme($_theme) {
	    $this->_theme = $_theme;
	    return $this;
	}

}

/**
 * EOF
 */