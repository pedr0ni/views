# PHP views

A simple view controller for PHP

## Getting Started

```
git clone https://github.com/pedr0ni/views.git
```

### Prerequisites

PHP 5.6+

## Running the tests

Including the View class
```php
namespace ViewManager;
include src/View.php;
```

Rendering the view (Located in Views folder)
```php
echo View::getView('index', ['name' => 'Pedroni']);
```

## Authors

* **M. Pedroni** - [Pedr0ni](https://github.com/pedr0ni)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details