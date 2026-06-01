.PHONY: up build down down-clear restart reset shell shell.db \
	phpcs phpcbf css.build css.watch i18n.check i18n.build \
	wp.install wp.activate-theme wp.init-dev-site fake dev logs-clear

up:
	docker compose up -d

build:
	docker compose build

down:
	docker compose down

down-clear:
	docker compose down -v --remove-orphans

restart:
	docker compose down
	docker compose up -d

reset:
	docker compose down -v --remove-orphans
	docker compose up -d

shell:
	docker compose exec wordpress bash

shell.db:
	docker compose exec db mysql -u wp_user -pwp_pass wordpress

wp.install:
	docker compose exec wordpress sh -c '\
		cd /var/www/html && \
		if ! wp core is-installed --allow-root; then \
			wp core install \
				--url="http://localhost:9001" \
				--title="Mynote Dev" \
				--admin_user=admin \
				--admin_password=admin \
				--admin_email=admin@example.com \
				--skip-email \
				--allow-root; \
		fi'
	docker compose exec wordpress sh -c '\
		cd /var/www/html/wp-content/themes/mynote && \
		composer install'

wp.activate-theme:
	docker compose exec wordpress wp theme activate mynote --allow-root

wp.init-dev-site:
	make wp.install
	make wp.activate-theme

fake:
	docker compose exec wordpress sh -c '\
		curl -L -o /tmp/theme-test-data.xml \
			https://raw.githubusercontent.com/WordPress/theme-test-data/master/themeunittestdata.wordpress.xml && \
		wp plugin install wordpress-importer --activate --allow-root && \
		wp import /tmp/theme-test-data.xml --authors=create --allow-root'

phpcs:
	php -d xdebug.mode=off vendor/bin/phpcs --parallel=`getconf _NPROCESSORS_ONLN`

phpcbf:
	php -d xdebug.mode=off vendor/bin/phpcbf

css.build:
	npm run build

css.watch:
	npm run watch:css

i18n.check:
	docker compose exec wordpress sh -c '\
		cd /var/www/html/wp-content/themes/mynote && \
		wp i18n make-pot . languages/mynote.pot \
			--domain=mynote \
			--exclude=node_modules,vendor,wp-content \
			--allow-root'

i18n.build:
	@if command -v wp >/dev/null 2>&1; then \
		wp i18n make-mo languages --allow-root; \
	else \
		docker compose exec wordpress sh -c '\
			cd /var/www/html/wp-content/themes/mynote && \
			wp i18n make-mo languages --allow-root \
		'; \
	fi

logs-clear:
	docker compose exec wordpress rm -f wp-content/logs/debug.log || true

dev: up
	sleep 10
	make wp.init-dev-site
