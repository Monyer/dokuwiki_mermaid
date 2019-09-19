<?php
/**
 * DokuWiki Plugin mermaid (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  monyer <monyer@126.com>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_mermaid extends DokuWiki_Action_Plugin {

    public function register(Doku_Event_Handler $controller) {
       $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'handle_toolbar_define',array());
    }

    public function handle_toolbar_define(Doku_Event &$event, $param) {
	$event->data[] = array (
		'type' => 'format',
		'title' => '\ngraph TD\nA-->B\nA-->C\nB-->D\nC-->D\n',
		'icon' => '../../plugins/mermaid/images/toolbar.png',
		'open' => '<mermaid doc="https://mermaidjs.github.io/#/">',
		'close' => '</mermaid>',
        );
    }

}

// vim:ts=4:sw=4:et:
