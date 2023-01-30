<?php
function test_bracket_validation($pattern, $input_strings, $expected_results) {
  foreach ($input_strings as $index => $input_string) {
    if (preg_match($pattern, $input_string) === $expected_results[$index]) {
      echo "Test $index: PASS\n";
    } else {
      echo "Test $index: FAIL\n";
    }
  }
}

$pattern = '/^(\{[^{}]*\}|\[[^\[\]]*\]|\([^()]*\))*$/';
$input_strings = [
  '{}[]()',
  '{[()]}',
  '{[(])}',
  '{{[[(())]]}}',
  '',
  '{',
  '}',
  '[',
  ']',
  '(',
  ')',
];
$expected_results = [
  1,
  1,
  0,
  1,
  1,
  0,
  0,
  0,
  0,
  0,
  0,
];

test_bracket_validation($pattern, $input_strings, $expected_results);
?>