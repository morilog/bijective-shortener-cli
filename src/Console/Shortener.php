<?php

namespace Morilog\BijectiveShortener\Console;

use Reshadman\BijectiveShortener\BijectiveShortener;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class Shortener extends Command
{
    protected function configure()
    {
        $this
            ->setName('shorten')
            ->addOption(
                'set-chars',
                null,
                InputOption::VALUE_REQUIRED,
                'Set Default chars set',
                'YRCAtS2qcL06JzFeWIsf9HbwgVPUoOkrZpaGm47vjNEuMT1dynlDxXhQK8i5B3'
            )
            ->addArgument(
                'number',
                InputArgument::REQUIRED,
                'number to decode or encode'
            )
            ->addOption(
                'decode',
                null,
                InputOption::VALUE_NONE,
                'Decode the given string'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $isDecode = $input->getOption('decode') === true;
        $number = $input->getArgument('number');
        $chars = $input->getOption('set-chars');

        // Sanitize chars
        $chars = implode('', array_unique(str_split($chars)));

        if (empty($chars)) {
            $output->writeln('Chars Set can not be empty');

            return;
        }
        
        BijectiveShortener::setChars($chars);

        if ($isDecode) {
            $output->writeln(BijectiveShortener::decodeToInteger((string)$number));
        } else {
            $output->writeln(BijectiveShortener::makeFromInteger((int)$number));
        }
    }
}
