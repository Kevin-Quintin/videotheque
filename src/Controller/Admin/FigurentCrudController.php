<?php

namespace App\Controller\Admin;

use App\Entity\Figurent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FigurentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Figurent::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
