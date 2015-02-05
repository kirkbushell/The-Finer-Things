<?php

use FinerThings\Domain\Categories\Data\Categories;

Form::macro('categorySelect', function($name, $default = true) {
    $repository = App::make(Categories::class);
    $config = $repository->all();
    $categories = ['' => 'Select category'];

    foreach ($config as $category) {
        $categories[$category->id] = $category->title;
    }

    return Form::select($name, $categories);
});
