# Pronetis_RandomWidget

Magento 2 widget module that displays a random set of products in a grid format.

## Features

- Renders products using native `Magento_CatalogWidget` grid template
- Random product order (uses `ORDER BY RAND()`)
- Simple integration with default widget interface
- Basic cache control

## Installation

composer require pronetis/module-random-widget
bin/magento module:enable Pronetis_RandomWidget
bin/magento setup:upgrade


## Usage

1. Go to **Content > Widgets > Add Widget**
2. Choose type: **Catalog Products List**
3. Set design theme and proceed
4. In widget options:
    - Set widget type to use `Pronetis\RandomWidget\Block\Widget\Random`
    - Set number of products (default: 5)
5. Save and clear cache

## License

MIT