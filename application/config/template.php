<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');
/*
 |--------------------------------------------------------------------------
 | Active template
 |--------------------------------------------------------------------------
 |
 | The $template['active_template'] setting lets you choose which template
 | group to make active.  By default there is only one group (the
 | "default" group).
 |
 */
$template['active_template'] = 'default';

/*
 |--------------------------------------------------------------------------
 | Explaination of template group variables
 |--------------------------------------------------------------------------
 |
 | ['template'] The filename of your master template file in the Views folder.
 |   Typically this file will contain a full XHTML skeleton that outputs your
 |   full template or region per region. Include the file extension if other
 |   than ".php"
 | ['regions'] Places within the template where your content may land.
 |   You may also include default markup, wrappers and attributes here
 |   (though not recommended). Region keys must be translatable into variables
 |   (no spaces or dashes, etc)
 | ['parser'] The parser class/library to use for the parse_view() method
 |   NOTE: See http://codeigniter.com/forums/viewthread/60050/P0/ for a good
 |   Smarty Parser that works perfectly with Template
 | ['parse_template'] FALSE (default) to treat master template as a View. TRUE
 |   to user parser (see above) on the master template
 |
 | Region information can be extended by setting the following variables:
 | ['content'] Must be an array! Use to set default region content
 | ['name'] A string to identify the region beyond what it is defined by its key.
 | ['wrapper'] An HTML element to wrap the region contents in. (We
 |   recommend doing this in your template file.)
 | ['attributes'] Multidimensional array defining HTML attributes of the
 |   wrapper. (We recommend doing this in your template file.)
 |
 | Example:
 | $template['default']['regions'] = array(
 |    'header' => array(
 |       'content' => array('<h1>Welcome</h1>','<p>Hello World</p>'),
 |       'name' => 'Page Header',
 |       'wrapper' => '<div>',
 |       'attributes' => array('id' => 'header', 'class' => 'clearfix')
 |    )
 | );
 |
 */

/*
 |--------------------------------------------------------------------------
 | Default Template Configuration (adjust this or create your own)
 |--------------------------------------------------------------------------
 */
 
$ci = & get_instance();

$view_data = array();

if ($ci->config->item('development'))
{
	$view_data['dev_msg'] = "Your are viewing the H4XED Radio development site";
}
else
{
	$view_data['dev_msg'] = "";
}

$template['default']['template'] = 'template';
$template['default']['regions'] = array (
'title'=> array('content'=> array('H4XED Radio - Melodic Death Metal Streaming Radio'), 'name'=>'Page Title'),
'main',
'right',
'header' => array('content' => array($ci->load->view('include/header', $view_data, true)), 'name' => 'HTML Header'),
'hlinks',
'currently_playing',
'footer'
);
$template['default']['parser'] = 'parser';
$template['default']['parser_method'] = 'parse';
$template['default']['parse_template'] = true;

/* End of file template.php */
/* Location: ./system/application/config/template.php */