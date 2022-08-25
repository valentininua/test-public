SHELL := /bin/bash

test:
	 ./vendor/bin/phpunit ./

currency:
	 php bin/console  coin:rates
