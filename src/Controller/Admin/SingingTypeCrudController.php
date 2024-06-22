<?php

namespace App\Controller\Admin;

use App\Entity\SingingType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SingingTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SingingType::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('code'),
            TextareaField::new('name'),
            TextEditorField::new('description'),
            BooleanField::new('isChurch')
        ];
    }

}
