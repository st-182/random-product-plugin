
 # How to start with the project. 

- Please run `make start` in order to launch docker installation
- You can run `make lint` or `make fix` to see problems and automaticly fix them with the plugin. I used default wordpress set or rules.
- After the successful instalation please visit http://localhost:8000/, follow instructions and setup the website.
- Go to  http://localhost:8000/wp-admin
- Activate plugins in plugins section 
- When you will activate woocommerce please import products from sample_product.csv in root directory of the project. 
- Then please configure Socks Random Product plugin and put shortcode in any page. You will get random products.


 # Acceptance:
 ## The plugin must have a page that could be accessed from the WordPress admin (wp-admin).
- link is placed in Dashboard widget area and in admin left panel. 
 ## The plugin must have a link in the wp-admin side menu that leads to the plugin dashboard.
- the same answer.
 ## The shortcode should return random products.
- [random_products] returns the number of random products based on settings
 ## The number of the products returned could be changed from the plugin admin page.
- done in settings page of the plugin located in admin left panel
 ## Requirements:
 ## The plugin should handle shortcode [random_products]
- it does.
 ## README file contains documentation about the plugin.
- it does.
 ## Provide resources from your search to complete the task
- wordpress admin dashboard API
- all other information was retrieved during development by googling specific questions, so different aspects were searched.
 ## Code readability
- I left not that much comments because the functionality itself is very simple, so just necessary comments in my opinion
 ## Git commits (as more granular as it makes sense for you)
- made several commits with simple explanation, in bigger projects I would follow a structure like CDF-124:settings-page-implementation or something like this. 
 ## Plus:
 ## Usage of docker compose to run the plugin with ease
- realization of one-command installation in docker
 ## Code linting
- done with composer. Also, plugins are installed via composer. Please see commands description.