<?php
namespace RSSReader\Command;
use ORM;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DeployCommand extends Command
{
    protected static $defaultName = 'rss:deploy';

    protected function configure(): void
    {
        $this->addOption('reload', 'r', InputOption::VALUE_NEGATABLE, '', false);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        do {
            ORM::raw_execute("DROP TABLE IF EXISTS resources;");
            ORM::raw_execute("DROP TABLE IF EXISTS articles;");
        }
        while( $input -> getOption('reload'));
        ORM::raw_execute("CREATE TABLE IF NOT EXISTS resources(
                            id int PRIMARY KEY AUTOINCREMENT,
                            name string UNIQUE NOT NULL,
                            url string NOT NULL,
                            created_at current_date);
        " );
        ORM::raw_execute("CREATE TABLE IF NOT EXISTS articles(
                            id int PRIMARY KEY AUTOINCREMENT,
                            title string NOT NULL,
                            content string,
                            url string NOT NULL,
                            created_at current_date);
        " );

        $output->writeln('<info> Deployed </info>>');
        return Command::SUCCESS;

    }


}