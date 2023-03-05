php_docker := docker compose exec app


server:
	docker compose up -d

logs:
	docker compose logs -f

attach:
	$(php_docker) /bin/bash
