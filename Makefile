all : hello phpstan
.PHONY : all

hello:
	sudo chown -R kak2z:kak2z .
	sudo chmod -R 777 .

phpstan:
	./vendor/bin/phpstan analyse --memory-limit=512M

