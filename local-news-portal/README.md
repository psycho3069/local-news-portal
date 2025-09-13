# News Narayanganj - Laravel 12 Conversion

This is a Laravel 12 conversion of the original HTML news website "News Narayanganj" (নারায়ণগঞ্জের সংবাদ সারথি).

## Features

### Frontend
- **Responsive Design**: Fully responsive news website with Bengali language support
- **Category-based Navigation**: Multiple news categories like Politics, Sports, Economy, etc.
- **Article Display**: Featured articles, latest news, and popular articles
- **SEO Optimized**: Meta tags, Open Graph tags for social media sharing
- **Search Functionality**: Search articles across the website

### Backend (Admin Panel)
- **Dashboard**: Overview of articles, categories, and statistics
- **Article Management**: Create, edit, delete, and manage articles
- **Category Management**: Organize articles by categories
- **Image Upload**: Featured image support for articles
- **Publishing Control**: Draft/Published status and featured article selection

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd local-news-portal
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=CategorySeeder
   php artisan db:seed --class=ArticleSeeder
   ```

5. **Start the development server**
   ```bash
   php artisan serve
   ```

## Usage

### Frontend
- **Homepage**: `/` - Shows featured articles and latest news
- **Category Pages**: `/{category-slug}` - Shows articles from specific category
- **Article Pages**: `/{category-slug}/news/{article-slug}` - Individual article view

### Admin Panel
- **Dashboard**: `/admin` - Admin dashboard with statistics
- **Articles**: `/admin/articles` - Manage all articles
- **Create Article**: `/admin/articles/create` - Add new article
- **Edit Article**: `/admin/articles/{id}/edit` - Edit existing article

## Database Structure

### Categories Table
- `id` - Primary key
- `name` - English name
- `name_bn` - Bengali name
- `slug` - URL slug
- `description` - Category description
- `is_active` - Active status
- `sort_order` - Display order

### Articles Table
- `id` - Primary key
- `title` - Article title
- `slug` - URL slug
- `excerpt` - Short description
- `content` - Full article content
- `featured_image` - Image path
- `category_id` - Foreign key to categories
- `is_featured` - Featured article flag
- `is_published` - Published status
- `views` - View count
- `published_at` - Publication date

## Key Features Converted

1. **Original HTML Structure**: Converted static HTML to dynamic Laravel Blade templates
2. **CSS/JS Assets**: All original assets preserved and integrated
3. **Bengali Language Support**: Full Bengali language support maintained
4. **Responsive Design**: Original responsive design preserved
5. **Navigation**: Dynamic navigation based on database categories
6. **Article Management**: Complete CRUD operations for articles
7. **Image Handling**: Featured image upload and display
8. **SEO Features**: Meta tags, Open Graph tags for social sharing

## File Structure

```
local-news-portal/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/
│   │   │   ├── AdminController.php
│   │   │   └── AdminArticleController.php
│   │   ├── ArticleController.php
│   │   ├── CategoryController.php
│   │   └── HomeController.php
│   ├── Models/
│   │   ├── Article.php
│   │   └── Category.php
│   └── Providers/
│       └── ViewServiceProvider.php
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── asset/ (original CSS/JS/images)
│   └── media/ (uploaded content)
├── resources/views/
│   ├── admin/
│   ├── layouts/
│   ├── partials/
│   ├── article.blade.php
│   ├── category.blade.php
│   └── home.blade.php
└── routes/web.php
```

## Technologies Used

- **Laravel 12**: PHP framework
- **Bootstrap 4**: CSS framework (from original design)
- **MySQL/SQLite**: Database
- **Blade Templates**: Laravel templating engine
- **Font Awesome**: Icons
- **jQuery**: JavaScript library (from original design)

## Original Features Preserved

- Header with logo and navigation
- Search functionality
- Category-based navigation
- Featured articles section
- Latest news sidebar
- Popular articles tab
- Article detail pages with related articles
- Social sharing buttons
- Responsive design for mobile devices
- Bengali date formatting
- View counter for articles

## Admin Panel Features

- Dashboard with statistics
- Article management (CRUD operations)
- Image upload for featured images
- Draft/Published status control
- Featured article selection
- Category assignment
- View count tracking

## Future Enhancements

- User authentication and roles
- Comment system
- Newsletter subscription
- Advanced search with filters
- Social media integration
- RSS feeds
- Multi-language support
- Advanced SEO features
- Analytics integration
- Caching for better performance

## Support

For any issues or questions, please refer to the Laravel documentation or create an issue in the repository.