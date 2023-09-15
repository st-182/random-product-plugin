
Acceptance:
The plugin must have a page that could be accessed from the WordPress admin (wp-admin).
- link is placed in Dashboard widget area and in admin left panel. 
The plugin must have a link in the wp-admin side menu that leads to the plugin dashboard.
- the same answer.
The shortcode should return random products.
- [random_products] returns the number of products
The number of the products returned could be changed from the plugin admin page.
- done in settings page
Requirements:
The plugin should handle shortcode [random_products]

README file contains documentation about the plugin.
Provide resources from your search to complete the task

Code readability

Git commits (as more granular as it makes sense for you)

Plus:
Usage of docker compose to run the plugin with ease
- realization of one-command installation in docker
Code linting
- done with composer. Also, plugins are installed via composer

docker compose up -d --build && docker exec -w '/var/www/html/wp-content/plugins' wordpress-untitled composer install

1) 
2) 
3)
Please visit http://localhost:8000/, follow instructions and setup the website.
Go to  http://localhost:8000/wp-admin
Activate plugins in plugins section 
When you will activate woocommerce please import products from sample_product.csv in root directory of the project. 
