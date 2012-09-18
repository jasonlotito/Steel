<?php
/**
 * Element
 *
 * @package ${PACKAGE}
 * @subpackage ${SUBPACKAGE}
 * @author Jason Lotito <jlotito@meetme.com>
 */
abstract class Element
{
  const ATTR_LABEL = 'label';
  const ATTR_VALUE = 'value';
  const ATTR_NAME = 'name';
  const ATTR_CLASS = 'class';
  const ATTR_ID = 'id';



  protected $label;

  protected $name;

  protected $value;
}
