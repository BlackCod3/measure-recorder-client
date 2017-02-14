
## measure-recorder-client ##

This client handles mongo side data storage (and access also)

## Requirements ##

Install dependency by running the following command `composer install`

Update dependency if needed by running `composer update`

## Usage ##

```
<?php
// ...
// USAGE CODE GOES HERE

$client = new Client("dev"); 
....
// ...

?>
```

## Test ##

``	$  phpunit test/MeasureRecorder/ClientTest.php