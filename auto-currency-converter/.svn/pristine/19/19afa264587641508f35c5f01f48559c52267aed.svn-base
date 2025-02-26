call phpunit-skelgen  generate-test -- Akky\Money\ExchangeRate includes\Akky\Money\ExchangeRate.php Akky\Money\ExchangeRateTest tests/ExchangeRateTest.php
if not %ERRORLEVEL% == 0 (
	exit /b %ERRORLEVEL%
)

call phpunit-skelgen  generate-test --bootstrap tests\bootstrap.php -- Akky\Money\Usd includes\Akky\Money\Usd.php Akky\Money\UsdTest tests/UsdTest.php
if not %ERRORLEVEL% == 0 (
	exit /b %ERRORLEVEL%
)

call phpunit-skelgen  generate-test --bootstrap tests\bootstrap.php -- Akky\Money\Jpy includes\Akky\Money\Jpy.php Akky\Money\JpyTest tests/JpyTest.php
if not %ERRORLEVEL% == 0 (
	exit /b %ERRORLEVEL%
)

call phpunit-skelgen  generate-test -- Akky\Money\JpyFormatter includes\Akky\Money\JpyFormatter.php Akky\Money\JpyFormatterTest tests/JpyFormatterTest.php
if not %ERRORLEVEL% == 0 (
	exit /b %ERRORLEVEL%
)

call phpunit-skelgen  generate-test -- Akky\Money\UsdFormatter includes\Akky\Money\UsdFormatter.php Akky\Money\UsdFormatterTest tests/UsdFormatterTest.php
if not %ERRORLEVEL% == 0 (
	exit /b %ERRORLEVEL%
)
