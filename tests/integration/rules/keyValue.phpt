--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Validator as v;

exceptionMessage(static fn() => v::keyValue('foo', 'equals', 'bar')->check(['bar' => 42]));
exceptionMessage(static fn() => v::keyValue('foo', 'equals', 'bar')->check(['foo' => 42]));
exceptionMessage(static fn() => v::keyValue('foo', 'json', 'bar')->check(['foo' => 42, 'bar' => 43]));
exceptionMessage(static fn() => v::keyValue('foo', 'equals', 'bar')->check(['foo' => 1, 'bar' => 2]));
exceptionMessage(static fn() => v::not(v::keyValue('foo', 'equals', 'bar'))->check(['foo' => 1, 'bar' => 1]));
exceptionFullMessage(static fn() => v::keyValue('foo', 'equals', 'bar')->assert(['bar' => 42]));
exceptionFullMessage(static fn() => v::keyValue('foo', 'equals', 'bar')->assert(['foo' => 42]));
exceptionFullMessage(static fn() => v::keyValue('foo', 'json', 'bar')->assert(['foo' => 42, 'bar' => 43]));
exceptionFullMessage(static fn() => v::keyValue('foo', 'equals', 'bar')->assert(['foo' => 1, 'bar' => 2]));
exceptionFullMessage(static fn() => v::not(v::keyValue('foo', 'equals', 'bar'))->assert(['foo' => 1, 'bar' => 1]));
?>
--EXPECT--
foo must be present
bar must be present
"bar" must be valid to validate "foo"
The value of foo must equal "bar"
The value of foo must not equal "bar"
- foo must be present
- bar must be present
- "bar" must be valid to validate "foo"
- The value of foo must equal "bar"
- The value of foo must not equal "bar"
