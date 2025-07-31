<?php

function transpileJsxToPhp($jsxCode) {
    // Match the function signature
    preg_match('/function\s+(\w+)\s*\((.*?)\)\s*\{/', $jsxCode, $fnMatch);
    $functionName = $fnMatch[1] ?? 'Component';
    $params = $fnMatch[2] ?? '';

    // Match the JSX inside return (...)
    preg_match('/return\s*\(\s*(.*?)\s*\);/s', $jsxCode, $jsxMatch);
    $jsxHtml = $jsxMatch[1] ?? '';

    // Remove newlines and extra spaces inside the HTML
    $jsxHtml = preg_replace('/\s+/', ' ', $jsxHtml);

    // Escape double quotes in HTML
    $jsxHtml = str_replace('"', '\"', $jsxHtml);

    // Convert {$var} to {$var} for PHP interpolation (already compatible)
    // If you want to support expressions, you can add more logic here.

    // Build PHP function
    $phpCode = "function $functionName($params) {\n    return \"$jsxHtml\";\n}\n";

    return $phpCode;
}

// Example usage:

/*
$inputJsx = <<<JSX
function HelloWorldComponent(\$name = 'World') {
  return (
    <h1>Hello {\$name}!</h1>
  );
}
JSX;
*/
