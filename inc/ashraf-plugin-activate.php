<?php
/**
  * @package AshrafPlugin
  */

class AshrafPluginActivate
{
  public static function activate() {
    // $this->custom_post_type();
    flush_rewrite_rules();
  }
}
