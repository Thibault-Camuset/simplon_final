<?php

namespace App\Command;

use App\Repository\CharacterRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RefillActionPointsCommand extends Command
{
    protected static $defaultName = 'app:refill-action-points';

    private $characterRepository;



    public function __construct(CharacterRepository $characterRepository) {
        parent::__construct();
        $this->characterRepository = $characterRepository;
    }





    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('refill', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $refill = $input->getArgument('refill');

        if ($refill) {
            $io->note(sprintf('You passed an argument: %s', $refill));

            $request = $this->characterRepository->refillAp();
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
