<?php
/**
 * DokuWiki Plugin mermaid (Syntax Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  monyer <monyer@126.com>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

class syntax_plugin_mermaid extends DokuWiki_Syntax_Plugin {

    public function getType() {
        return 'formatting';
    }

    public function getSort() {
        return 158;
    }

    public function getAllowedTypes() { 
        return array('disabled');
    }

    public function connectTo($mode) {
        $this->Lexer->addEntryPattern('<mermaid[^>]*>(?=.*?</mermaid>)',$mode,'plugin_mermaid');
    }

    public function postConnect() {
        $this->Lexer->addExitPattern('</mermaid>','plugin_mermaid');
    }

    public function handle($match, $state, $pos, Doku_Handler $handler){
        switch($state){
    	    case DOKU_LEXER_ENTER :
                return array($state, $match);
            case DOKU_LEXER_UNMATCHED :  
                return array($state, $match);
            case DOKU_LEXER_EXIT :       
                return array($state, '');
	    }
        return array();
    }

    public function render($mode, Doku_Renderer $renderer, $data) {
	    if($mode == 'xhtml'){
            list($state, $match) = $data;
            switch ($state) {
                case DOKU_LEXER_ENTER :      
                    $renderer->doc .= "<span class='mermaid'>"; 
                    break;
                case DOKU_LEXER_UNMATCHED :
                    $renderer->doc .= $match;
                    break;
                case DOKU_LEXER_EXIT :       
                    $renderer->doc .= "</span>";
                    break;
            }
            return true;
        }
        return false;
    }
}

// vim:ts=4:sw=4:et:
