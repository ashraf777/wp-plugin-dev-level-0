<?php
/**
  * @package AshrafPlugin
  */

class AshrafPluginDeactivate
{
  public static function deactivate() {
      flush_rewrite_rules();
    }
}
