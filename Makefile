install:
	composer install
brain-games:
	./bin/brain-games
brain-even:
	./bin/brain-even
brain-calc:
	./bin/brain-calc
brain-gcd:
	./bin/brain-gcd
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
lint-fix:
	composer exec phpcbf --verbose -- --standard=PSR12 src bin