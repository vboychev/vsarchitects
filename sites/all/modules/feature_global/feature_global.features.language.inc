<?php
/**
 * @file
 * feature_global.features.language.inc
 */

/**
 * Implements hook_locale_default_languages().
 */
function feature_global_locale_default_languages() {
  $languages = array();

  // Exported language: bg.
  $languages['bg'] = array(
    'language' => 'bg',
    'name' => 'Bulgarian',
    'native' => 'Български',
    'direction' => 0,
    'enabled' => 1,
    'plurals' => 2,
    'formula' => '($n!=1)',
    'domain' => '',
    'prefix' => 'bg',
    'weight' => 0,
  );
  // Exported language: en.
  $languages['en'] = array(
    'language' => 'en',
    'name' => 'English',
    'native' => 'English',
    'direction' => 0,
    'enabled' => 1,
    'plurals' => 0,
    'formula' => '',
    'domain' => '',
    'prefix' => 'en',
    'weight' => 0,
  );
  return $languages;
}
