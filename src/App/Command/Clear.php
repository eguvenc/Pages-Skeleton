<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Clear extends Command
{
    public function __construct(array $config)
    {
        $this->config = $config;

        Parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('clear')
            ->setDescription('Clear /data/cache folder content');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $files = glob($this->config['root'].'/data/cache/*');
        
        if (empty($files)) {
            $output->writeln('<error>No file exists in cache folder.</error>');
        }
        foreach ($files as $file) {
            if (is_file($file)) {
                if (! $fh = fopen($file, 'rb')) {
                    $output->writeln('<error>You haven\'t got a write permission to /data/cache/ folder.</error>');
                    die;
                }
                unlink($file);
                $output->writeln('<info>Cache file <comment>'.str_replace($this->config['root'],'', $file).'</comment> deleted successfully.</info>');
            }
        }
        return 0;
    }
}
