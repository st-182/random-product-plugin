start: 
	docker compose up -d --build && docker exec -w '/var/www/html/wp-content/plugins' random_product_wordpress_composer composer install
lint:
	docker exec -w '/var/www/html/wp-content/plugins' random_product_wordpress_composer composer lint:plugin
fix:
	docker exec -w '/var/www/html/wp-content/plugins' random_product_wordpress_composer composer fix:plugin