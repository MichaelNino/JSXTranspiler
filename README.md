# JSXTranspiler
Add basic JSX to PHP functions

## Example
```
$inputJsx = <<<JSX
function HelloWorldComponent(\$name = 'World') {
  return (
    <h1>Hello {\$name}!</h1>
  );
}
JSX;
```
