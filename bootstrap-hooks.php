<?php
// HOOK, GIT and PROJECT dir
define('HOOK_DIR',  realpath(dirname(__FILE__)));
define('GIT_DIR',  HOOK_DIR . '/../');
define('PROJECT_DIR',  GIT_DIR . '/../');
// PREFIX, $SCRIPT variable should be defined
define('PREFIX',  "Git Hook '$SCRIPT': "); 
