<?php

namespace App\Controller\Admin;

use App\Entity\Singing;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SingingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Singing::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            CountryField::new('country'),
            AssociationField::new('singingTypes')->autocomplete()
        ];
    }
}
