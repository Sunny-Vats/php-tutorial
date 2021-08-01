# Functions

<p>A function is a group of statements and variables that performs an intended action and are re-usable.</p>

### What FUNCTIONS do?

- return something
- print someting
- assign something

### Syntax

```php
function function_name() {
    $var_name = some_value;
    echo "The value of var_name is: ". $var_name . ".";
    return something;
}
```

### Rules for defining FUNCTION

- Valid 'function' name start with a letters, numbers or underscores.
- function name is optional if function is used as anonymous function.
- functions defined inside functions exist only when outer function is called.
