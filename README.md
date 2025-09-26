# Qit Helper Package

A collection of helper utilities for Laravel applications, providing YouTube video embedding and image processing capabilities.

## Description

This package provides essential helper functions for Laravel applications, including YouTube video iframe generation and image resizing with caching capabilities. Perfect for content management systems and media-heavy applications.

## Installation

You can install the package via Composer:

```bash
composer require qit/helper
```

**Note:** This package requires the Intervention Image library for image processing (V3):

```bash
composer require intervention/image
```

## Configuration

After installation, you need to register the service provider in your Laravel application.

### Laravel 5.5+ (Auto-Discovery)

The package will automatically register itself via Laravel's package auto-discovery feature.

### Manual Registration (Laravel 5.4 and below)

Add the service provider to your `config/app.php` file:

```php
'providers' => [
    // Other service providers...
    Qit\Helper\HelperServiceProvider::class,
],
```

## Usage

### YouTube Video Embedding

Generate YouTube video iframes or links from YouTube URLs:

```php
use Qit\Helper\functions\HelperGeneral;

// Generate an iframe (default)
$iframe = HelperGeneral::Youtube('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

// Generate with custom dimensions
$iframe = HelperGeneral::Youtube(
    'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    width: 800,
    height: 450,
    title: 'My Custom Video'
);

// Generate a clickable link instead of iframe
$link = HelperGeneral::Youtube(
    'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    title: 'Watch Video',
    iframe: false
);
```

**Supported YouTube URL formats:**
- `https://www.youtube.com/watch?v=VIDEO_ID`
- `https://youtu.be/VIDEO_ID`
- `https://www.youtube.com/embed/VIDEO_ID`

### Image Resizing and Caching

Resize images and create cached versions with optional small thumbnails:

```php
use Qit\Helper\functions\HelperGeneral;

// Basic resize - creates a cached version
HelperGeneral::ImgResize('image.jpg', 'uploads', 800, 600);

// Resize with small thumbnail
HelperGeneral::ImgResize(
    filename: 'image.jpg',
    path: 'uploads',
    weight: 800,
    height: 600,
    smallweight: 150,
    smallheight: 150
);

// Keep original aspect ratio (pass null for dimensions)
HelperGeneral::ImgResize('image.jpg', 'uploads', 'cache', 'small', 800, null);

// Custom folder names for cache and thumbnails
HelperGeneral::ImgResize('product.jpg', 'products', 'optimized', 'thumbs', 1200, 800, 200, 200);
```

**Image file structure created:**
```
storage/
├── uploads/
│   ├── image.jpg (original)
│   ├── cache/
│   │   └── image.jpg (resized version)
│   └── small/
│       └── image.jpg (thumbnail, if specified)
```

### E-commerce Order Status Management

Manage order statuses with predefined status codes and names:

```php
use Qit\Helper\functions\HelperShop;

// Get a specific order status name
$statusName = HelperShop::getOrderStatusName(1);
// Returns: "Confirmed"

// Handle unknown status codes
$statusName = HelperShop::getOrderStatusName(999);
// Returns: "Unknown Status"

// Get all available order statuses
$allStatuses = HelperShop::getOrderStatusName(null, true);
// Returns: [
//     0 => 'Pending',
//     1 => 'Confirmed',
//     2 => 'Processing',
//     3 => 'Shipped',
//     4 => 'Cancelled',
//     5 => 'Delivered'
// ]

// Usage in a loop for displaying order status options
foreach (HelperShop::getOrderStatusName(null, true) as $code => $name) {
    echo "<option value='{$code}'>{$name}</option>";
}
```

**Available Order Statuses:**
- `0` - Pending
- `1` - Confirmed  
- `2` - Processing
- `3` - Shipped
- `4` - Cancelled
- `5` - Delivered

## Features

- **YouTube Integration**: Convert YouTube URLs to embedded iframes or links
- **Image Processing**: Resize images with automatic caching and custom folder names
- **E-commerce Support**: Order status management with predefined status codes
- **Flexible Dimensions**: Support for aspect ratio preservation
- **Thumbnail Generation**: Create small versions of images
- **Laravel Integration**: Service provider and auto-discovery support
- **PSR-4 Autoloading**: Modern PHP standards compliance

## Requirements

- PHP >= 7.2.5 || ^8.0
- Laravel >= 8.0 (supports up to Laravel 12.0)
- Intervention Image ^3.0 (for image processing)
- GD or Imagick PHP extension

## File Structure

```
src/
├── HelperServiceProvider.php
└── functions/
    ├── HelperGeneral.php
    └── HelperShop.php
```

## Error Handling

The package includes basic error handling, but you should wrap calls in try-catch blocks for production use:

```php
try {
    HelperGeneral::ImgResize('image.jpg', 'uploads', 'cache', 'small', 800, 600);
    $status = HelperShop::getOrderStatusName(1);
} catch (Exception $e) {
    // Handle errors
    Log::error('Helper function failed: ' . $e->getMessage());
}
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## Author

**Ahmed Saad Hassan**
- Email: alfker3@gmail.com

## Changelog

### v1.0.0 (2025-07-29)
- Initial release
- YouTube video iframe generation
- Image resizing with caching support and custom folder names
- E-commerce order status management
- Laravel service provider integration
- Support for Laravel 8.0 through 12.0
