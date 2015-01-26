<?php
namespace FinerThings\Domain\Reviews\Data;

class ReviewReader implements ReviewReaderInterface
{
    /**
     * Retrieve the most recent reviews.
     *
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function mostRecent($page = 1, $limit = 8)
    {
        
    }
}
