# PHP Server Status
[![Latest Version](https://img.shields.io/github/release/tylercd100/server-status.svg?style=flat-square)](https://github.com/tylercd100/server-status/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/tylercd100/server-status.svg?branch=master)](https://travis-ci.org/tylercd100/server-status)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/tylercd100/server-status/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/tylercd100/server-status/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/tylercd100/server-status/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/tylercd100/server-status/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/56f3252c35630e0029db0187/badge.svg?style=flat)](https://www.versioneye.com/user/projects/56f3252c35630e0029db0187)
[![Total Downloads](https://img.shields.io/packagist/dt/tylercd100/server-status.svg?style=flat-square)](https://packagist.org/packages/tylercd100/server-status)

Can ping and return status code of a host

## Installation

Install via [composer](https://getcomposer.org/) - In the terminal:
```bash
composer require tylercd100/server-status
```

## Usage

```php
use Tylercd100\ServerStatus\Host;

$host = new Host("google.com"); // or an IP address; 127.0.0.1

echo "Host ping: " . $host->ping() . "\n";
echo "Host status code: " . $host->status() . "\n";
```