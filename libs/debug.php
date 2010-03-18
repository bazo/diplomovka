<?php
function fd()
{
  $args = func_get_args();
  foreach ($args as $index => $arg)
  {
    Debug::fireLog($arg);
  }
}
?>