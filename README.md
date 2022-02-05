## Step 1: Install dependencies

1. Clone this repo
2. `cd` into the project folder
3. Run the following commands:

```bash
composer install
php artisan key:generate
php artisan serve
```

## Step 2: Edit the example

Open [app/Http/Controllers/HomeController.php](app/Http/Controllers/HomeController.php) with your favorite editor and replace the placeholders in the example with your API Keys and customer information

## Step 3: Run the example

Visit [http://localhost:8000](http://localhost:8000) in your browser to see either the resulting invoice or the error objects.
