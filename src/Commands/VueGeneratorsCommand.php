<?php

namespace VueGenerators\Commands;

use VueGenerators\Paths;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class VueGeneratorsCommand extends Command
{
    use Paths;

    /**
     * Create path for file.
     *
     * @param Filesystem $filesystem
     * @param string     $type       File type.
     *
     * @return string
     */
    protected function createPath(Filesystem $filesystem, $type)
    {
        $customPath = $this->option('path');

        $defaultPath = config("vue-generators.paths.{$type}s");

        $path = $customPath !== null ? $customPath : $defaultPath;

        $this->buildPathFromArray($path, $filesystem);

        return $path;
    }
}
