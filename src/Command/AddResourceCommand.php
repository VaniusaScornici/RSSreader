<?php
namespace RSSReader\Command;
use RSSReader\Repository\ResourcesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddResourceCommand extends Command
{

    protected static $defaultName = 'rss:add';

    protected function configure(): void
    {
       $this->addArgument("alias", InputArgument::REQUIRED);
       $this->addArgument("url", InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        ResourcesRepository::addRssResource($input->getArgument("alias"), $input->getArgument("url"));

        return Command::SUCCESS;

    }

}