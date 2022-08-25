<?php

declare(strict_types=1);

namespace Bot\CoinDomain\Command;

use Bot\CoinDomain\CoinAggregateRoot;
use Bot\CoinDomain\Service\CoinService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CoinRatesCommand
 *
 * @package CoinRates\Command
 */
class CoinRateCommand extends Command
{
    private CoinAggregateRoot $coinAggregateRoot;

    public function __construct()
    {
        $this->coinAggregateRoot = new CoinAggregateRoot();
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('coin:rates')
            ->setDescription('Exchange rates from 2+ cryptocurrency exchangers')
            ->setHelp('a script that fetches exchange rates from 2+ cryptocurrency exchangers via API and puts the data into the database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Run  > memory ' . memory_get_usage());
        $this->coinAggregateRoot->coinRates();
        $output->writeln('Done > memory ' . memory_get_usage());

        return Command::SUCCESS;
    }
}
