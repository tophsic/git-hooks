<?php
if(!defined('GIT_DIR')) {
  echo "You should include bootstrap-hook.php before this script" . PHP_EOL;
  return;
}
$output = shell_exec('git diff -- ' . PROJECT_DIR . '/application/configs/application.ini');
if (!preg_match('/app.version/', $output)) {
  // Get configuration file content
  $file = PROJECT_DIR . '/application/configs/application.ini';
  $string = file_get_contents($file);
  // Pattern to match revision number
  $pattern = '/(app\.version\.revision[^0-9]*)([0-9]*)/';
  preg_match($pattern, $string, $matches);
  // Increment revision number
  $rev = $matches[2] + 1;
  // Do replacement
  $new_string = preg_replace($pattern, '${1}' . $rev, $string);
  // Put content to configuration file
  file_put_contents($file, $new_string);
  echo PREFIX . ":D App revision changed" . PHP_EOL;
} else {
  echo PREFIX . "App revision is allready changed" . PHP_EOL;
}
