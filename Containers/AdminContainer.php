<?php

namespace Containers;


final class AdminContainer extends \Moot\HttpContainer
{
    protected string $modelClass = \Models\SiteModel::class;
    protected string $viewClass = \Views\AdminView::class;
}