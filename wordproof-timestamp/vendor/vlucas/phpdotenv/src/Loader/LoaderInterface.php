<?php

declare(strict_types=1);

namespace WordProofTimestamp\App\Vendor\Dotenv\Loader;

use WordProofTimestamp\App\Vendor\Dotenv\Repository\RepositoryInterface;

interface LoaderInterface
{
    /**
     * Load the given entries into the repository.
     *
     * @param \Dotenv\Repository\RepositoryInterface $repository
     * @param \Dotenv\Parser\Entry[]                 $entries
     *
     * @return array<string,string|null>
     */
    public function load(RepositoryInterface $repository, array $entries);
}
