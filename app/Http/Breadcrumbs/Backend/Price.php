<?php

Breadcrumbs::register('admin.prices.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.prices.management'), route('admin.prices.index'));
});

Breadcrumbs::register('admin.prices.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.prices.index');
    $breadcrumbs->push(trans('menus.backend.prices.create'), route('admin.prices.create'));
});

Breadcrumbs::register('admin.prices.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.prices.index');
    $breadcrumbs->push(trans('menus.backend.prices.edit'), route('admin.prices.edit', $id));
});
