<?php

namespace App\Models;

class CategoryList
{
    public function __construct(GamingSession $session)
    {
        $categories = [];

        foreach ($session->getObjects() as $object) {
            $categories[$object['category']]['name'] = $object['category'];
            $categories[$object['category']]['objects'][] = $object;
        }

        $this->categories = $categories;
    }

    public function get()
    {
        return $this->categories;
    }
}
