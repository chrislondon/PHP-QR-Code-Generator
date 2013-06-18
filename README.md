# PHPQRCodeGenerator v0.0.~1

PHP class for generating QR codes, created and maintained by [Chris London](http://www.chrislondon.co).

## Quick start

* [Download repo](https://github.com/chrislondon/PHPQRCodeGenerator/archive/master.zip) or [Fork repo](https://github.com/chrislondon/PHPQRCodeGenerator/fork)
* [See demo file for quick use](https://github.com/chrislondon/PHPQRCodeGenerator/blob/master/demo/index.php)

## Usage

PHP QR Code Generator has many configurable pieces. To make usage simple the QR class instantiates a bunch of defaults.  You can use it like this:

```php
<?php
    include('../src/QR/QR.php');

    $qrCode = QR\QR::generate('1234567890');
    $qrCode->printCode();
```

## Todos

The big todos left for this projet are:

- [X] generate error codewords
- [ ] implement mask patterns
- [ ] test generated qr code
- [ ] implement code word blocks
- [ ] implement alphanumeric and latin character sets
- [ ] implement multiple character set streams

## Developing PHP QR Code Generator

The only tool we are currently using for development is PHPUnit. You can install all of the project's dependencies by using composer:

````
composer install
````

At the moment we are not far enough in the releases to create an actual release. Development is currently happening on the master branch.  Feel free to open a pull request on the master branch.

## Copyright and license

Copyright 2013 Chris London

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this work except in compliance with the License. You may obtain a copy of the License in the LICENSE file, or at:

  [http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.