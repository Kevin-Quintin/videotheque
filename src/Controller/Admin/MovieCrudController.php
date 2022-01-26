<?php

namespace App\Controller\Admin;

use App\Entity\Movie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;

class MovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movie::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            IntegerField::new('duration'),
            IntegerField::new('cost')->hideOnIndex(),
            BooleanField::new('only_adult'),
            DateField::new('created_at'),
            IntegerField::new('nb_like')->hideOnIndex(),
            TextField::new('image')->hideOnIndex(),
            TextField::new('origin_country'),
            AssociationField::new('figurents')->autocomplete()->hideOnIndex(),
            AssociationField::new('categories')->hideOnIndex(),
        ];
    }
}