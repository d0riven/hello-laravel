php_docker := docker compose exec -w /workspace app


server:
	docker compose up -d

down:
	docker compose down

logs:
	docker compose logs -f

attach:
	$(php_docker) /bin/bash
