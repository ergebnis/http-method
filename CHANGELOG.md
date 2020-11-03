# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`2.1.0...main`][2.1.0...main].

## [`2.1.0`][2.1.0]

For a full diff see [`2.0.1...2.1.0`][2.0.1...2.1.0].

### Added

* Added support for PHP 8.0 ([#274]), by [@localheinz]

## [`2.0.1`][2.0.1]

For a full diff see [`2.0.0...2.0.1`][2.0.0...2.0.1].

### Fixed

* Removed an inappropriate `replace` configuration from `composer.json` ([#73]), by [@localheinz]

### [`2.0.0`][2.0.0]

For a full diff see [`1.0.0...2.0.0`][1.0.0...2.0.0].

### Changed

* Renamed vendor namespace `Localheinz` to `Ergebnis` after move to [@ergebnis] ([#70]), by [@localheinz]

  Run

  ```
  $ composer remove localheinz/http-method
  ```

  and


  ```
  $ composer require ergebnis/http-method
  ```

  to update.

  Run

  ```
  $ find . -type f -exec sed -i '.bak' 's/Localheinz\\Http/Ergebnis\\Http/g' {} \;
  ```

  to replace occurrences of `Localheinz\Http` with `Ergebnis\Http`.

  Run

  ```
  $ find -type f -name '*.bak' -delete
  ```

  to delete backup files created in the previous step.

### [`1.0.0`][1.0.0]

For a full diff see [`848192d...1.0.0`][848192d...1.0.0].

### Added

* Added interface for RFC7231 ([#5]), by [@localheinz]
* Added interface for RFC5789 ([#7]), by [@localheinz]
* Added interface for RFC2068 ([#8]), by [@localheinz]
* Added interface for RFC3253 ([#9]), by [@localheinz]
* Added interface for RFC3648 ([#10]), by [@localheinz]
* Added interface for RFC3744 ([#11]), by [@localheinz]
* Added interface for RFC4437 ([#12]), by [@localheinz]
* Added interface for RFC4791 ([#13]), by [@localheinz]
* Added interface for RFC4918 ([#14]), by [@localheinz]
* Added interface for RFC5323 ([#15]), by [@localheinz]
* Added interface for RFC5842 ([#16]), by [@localheinz]
* Added interface for RFC7540 ([#17]), by [@localheinz]
* Added interface for Squid cache request methods ([#18]), by [@localheinz]
* Added interface for Varnish cache request methods ([#19]), by [@localheinz]
* Added interface for aggregating HTTP methods related to WebDAV ([#22]), by [@localheinz]

[1.0.0]: https://github.com/ergebnis/http-method/releases/tag/1.0.0
[2.0.0]: https://github.com/ergebnis/http-method/releases/tag/2.0.0
[2.0.1]: https://github.com/ergebnis/http-method/releases/tag/2.0.1
[2.1.0]: https://github.com/ergebnis/http-method/releases/tag/2.1.0

[848192d...1.0.0]: https://github.com/ergebnis/http-method/compare/848192d...1.0.0
[1.0.0...2.0.0]: https://github.com/ergebnis/http-method/compare/1.0.0...2.0.0
[2.0.0...2.0.1]: https://github.com/ergebnis/http-method/compare/2.0.0...2.0.1
[2.0.1...2.1.0]: https://github.com/ergebnis/http-method/compare/2.0.1...2.1.0
[2.1.0...main]: https://github.com/ergebnis/http-method/compare/2.1.0...main

[#5]: https://github.com/ergebnis/http-method/pull/5
[#7]: https://github.com/ergebnis/http-method/pull/7
[#8]: https://github.com/ergebnis/http-method/pull/8
[#9]: https://github.com/ergebnis/http-method/pull/9
[#10]: https://github.com/ergebnis/http-method/pull/10
[#11]: https://github.com/ergebnis/http-method/pull/11
[#12]: https://github.com/ergebnis/http-method/pull/12
[#13]: https://github.com/ergebnis/http-method/pull/13
[#14]: https://github.com/ergebnis/http-method/pull/14
[#15]: https://github.com/ergebnis/http-method/pull/15
[#16]: https://github.com/ergebnis/http-method/pull/16
[#17]: https://github.com/ergebnis/http-method/pull/17
[#18]: https://github.com/ergebnis/http-method/pull/18
[#19]: https://github.com/ergebnis/http-method/pull/19
[#22]: https://github.com/ergebnis/http-method/pull/22
[#70]: https://github.com/ergebnis/http-method/pull/70
[#73]: https://github.com/ergebnis/http-method/pull/70
[#274]: https://github.com/ergebnis/http-method/pull/274

[@ergebnis]: https://github.com/ergebnis
[@localheinz]: https://github.com/localheinz
