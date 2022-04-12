<?php
namespace RSSReader\Command;
use RSSReader\Repository\ResourcesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class ListResourcesCommand extends Command
{

    protected static $defaultName = 'rss:list';

    protected function configure(): void
    {
       $this->addArgument("name", InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        return Command::SUCCESS;
    }
}