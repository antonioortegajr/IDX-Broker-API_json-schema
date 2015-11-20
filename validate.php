<?php
//schema to use.
$version_component_schema = 'schemas/1-0-4/components/clients/featured.json';
$json_to_test = 'sample_return.json';


//two validation scripts from https://github.com/jesstelford/jsonschemaphp
require_once('JsonSchema.php');
require_once('JsonSchemaUndefined.php');

$schema1 = file_get_contents($version_component_schema);
$return1 = file_get_contents($json_to_test);

if($schema1) {
  $schema = json_decode($schema1);
  if(!$schema) {
    trigger_error('Could not parse the SCHEMA object.',E_USER_ERROR);
  }
}
else {
  $schema = null;
}

$json = json_decode($return1);
if(!$json) {
  trigger_error('Could not parse the JSON object.',E_USER_ERROR);
}

$result = JsonSchema::validate(
  $json,
  $schema
);

$done = json_encode($result);
var_dump(json_decode($done));

?>
